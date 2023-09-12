<?php 
    class DbConecct {
        // variavel que guarda a conexão do banco de dados
        private object $con;

        // construtor
        function __construct() {

        }

        // função que conecta o banco de dados
        function conectar() {
            include_once dirname(__FILE__) .    "/constants.php";
            
            $this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if (mysqli_connect_errno()) {
                echo "Erro ao conectar banco de dados: " . mysqli_connect_error();
            }

            return $this->con;
        }
    }