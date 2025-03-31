<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Php Basics</title>

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="./src/index.js"></script>

  <!-- styles -->
  <link rel="stylesheet" href="./styles/styles.css">

</head>

<body>

  <div class="phpform">

    <!-- basic html form with input values of firstname, lastname, fullname and a submit button -->
    <form method="post" action="form_action.php" enctype="multipart/form-data">

      <!-- firstName input -->
      First Name : <input type="text" id="firstname" name="firstname"><br><br>

      <!-- lastName input -->
      Last Name : <input type="text" id="lastname" name="lastname"><br><br>

      <!-- lastName input -->
      Full Name : <input type="text" id="fullname" name="fullname" disabled><br><br>

      <!-- image input -->
      Upload Image : <input type="file" id="picture" name="picture"><br><br>

      Phone Number : <input type="text" name="phone" id="phone"><br><br>

      <!-- Marks Input -->
      Input Marks : <textarea name="textarea" id="textarea" placeholder="Enter marks in format : Subject|Marks"
        rows="10" cols="50"></textarea><br><br>

      <!-- email input -->
      Email Address : <input type="text" name="email" id="email"><br><br>

      <!-- Submit button -->
      <input type="submit" value="Submit"><br>
    </form>


  </div>
</body>

</html>