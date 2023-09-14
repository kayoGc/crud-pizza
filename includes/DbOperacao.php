<?php 
    class DbOperacao {
        private $con;

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


        function getPizzas() {
            $stmt = $this->con->prepare('SELECT sabor, tipo, preco FROM pizza;');
            $stmt->execute();
            $stmt->bind_result($sabor, $tipo, $preco);

            $pizzas = array();

            while ($stmt->fetch()) {
                $pizza = array();
                $pizza['sabor'] = $sabor;
                $pizza['tipo'] = $tipo;
                $pizza['preco'] = $preco;
                
                array_push($pizzas, $pizza);
            }

           return $pizzas;;
        }
    }
?>