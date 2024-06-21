<?php
    namespace App\Models;

    class Twetts{
        private $conn;
        public function __construct($conn){
            $this->conn = $conn;
        }
        public function Twettar($twett, $id_usuario,$data){

            $res = $this->conn->prepare('INSERT INTO tb_twetts (id_user,twett,dt) VALUES (:nome,:email,:senha);');
            $res->bindParam(':nome', $id_usuario);
            $res->bindParam(':email', $twett);
            $res->bindParam(':senha', $data);
            $res->execute();
            }
        
        public function viewTwetts(){
            $res = $this->conn->prepare('SELECT twett,dt,id_twett FROM tb_twetts;');
            $res->execute();
            if(isset($_SESSION['qtd'])){$_SESSION['qtd'] = $res->rowCount();}
            $_SESSION['qtd'] = $res->rowCount();
            return  $res->fetchAll(\PDO::FETCH_NUM);
        }
        }