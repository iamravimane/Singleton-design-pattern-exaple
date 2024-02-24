<?php 

class Database
{
    // Hold the instance of the Database class
    private static $instance;

    // Database connection parameters
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'my_database';

    // Database connection
    private $connection;

    // Private constructor to prevent instantiation from outside the class
    private function __construct()
    {
        // Create a database connection
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Static method to retrieve the Singleton instance
    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    // Public method to execute SQL queries
    public function query($sql)
    {
        return $this->connection->query($sql);
    }
}

// Usage
$db = Database::getInstance();

// Execute a query
$result = $db->query("SELECT * FROM users");
