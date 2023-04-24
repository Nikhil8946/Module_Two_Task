<?php

include '../database/conn.php';

class UpdatePlayer
{

    private $id;
    private $name;
    private $runs;
    private $balls_faced;
    private $conn;

    public function __construct($id, $name, $runs, $balls_faced, $conn)
    {
        $this->id = $id;
        $this->name = $name;
        $this->runs = $runs;
        $this->balls_faced = $balls_faced;
        $this->conn = $conn;
    }

    public function update()
    {
        // Update data in database
        $sql = "UPDATE players SET name='$this->name', runs=$this->runs, balls_faced=$this->balls_faced WHERE id=$this->id";
        if (mysqli_query($this->conn, $sql)) {
            header("Location: ../index.php");
            exit;
        } else {
            echo "<div class='alert'>Error: " . mysqli_error($this->conn) . "</div>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $runs = $_POST["runs"];
    $balls_faced = $_POST["balls_faced"];

    $player = new UpdatePlayer($id, $name, $runs, $balls_faced, $conn);
    $player->update();
}

// Retrieve data from database
$id = $_GET["id"];
$sql = "SELECT * FROM players WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row["name"];
$runs = $row["runs"];
$balls_faced = $row["balls_faced"];

// Close connection
mysqli_close($conn);
