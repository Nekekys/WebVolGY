<?php 

    class Database {
        private static $instance = null;

        private $connection = null;

        protected function __construct()
        {
            define("DB_HOST", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_NAME", "sportshop");

            $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if ($this->connection->connect_errno) exit("ошибка подключения к БД");
            $this->connection->set_charset('utf8');
        }

        protected function __clone()
        {
            
        }

        public function __wakeup()
        {
            throw new \BadMethodCallException('я вам запрещяю десериализацию');
        }
        
        public static function getInstance(): Database
        {
            if(null == self::$instance){
                self::$instance = new static();
            }
            return self::$instance;
        }

        public static function connection(): \mysqli
        {
            return static::getInstance()->connection;
        }

    }

?>