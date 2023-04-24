<?php

/**
 * This file is responsible for displaying the list of players from the database, adding a new player to the database,
 * and deleting a player from the database.
 */

// Include the database connection file
require_once '../database/conn.php';


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $runs = $_POST["runs"];
    $balls_faced = $_POST["balls_faced"];

    // Insert the data into the database
    $sql = "INSERT INTO players (name, runs, balls_faced) VALUES ('$name', $runs, $balls_faced)";
    if ($conn->query($sql) === true) {
        echo "<div class='alert'>Player added successfully!</div>";
    } else {
        echo "<div class='alert'>Error: " . $conn->error . "</div>";
    }
}

// Retrieve the data from the database
$sql = "SELECT * FROM players";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display the list of players
    echo "<h2>Players List</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Runs</th><th>Balls Faced</th><th>Strike Rate</th><th>Actions</th></tr>";
    while ($row = $result->fetch_assoc()) {
        // Calculate the strike rate
        $id = $row["id"];
        $name = $row["name"];
        $runs = $row["runs"];
        $balls_faced = $row["balls_faced"];
        $strike_rate = round($runs / $balls_faced * 100, 2);

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$runs</td>";
        echo "<td>$balls_faced</td>";
        echo "<td>$strike_rate</td>";

        echo "<td><a href='../frontened/edit.php?id=$id'>Edit</a> | <a href='../logics/delete.php?id=$id'>Delete</a></td>";

        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<div class='alert'>No players found!</div>";
}

// Close the database connection
$conn->close();
