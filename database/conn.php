<?php

/**
 * A class to handle database connections.
 */
class DatabaseConnection {
  /**
   * The server name or IP address.
   * @var string
   */
  private $server;

  /**
   * The username for the database.
   * @var string
   */
  private $username;

  /**
   * The password for the database.
   * @var string
   */
  private $password;

  /**
   * The name of the database.
   * @var string
   */
  private $database;

  /**
   * The database connection object.
   * @var mysqli
   */
  private $conn;

  /**
   * Constructor method to initialize the class properties with provided parameters.
   *
   * @param string $server The server name or IP address.
   * @param string $username The username for the database.
   * @param string $password The password for the database.
   * @param string $database The name of the database.
   */
  public function __construct($server, $username, $password, $database) {
    $this->server = $server;
    $this->username = $username;
    $this->password = $password;
    $this->database = $database;

    // Creating a new database connection object
    $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);

    // Checking if the connection is established successfully or not
    if ($this->conn->connect_error) {
      echo "Connection error:" . $this->conn->connect_error;
    } else {
      echo "";
    }
  }

  /**
   * Method to get the database connection object.
   *
   * @return mysqli The database connection object.
   */
  public function getConnection() {
    return $this->conn;
  }
}

// Creating an instance of the DatabaseConnection class and getting the database connection object
$databaseConnection = new DatabaseConnection("localhost", "nikhil", "Nikhil@123", "ipl_db");
$conn = $databaseConnection->getConnection();
