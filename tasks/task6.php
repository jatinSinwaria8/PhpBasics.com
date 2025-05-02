<div class="task">
  <h1>Question 6</h1><br><br>

  <!-- basic html form with input values of firstname, lastname, fullname and a submit button -->
  <form method="post" action="form_action.php" enctype="multipart/form-data" class="phpform">

    <!-- firstName input -->
    First Name : <input type="text" id="firstname" name="firstname">
    <p id="first-name-err" class="error">First name cannot be empty</p>
    <br>

    <!-- lastName input -->
    Last Name : <input type="text" id="lastname" name="lastname"><span> *
      <br>
      <p id="last-name-err" class="error">Last name cannot be empty</p>

      <!-- lastName input -->
      Full Name : <input type="text" id="fullname" name="fullname" disabled><br><br>

      <!-- image input -->
      Upload Image : <input type="file" id="picture" name="picture"><br>

      Phone Number : <input type="text" name="phone" id="phone"><br>
      <p id="phone-err" class="error">Phone number cannot be empty</p>

      <!-- Marks Input -->
      Input Marks : <textarea name="textarea" id="textarea" placeholder="Enter marks in format : Subject|Marks"
        rows="10" cols="50"></textarea><br>
      <p id="marks-err" class="error">Marks cannot be empty</p>

      <!-- email input -->
      Email Address : <input type="text" name="email" id="email"><br>
      <p id="email-err" class="error">Email number cannot be empty</p>

      <!-- Submit button -->
      <input type="submit" id="submit" value="Submit"><br>
  </form>

</div>