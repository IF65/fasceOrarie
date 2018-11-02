<?php
    namespace Database;

	use \PDO;
    use Database\Tabelle\Percentili;
    use Database\Tabelle\Negozi;

    class Database {

        protected $pdo = null;
        
        public $percentili;
        public $negozi;

        public function __construct($sqlDetails) {
            $conStr = sprintf("mysql:host=%s", $sqlDetails['host']);
            try {
                $this->pdo = new PDO($conStr, $sqlDetails['user'], $sqlDetails['password']);

                self::createDatabase($sqlDetails);

            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        private function createDatabase(array $sqlDetails) {
        	try {
            
                // creazione db
                // ----------------------------------------------------------
                foreach ($sqlDetails['db'] as $db) {
                    $stmt = $this->pdo->prepare("create database if not exists `$db`;");
                    $stmt->execute() or die(print_r($this->pdo->errorInfo(), true));
                }
                
                $this->percentili = new Percentili($this->pdo);
                $this->negozi = new Negozi($this->pdo);

                return true;
            } catch (PDOException $e) {
                die("DB ERROR: ". $e->getMessage());
            }
        }
        
        public function __destruct() {
			unset($this->pdo);
        }
        
    }
?>
