<?php

    class Model
    {
        protected $db;        

        public function __construct(){
            global $config;
            
            try {                 
                $this->db = new PDO("mysql:dbname=".$config['dbname'].';host='.$config['host'], $config['dbuser'], $config['dbpass']);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch ( Exception $ex ) { 
                echo $ex->getMessage();
            } 
            
        }
    }

?>
