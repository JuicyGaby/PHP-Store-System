<?php

Class MyStore {

    private $server = "mysql:host=localhost;dbname=onlinestore";
    private $user = "root";
    private $password = "12345";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $con;

    
    public function openConnection() {

        try {
            
            $this->con = new PDO($this->server, $this->user, $this->password, $this->options);
            return $this->con;

        } catch (PDOException $e) {
           
           echo "There is some error in the connection " . $e->getMessage();
        }

    }

    public function closeConnection() {

        $this->con = null;
        
    }

    public function getUsers() {

        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM members");
        $stmt->execute();
        $users = $stmt->fetchAll();
        $userCount = $stmt->rowCount();

        if ($userCount > 0) {
            return $users;
        } else {
           return 0;
        }


    }
 
}

// $store = new MyStore();