<?php
session_start();
    class Database {
        private $dbSettings,$host,
                $database,$user,
                $passwd,  $charset;
                

        public function __construct($file_name){
            $this->config = parse_ini_file($file_name);
            $this->host = $this->config['HOST'];
            $this->database = $this->config['DATABASE'];
            $this->user = $this->config['USER'];
            $this->passwd = $this->config['PASSWD'];
            $this->charset = $this->config['CHARSET'];
            $this->connection = null;
        }

        public function get_db(){
            $this->connection = new PDO(
                "mysql:host=$this->host;
                dbname=$this->database;
                charset=$this->charset;",
                $this->user,
                $this->passwd,
               [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]
            );
            return $this->connection;
        }

    
        public function start_Query($sql){
            $connection = $this->get_db();
            $request =  $connection->prepare($sql);
            $request->execute();
            return $request;
        }

        public function getAssocArray($table){
            return $this->start_Query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
        }

        public function start_insert($sql){
            $this->start_Query($sql);
            return $this->connection->lastInsertId();
        }

        public function lineOfTable($table){
            return $this->getAssocArray($table)[0];
        }

        public function firstValueOfLine($table){
            $result = $this->lineOfTable($table);
            return $result[array_key_first($result)];
        }

        public function firstColumn($table){
            $tableValues =  $this->getAssocArray($table);
            $first_array_key = array_key_first($tableValues[0]);
            $res = array();
            foreach ($tableValues as $news){
                array_push($res, $news[$first_array_key]);
            }
            var_dump($res);
            return [$res, count($res)];;

           

            // var_dump($tableValues);

        }
    }

    function redirect($location){
        header('Location: '.$location);
    }

    function selectALL($pdo, $table){
        $query = $pdo->prepare("SELECT * FROM ?");
        $query->execute(array($table));
       return  $query->fetchAll(PDO::FETCH_ASSOC);
    }

    
    $db = new Database('database.ini');
    $pdo = $db->get_db();
    $user  = null;
    if (isset($_SESSION['client']))  $user = $_SESSION['client'];

    if ($user){
        // echo 'Пользователь вошел';
    }
    function fieldsIsValid($array){
        foreach ($array as $field){
            if ($field==''){
                return false;
            }
        }
        return true;
    }


   

?>