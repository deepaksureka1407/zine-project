<?php
  // Retrieve the form data
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Store the user details in the database (you may want to use a database library)
  $db_host = "localhost";
  $db_name = "mydatabase";
  $db_user = "myuser";
  $db_password = "mypassword";

  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";
  if (mysqli_query($conn, $sql)) {
    echo "User created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
