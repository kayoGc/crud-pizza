<?php 
    class DbOperacao {
        private object $con;

        function __construct() {
            require_once dirname(__FILE__) . "/DbConecct.php";

            $db = new DbConecct;
            
            // passa a conexão para con
            $this->con = $db->conectar();
        }

        function criarPizza($sabor, $tipo, $preco) {
            $stmt = $this->con->prepare("INSERT INTO pizza(sabor, tipo, preco) VALUES (?, ?, ?)");
            $stmt->bind_param("ssd", $sabor, $tipo, $preco);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }


    }
?>