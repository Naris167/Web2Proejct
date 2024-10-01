<?php

class DBController
{
    // Database Connection Properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = "jobless_burger";
    protected $port = 3307;

    // connection property
    public $con = null;

    // call constructor
    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database, $this->port);
        
        if (mysqli_connect_errno()) {
            throw new Exception("Failed to connect to MySQL: " . mysqli_connect_error());
        }
        
        return $this->con;
    }

    public function checkConnection()
    {
        if ($this->con === null) {
            return false;
        }
        
        return mysqli_ping($this->con);
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // for mysqli closing connection
    protected function closeConnection()
    {
        if ($this->con !== null) {
            mysqli_close($this->con);
            $this->con = null;
        }
    }
}

// Usage example
try {
    $db = new DBController();
    
    if ($db->checkConnection()) {
        echo "Database connection is working.\n";
        
        // Example query
        $result = mysqli_query($db->con, "SELECT 1");
        if ($result) {
            echo "Successfully ran a test query.\n";
            mysqli_free_result($result);
        } else {
            echo "Failed to run test query: " . mysqli_error($db->con) . "\n";
        }
    } else {
        echo "Database connection failed.\n";
    }
} catch (Exception $e) {
    echo "Connection error: " . $e->getMessage() . "\n";
}

?>