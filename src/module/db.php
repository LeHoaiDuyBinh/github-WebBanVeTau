<?php
    class DB{
        private function conn() {
            ini_set('display_errors', 'Off');
            $connectionString = "mysql:host=" . getenv('MYSQL_HOSTNAME') . ";dbname=" . getenv('MYSQL_DATABASE');
            $conn = new \PDO($connectionString, getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        }

        public function select($sql, $params = null)
        {
            $connect = $this->conn();
            if($params != null){
                $res = $connect->prepare($sql);
                $res->execute($params);
            }
            else {
                $res = $connect->query($sql);
            }
            $res->setFetchMode(PDO::FETCH_ASSOC);
            return $res;
        }

        // chưa dùng // xài cho updata, del, insert
        public function execute($sql, $params){
            $connect = $this->conn();
            $res = $connect->prepare($sql);
            $res->execute($params);
        }
    }
?>