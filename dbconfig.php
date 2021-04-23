<?php

    class Database {
        private $pdo;

        public function __construct($host, $dbname, $username, $password) {
            $con = new PDO('mysql:host='.$host.'; dbname='.$dbname.';', $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $con;
        }

        public function query($show) {
            $stmt = $this->pdo->prepare($show);
            $stmt->execute();

            if($show) {
                $data = $stmt->fetchAll();
                return $data;
            }
        }
    }




?>