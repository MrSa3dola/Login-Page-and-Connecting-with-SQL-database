<?php
class DB_Ops
{
    private $dbHost = 'localhost';
    private $dbUsername = 'root';
    private $dbPassword = '';
    private $dbName = 'login_register';
    private $conn;

    public function __construct()
    {
        // echo "in db ops constructor" . '<br>';
        $this->conn = mysqli_connect($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
        if (!$this->conn) {
            die('Failed to database connection: ' . mysqli_connect_error());
        }
    }

    public function validate($userName)
    {
        $query = "SELECT * from users WHERE USER_NAME = '$userName'";
        $res = mysqli_query($this->conn, $query);
        $cnt = mysqli_num_rows($res);
        print_r($res);
        if ($cnt > 0)
            return false;
        return true;
    }

    public function insertUser($user)
    {
        echo $this->validate($user->getUserName());
        echo '<br>';
        if (!$this->validate($user->getUserName()))
            return 'username is already exists';
        else {
            $insert_query = "INSERT INTO `users` (`ID`, 
            `FULL_NAME`, 
            `USER_NAME`, 
            `BIRTHDATE`, 
            `PHONE`, 
            `ADDRESS`, 
            `PASSWORD`, 
            `EMAIL`, 
            `IMAGE`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($this->conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $insert_query);
            // if ($prepareStmt) {

            // }
            mysqli_stmt_bind_param(
                $stmt,
                "ssssssss",
                $user->getFullName(),
                $user->getUserName(),
                $user->getBirthDate(),
                $user->getPhone(),
                $user->getAddress(),
                $user->getPassword(),
                $user->getEmail(),
                $user->getImageName()
            );
            mysqli_stmt_execute($stmt);
            return '';
        }
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}
