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


    public function checkUser($email) {

        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM members WHERE MEM_EMAIL = ?");
        $stmt->execute([$email]);
        $totalUser = $stmt->rowCount();
        return $totalUser;
        

    }

    public function login() {

        
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM members WHERE MEM_EMAIL = ? AND MEM_PASSWORD = ?");
            $stmt->execute([$email, $password]);
            $totalUser = $stmt->rowCount();


            if ($totalUser > 0) {
                echo "Login Successfully";
            } else {
                echo "Login Failed. Try Again";
            }

            

            

        }

    }

    public function addUser() {

        if (isset($_POST['addUser'])) {
            
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $access = $_POST['access'];
            $password = md5($_POST['password']);


            
            if ($this->checkUser($email) == 0) {
                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO `members`(`MEM_FNAME`, `MEM_LNAME`, `MEM_EMAIL`, `MEM_ACCESS`, `MEM_PASSWORD`) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$fname, $lname, $email, $access, $password]);
            } else {
                echo "Email Already Exist. Try Again..";
            }



               
        }

    }
 
}

$store = new MyStore();