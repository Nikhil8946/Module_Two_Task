<?php

// Define a class for managing players
class PlayerManager
{
    private $conn; // Database connection object

    // Constructor method to initialize database connection
    public function __construct()
    {
        include '../database/conn.php';
        $this->conn = $conn;
    }

    // Method to delete a player by ID
    public function deletePlayer($id)
    {
        $sql = "DELETE FROM players WHERE id=$id";
        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    // Method to close the database connection
    public function closeConnection()
    {
        mysqli_close($this->conn);
    }
}

// Check if ID parameter is present in the URL
if (isset($_GET["id"])) {
    // Retrieve ID from URL parameter
    $id = $_GET["id"];

    // Create a new instance of PlayerManager class
    $playerManager = new PlayerManager();

    // Delete player from database
    if ($playerManager->deletePlayer($id)) {
        // Redirect to players.php page
        header("Location: ../frontened/dashboard.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close database connection
    $playerManager->closeConnection();
} else {
    // If ID parameter is not present, redirect to players.php page
    header("Location: ../frontened/dashboard.php");
    exit;
}
