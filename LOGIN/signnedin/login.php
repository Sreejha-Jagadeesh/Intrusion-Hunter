<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chivo:300,700|Playfair+Display:700i" rel="stylesheet">
    <link rel="stylesheet" href="css/style_index.css">
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/categories.css">
    <link rel="stylesheet" href="css/login.css">
    
</head>
<body style="background-color: #f1ebeb ;">
   
    <nav>
      <div class="logo">
        <h3><a href="merlin.html" class="logo-name">Fashion store</a></h3>
      </div>
      <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="products.html">Products</a></li>
        <li><a href="categories.html">Categories</a></li>
        <li><a href="contact.html">ContactUs</a></li>
        <li><a href="login.php" id="login">Login</a></li>
      </ul>
      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </nav>
  <
<br><br><br>
    
  
    <br><br>
    <div class="position">
    <div class="form-template1">
      <div class="form-header-t1">
          <h1>LOG IN</h1>
          <div class="social">
              <i class="fa fa-facebook"></i>
              <i class="fa fa-twitter"></i>
              <i class="fa fa-google"></i>
          </div>
      </div> 
    <form method="post" action="login.php">
    <div class="form-container-t1">
        <label for="email">Username:</label>
        <input type="email" name="email" id="email" placeholder="Your email" required>
        <br>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd" placeholder="Your password" required>
        <br>
        <input type="submit" name="login" value="Login"></div>
        <?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $conn = mysqli_connect('localhost', 'root', 'krish1312', 'signup');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query the database for the provided username and password
    $query = "SELECT * FROM signup WHERE email = '$email' AND pwd = '$pwd'";
    $result = mysqli_query($conn, $query);

    // Check if a matching record was found
    if (mysqli_num_rows($result) == 1) {
        // User is authenticated, redirect to the dashboard or desired page
        header("Location: index.html");
        
    } else {
        // Invalid credentials, show an error message
        echo "Invalid username or password";
        
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
    </form>
</body>
</html>
