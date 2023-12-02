<?php
    //require vs require_once vs include
    require_once('config.php');

    class Connection{
        static public function Connection(){
            $con = false;
            //Error (falla fisica) y Excepcion (fallas del codigo en tiempo de ejecucion)
            try{//para concatenar se usa el .
                $data = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
                $con = new PDO($data,DB_USERNAME,DB_PASSWORD);
                return $con;
            }
            catch(PDOException $e){
                $message = array(
                    'COD'=>'000',
                    'MSN'=>($e)
                );
                echo($e->getMessage());
            }
        }
    }
?>