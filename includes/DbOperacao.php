<?php 
    class DbOperacao {
        private $con;

        function __construct() {
            require_once dirname(__FILE__) . "/DbConecct.php";

            $db = new DbConecct;
            
            // passa a conexão para con
            $this->con = $db->conectar();
        }

        // CREATE - cria uma pizza
        function criarPizza($sabor, $tipo, $preco) {
            $stmt = $this->con->prepare("INSERT INTO pizza(sabor, tipo, preco) VALUES (?, ?, ?)");
            $stmt->bind_param("ssd", $sabor, $tipo, $preco);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        // READ - pega informação de uma pizza espeficia
        function getPizza($idPizza) {
            $stmt = $this->con->prepare(
                "SELECT sabor, tipo, preco 
                 FROM pizza
                 WHERE idPizza = {$idPizza}"
            );
            $stmt->execute();
            $stmt->bind_result($sabor, $tipo, $preco);

            $pizza = array();

            while ($stmt->fetch()) {
                $pizza['sabor'] = $sabor;
                $pizza['tipo'] = $tipo;
                $pizza['preco'] = $preco;
            }

           return $pizza;
        }

        // READ - pega todas as pizzas em um array
        function getAllPizzas() {
            $stmt = $this->con->prepare('SELECT idPizza, sabor, tipo, preco FROM pizza;');
            $stmt->execute();
            $stmt->bind_result($idPizza, $sabor, $tipo, $preco);

            $pizzas = array();

            while ($stmt->fetch()) {
                $pizza = array();
                $pizza['id'] = $idPizza;
                $pizza['sabor'] = $sabor;
                $pizza['tipo'] = $tipo;
                $pizza['preco'] = $preco;
                
                array_push($pizzas, $pizza);
            }

           return $pizzas;
        }

        // UPDATE - Modifica uma pizza
        function updatePizza($sabor, $tipo, $preco, $idPizza) {
            $stmt = $this->con->prepare(
                "UPDATE pizza 
                 SET sabor = ?, tipo = ?, preco = ?
                 WHERE idPizza = ?"
            );
            $stmt->bind_param('ssdi', $sabor, $tipo, $preco, $idPizza);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
    
        // DELETE - Apaga uma pizza
        function deletePizza($idPizza) {
            $stmt = $this->con->prepare(
                "DELETE FROM pizza 
                 WHERE idPizza = ?"
            );
            $stmt->bind_param('i', $idPizza);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
    }
?>