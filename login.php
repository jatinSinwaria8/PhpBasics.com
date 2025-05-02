<?php
session_start();
// check if there is any ongoing sessions
if (isset($_SESSION["login"]) && $_SESSION["login"]) {
  // if yes redirect to main page
  header('Location: ./index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./styles/login.css">
</head>

<body>


  <?php
  // defaulting username and password to empty
  $username = '';
  $password = '';
  $err = "";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    if ($username == 'user' && $password == 'user123') {
      $_SESSION['login'] = true;
      // if credentials are valid, set session variable and redirect to main page
      $_GET['q'] = $_SESSION['q'] ?? 4;
      $redirect = 'Location: index.php?q=' . $_GET['q'];
      header($redirect);
      exit();
    } else {
      // if credentials are invalid, display error message
      $err = "<br><br><p style='color:red;'>Invalid username or password</p>";
    }
  }

  ?>

  <!-- login form -->
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="login-form">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br><br>
    <input type="submit" value="Login">
    <?php echo $err; ?>
  </form>

</body>

</html>