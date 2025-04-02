<?php

// autoloader including all classes
spl_autoload_register(function ($class) {
  include "./classes/" . $class . ".php";
});


// upload dir path
const UploadDir = "./uploads";

// file dir path
const FileDir = "./files";

// upload dir initilization
if (!is_dir(UploadDir)) {
  mkdir(UploadDir, 0777, true);
}

// upload dir initilization
if (!is_dir(FileDir)) {
  mkdir(FileDir, 0777, true);
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

// refining data comming from form input
function datarefine($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// function to write on file
function file_write($file_name = "No_name", $file_data)
{
  if ($file_name == "")
    $file_name = "No_name";
  $file = fopen(FileDir . "/" . $file_name . ".doc", "w");
  if ($file) {
    fwrite($file, $file_data);
    fclose($file);
  } else {
    echo "Error opening file";
  }
}



// when form is submitted this code block gets activated
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // validating firstname and lastname 
  $firstname->name_validate($_POST["firstname"]);
  $lastname->name_validate($_POST["lastname"]);

  // adding picture name, picture temp name
  $profile_picture->picture_name = $_FILES['picture']['name'];
  $profile_picture->picture_tempname = $_FILES['picture']['tmp_name'];
  // adding picture path to picture object and moving uploaded picture to upload directory
  $profile_picture->set_picture_path();
  $profile_picture->move_picture();

  // setting marks and marks array
  $marks->set_string_marks(datarefine($_POST["textarea"]));
  $marks->set_marks_arr();

  // validating PhoneNumber
  $phone_number->phone_validate($_POST["phone"]);

  // validating email address
  $email_addr->email_validate($_POST["email"]);

  // file data to write on file and for download file
  $file_data = "";

  // adding name content to file or errors
  if (!($firstname->get_name_value() == "") && !($lastname->get_name_value() == "")) {

    $file_data = "<h1>Hello! " . $firstname->get_name_value() . " " . $lastname->get_name_value() . "</h1><br/> \n ";

  } else {

    $file_data = "<p>$firstname->empty_name_value" . "$firstname->wrong_name_value</p><br/> \n ";
    $file_data .= "<p>$lastname->empty_name_value" . "$lastname->wrong_name_value</p><br/> \n ";
  }

  // adding image data to flie or errors
  if ($profile_picture->picture_path) {
    $file_data .= "<img src='$profile_picture->picture_path' alt='Profile Picture'><br/> \n ";
  } else {
    $file_data .= "<p>Picture not uploaded!</p><br/> \n ";
  }

  // adding marks table to file or errors
  if (!empty($marks->get_marks_arr())) {
    // table of marks
    $file_data .= "<br/><table>\n";
    $file_data .= "<tr>\n";
    $file_data .= "<th>Subject</th>\n";
    $file_data .= "<th>Marks</th>\n";
    $file_data .= "</tr>\n";
    foreach ($marks->get_marks_arr() as $val) {
      $file_data .= "<tr>\n";
      $file_data .= "<td>" . $val[0] . "</td>\n";
      $file_data .= "<td>" . $val[1] . "</td>\n";
      $file_data .= "</tr>\n";
    }
    $file_data .= "</table><br/>\n";
  } else {

    $file_data .= "<p>Marks not uploaded!</p><br/>\n";
  }

  // adding phone number to file or errors
  if ($phone_number->get_phone_value() != "") {
    $file_data .= "<p>Phone Number: " . $phone_number->get_phone_value() . "</p><br/>\n";
  } else {
    $file_data .= "<p>$phone_number->empty_phone_value" . "$phone_number->wrong_phone_value</p><br/> \n ";
  }

  // adding email address to file or errors
  if ($email_addr->get_email_value() != "") {
    $file_data .= "<p>Email Address: " . $email_addr->get_email_value() . "</p><br/>\n";
  } else {
    $file_data .= "<p>$email_addr->invalid_syntax_email_value" . "$email_addr->wrong_email_value</p><br/> \n ";
  }

  // displaying data in word file
  // headers to send data to download file
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=" . $firstname->get_name_value() . "_" . $lastname->get_name_value() . ".doc");
  header("Pragma: no-cache");
  header("Expires: 0");

  // writing data to file in files directory
  file_write($firstname->get_name_value() . "_" . $lastname->get_name_value(), $file_data);

  // displaying data in word file which is then downloaded
  echo $file_data;


  exit();
}
?>
