<?php

// upload dir path
const UploadDir = "./uploads";

// upload dir initilization
if (!is_dir(UploadDir)) {
  mkdir(UploadDir, 0777, true);
}

// creating firstname ,lastname 
$firstname = new Name();
$lastname = new Name();

// new picture object
$profile_picture = new Picture();

// new marks object
$marks = new Marks();

// new phone number object
$phone_number = new Phone_Number();

// new email object
$email_addr = new Email_Address();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // setting name values
  $firstname->name_validate($_POST["firstname"]);
  $lastname->name_validate($_POST["lastname"]);

  // adding picture name, picture temp name
  $profile_picture->picture_name = $_FILES['picture']['name'];
  $profile_picture->picture_tempname = $_FILES['picture']['tmp_name'];
  // adding picture path to picture object and moving uploaded picture to upload directory
  $profile_picture->set_picture_path();
  $profile_picture->move_picture();

  // setting marks
  $marks->set_string_marks(datarefine($_POST["textarea"]));

  // validating PhoneNumber
  $phone_number->phone_validate($_POST["phone"]);

  // validating email address
  $email_addr->email_validate($_POST["email"]);

}

?>
<div class="task">
  <h1>Question 5</h1><br><br>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?q=5'); ?>" class=" phpform"
    enctype="multipart/form-data">

    <!-- firstName input -->
    First Name : <input type="text" id="firstname" name="firstname">
    <!-- span showing error for empty value or wrong values -->
    <span> * <?php echo $firstname->wrong_name_value . $firstname->empty_name_value ?></span>
    <p id="first-name-err" class="error">First name cannot be empty</p>
    <br>

    <!-- lastName input -->
    Last Name : <input type="text" id="lastname" name="lastname"><span> *
      <!-- span showing error for empty value or wrong values -->
      <?php echo $lastname->wrong_name_value . $lastname->empty_name_value ?></span>
    <br>
    <p id="last-name-err" class="error">Last name cannot be empty</p>

    <!-- lastName input -->
    Full Name : <input type="text" id="fullname" name="fullname" disabled><br><br>

    <!-- image input -->
    Upload Image : <input type="file" id="picture" name="picture"><br><br>

    <!-- textarea input --><!-- Marks Input -->
    Input Marks : <textarea name="textarea" id="textarea" placeholder="Enter marks in format : Subject|Marks" rows="10"
      cols="50"></textarea><br>
    <p id="marks-err" class="error">Marks cannot be empty</p>
    <br>

    Phone Number :
    <input type="text" name="phone" id="phone"><span> *
      <!-- span showing error for empty value or wrong values -->
      <?php echo $phone_number->wrong_phone_value . $phone_number->empty_phone_value ?></span><br>
    <p id="phone-err" class="error">Phone number cannot be empty</p>
    <br>

    Email Address : <input type="text" name="email" id="email"><span> *
      <!-- span showing error for invalid syntax or wrong values -->
      <?php echo $email_addr->invalid_syntax_email_value . $email_addr->wrong_email_value ?></span><br>
    <p id="email-err" class="error">Email number cannot be empty</p>
    <br>

    <!-- Submit button -->
    <input type="submit" id="submit" value="Submit"><br>
  </form>

  <div class="formoutput">
    <!-- form image output -->
    <div class="formimage">
      <?php
      // showing uploaded image
      if (!empty($profile_picture->picture_path)) {
        echo "<img src=\"$profile_picture->picture_path\" alt=\"Uploaded Image\" title=\"Uploaded Image\" />";
      }
      ?>
    </div>

    <?php
    if (!empty($firstname->get_name_value()) && !empty($lastname->get_name_value())) {
      echo "<h1>Hello " . $firstname->get_name_value() . " " . $lastname->get_name_value() . "</h1>";
    }
    // Table output claculation
    if (!empty($marks->get_string_marks())) {
      $marks->set_marks_arr();
      ?>
      <!-- Table output -->
      <div class="table">
        <table>
          <tr>
            <th>Subject</th>
            <th>Marks</th>
          </tr>
          <?php
          foreach ($marks->get_marks_arr() as $val) {
            echo "<tr>";
            echo "<td>" . $val[0] . "</td>";
            echo "<td>" . $val[1] . "</td>";
            echo "</tr>";
          }
          ?>
        </table>
      </div>
      <?php
    }
    ?>
  </div>
</div>