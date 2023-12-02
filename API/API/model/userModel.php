<?php
require_once "Connection.php";
class  UserModel{
    static public function createUser($data){
        // Validar el correo electrónico con expresión regular(minimo 8 caracteres antes del @ y obligatorio @gmail.com)
        if (!preg_match('/^[a-zA-Z0-9_.]{8,}@gmail.com$/', $data['use_mail'])) {
            return "Correo electrónico no válido";
        }

        /*if (!preg_match('/^(?=.[a-z]+)(?=.[A-Z]+)(?=.[0-9]+)(?=.[!@#$%^&(){}\\[\\]]+)[a-zA-Z0-9!@#$%^&(){}\\[\\]]{8,}$/', $data['use_pss'])) {
            return "Correo electrónico no válido";
        }*/
        
        $cantMail = self::getMail($data["use_mail"]);
        if($cantMail==0){
            $query = "INSERT INTO users(user_id, use_mail, use_pss, use_dateCreate, 
            us_identifier, us_key, us_status) VALUES (NULL, :use_mail, :use_pss, 
            :use_dateCreate, :us_identifier, :us_key, :us_status);";
            $status = "1";
            $statement = Connection::connection()->prepare($query);
            $statement->bindParam(":use_mail", $data["use_mail"],PDO::PARAM_STR);
            $statement->bindParam(":use_pss", $data["use_pss"],PDO::PARAM_STR);
            $statement->bindParam(":use_dateCreate", $data["use_dateCreate"],PDO::PARAM_STR);
            $statement->bindParam(":us_identifier", $data["us_identifier"],PDO::PARAM_STR);
            $statement->bindParam(":us_key", $data["us_key"],PDO::PARAM_STR);
            $statement->bindParam(":us_status", $status,PDO::PARAM_STR);
            $message = $statement->execute() ? "Ok" : Connection::connection()->errorInfo();
            $statement -> closeCursor();
            $statement = null;
            $query = "";
                // Validar la contraseña con expresión regular


    }else{
        $message = "El usuario ya existe.";
    }
    return $message;
    }


    static private function getMail($mail){
        $query = "SELECT use_mail FROM users WHERE use_mail='$mail'";
        $statement = Connection::connection()->prepare($query);
        $statement -> execute();
        $result = $statement -> rowCount();
        return $result;
    }
    static public function getUsers($parametro){
        $param = is_numeric($parametro) ? $parametro : 0;
        $query = "SELECT user_id, use_mail, use_dateCreate FROM users ";
        $query .= ($param > 0) ?  "WHERE users.user_id = '$param' AND " : "";
        $query .= ($param > 0) ?  "us_status='1';" : "WHERE us_status='1';";
        //echo $query
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $result = $statement -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    static public function login($data){
        $user = $data['use_mail'];
        //$pass = ($data['use_pss']);
        $pass = md5($data['use_pss']);
        //var_dump($data);
        //echo($pass);
        if(!empty($user) && !empty($pass)){
            $query = "SELECT us_identifier, us_key, user_id FROM users WHERE
            use_mail='$user' and use_pss = '$pass' and us_status='1'";
            $statement = Connection::connection()->prepare($query);
            $statement -> execute();
            $result = $statement -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }else{
            return "NO TIENE CREDENCIALES";
        }
    }
    static public function getUserAuth(){
        $query = "";
        $query = "SELECT us_identifier, us_key FROM users WHERE us_status = '1';";
        $statement = Connection::connection()->prepare($query);
        $statement -> execute();
        $result = $statement -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //método para el PATCH (verbo en el userController)
    static public function deleteUser($parametro){
        //pasar el parametro y buscar el usuario de por el numero
        $param = is_numeric($parametro) ? $parametro : 0;
        $query = "SELECT user_id, use_mail, use_dateCreate FROM users ";
        $query .= ($param > 0) ?  "WHERE users.user_id = '$param' AND " : "";
        $query .= ($param > 0) ?  "us_status='1';" : "WHERE us_status='1';";
         
        // Obtener la información del usuario
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    
        // Verifica si se encontró un usuario con el ID que se debió ingresar
        if ($user) {
            // Consulta SQL de UPDATE para cambiar el estado a 0
            $updateQuery = "UPDATE users SET us_status = 0 WHERE user_id = :user_id";
    
            // Ejecutar la consulta para actualizar
            $updateStatement = Connection::connection()->prepare($updateQuery);
            $updateStatement->bindParam(":user_id", $user["user_id"], PDO::PARAM_INT);
            $updateResult = $updateStatement->execute();
    
            if ($updateResult) {
                return "El usuario fue dado de baja o marcado como inactivo (us_status = 0)";
            } else {
                return "Error al intentardar de baja al usuario";
            }
        } else {
            return "No se encontró un usuario con el ID proporcionado";
        }

    }

    //método para el PUT (actualizar datos)
    static public function updateUser($parametro, $data){
       // Validar el correo electrónico con expresión regular(minimo 8 caracteres antes del @ y obligatorio @gmail.com)
        if (!empty($data) && isset($data['use_mail']) && !preg_match('/^[a-zA-Z0-9_.]{8,}@gmail.com$/', $data['use_mail'])) {
            return "Correo electrónico no válido";
        }

       /* // Validar la contraseña con expresión regular
        if (!empty($data) && isset($data['use_pss']) && !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&(){}[\]])[a-zA-Z0-9!@#$%^&(){}[\]]{8,}$/', $data['use_pss'])) {
            return "Contraseña no válida";
        }*/

        $param = is_numeric($parametro) ? $parametro : 0;
    
        //verificar que los campos para actualizar no estén vacíos
        if (!empty($data)) {
            $query = "UPDATE users SET use_mail = :use_mail, use_pss = :use_pss, use_dateCreate = :use_dateCreate WHERE user_id = :user_id";
            $statement = Connection::connection()->prepare($query);
    
            // Verificar si la ejecución fue exitosa vinculando el marcador de posición asignado a cada columna y espera una cadena
            if ($statement) {
                $statement->bindParam(":use_mail", $data['use_mail'], PDO::PARAM_STR);
                $statement->bindParam(":use_pss", $data['use_pss'], PDO::PARAM_STR);
                $statement->bindParam(":use_dateCreate", $data['use_dateCreate'], PDO::PARAM_STR);
                $statement->bindParam(":user_id", $param, PDO::PARAM_INT);
    
                $updateResult = $statement->execute();
    
                if ($updateResult) {
                    return "El usuario fue actualizado";
                } else {
                    return "Error al intentar actualizar el usuario";
                }
            } else {
                return "Error en la preparación de la consulta";
            }
        } else {
            return "No se puede actualizar porque no hay datos";
        }
    }
    
}

?>