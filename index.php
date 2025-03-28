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


    <?php

    spl_autoload_register(function ($class) {

      include "./classes/" . $class . ".php";
    });

    // creating firstname ,lastname 
    $firstname = new Name();
    $lastname = new Name();

    // refining data comming from form input
    function datarefine($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    // when form is submitted this code block gets activated
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $firstname->name_validate($_POST["firstname"]);
      $lastname->name_validate($_POST["lastname"]);
    }
    ?>

    <!-- basic html form with input values of firstname, lastname, fullname and a submit button -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">

      <!-- firstName input -->
      First Name : <input type="text" id="firstname" name="firstname">
      <!-- span showing error for empty value or wrong values -->
      <span> * <?php echo $firstname->wrong_name_value . $firstname->empty_name_value ?></span><br><br>

      <!-- lastName input -->
      Last Name : <input type="text" id="lastname" name="lastname"><span> *
        <!-- span showing error for empty value or wrong values -->
        <?php echo $lastname->wrong_name_value . $lastname->empty_name_value ?></span><br><br>

      <!-- lastName input -->
      Full Name : <input type="text" id="fullname" name="fullname" disabled><br><br>

      <!-- Submit button -->
      <input type="submit" value="Submit">
    </form>

    <!-- all fom outputs in this div -->
    <div class="formoutput">

      <!-- Full Name output -->
      <?php
      // showing hello [fullname]
      if (!empty($firstname->get_name_value()) && !empty($lastname->get_name_value())) {
        echo "<h1>Hello " . $firstname->get_name_value() . " " . $lastname->get_name_value() . "</h1>";
      }

      ?>
    </div>
  </div>
</body>

</html>