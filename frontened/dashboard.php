<!DOCTYPE html>
<html>

<head>
  <title> IPL Dashboard</title>
  <!-- Including external stylesheet for dashboard.css -->
  <link rel="stylesheet" href="/assets/css/dashboard.css">
</head>

<body>
  <h1>IPL Dashboard</h1>
  <!-- HTML form to submit player details -->
  <?php if (isset($_SESSION['user'])) : ?>
    <form method="POST">
      <label for="name">Player Name:</label>
      <input type="text" id="name" name="name" required>
      <label for="runs">Runs:</label>
      <input type="number" id="runs" name="runs" required>
      <label for="balls_faced">Balls Faced:</label>
      <input type="number" id="balls_faced" name="balls_faced" required>
      <input type="submit" value="Submit">
    </form>
  <?php endif; ?>
  <?php if (!isset($_SESSION['username'])) : ?>
    <!-- Display the Man of the Match button for anonymous users -->
    <button id="motm-btn">Man of the Match</button>
  <?php endif; ?>
  <!-- Including PHP script for processing form data -->
  <?php
  include '../logics/dashboard.php';
  ?>

</body>

</html>