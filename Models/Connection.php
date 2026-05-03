<?php

class Connection
{
    protected $conn;
    private $configFile = "config.json";
    private static $instance = null;

    private function __construct(){
        $this->makeConnection();
    }

    public static function getInstance(){
        if (self::$instance ===null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function makeConnection(){
        try{
            if(!file_exists($this->configFile)){
                throw new Exception("Archivo de configuración no encontrado");
            }

            $configData = file_get_contents($this->configFile);
            $c = json_decode($configData, true);

            $dsn = "mysql:host=" . $c['host'] . ";dbname=" . $c['db'];

            $this->conn = new PDO($dsn, $c['userName'], $c['password']);
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . $e->getCode() . "<br>";
        }catch (Exception $e) {
            echo "Error de sistema: " . $e->getMessage() . "<br>";
        }
    }

    public function getConn(){
        return $this->conn;
    }
}

?>