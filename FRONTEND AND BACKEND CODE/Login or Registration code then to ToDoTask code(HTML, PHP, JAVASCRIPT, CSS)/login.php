<?php
// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// Database connection 
$servername = 'localhost';
$username = 'root';
$dbpassword = '';
$dbname = 'user_db';

// Create a connection to database
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{

// retrieve user data
$stmt = $conn->prepare("SELECT * FROM registration WHERE email like ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if email exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verify password
    if ($password = $row['password']) {
        
        // Redirect the user to the to-do app
                header("Location: ToDoTask code(HTML, JAVASCRIPT, CSS)/dotask.html");
                // echo $email;
                // echo $password;  
    exit();
    }
}
}

// Invalid email or password
echo "Invalid credentials";
echo "<br/>";
echo "Go back and Register first.";


// Close the database connection
$stmt->close();
$conn->close();
?>