<?php

class Email_Address
{

  private $email_value;
  public $invalid_syntax_email_value;
  public $wrong_email_value;

  public function __construct()
  {
    $this->email_value = "";
    $this->invalid_syntax_email_value = "";
    $this->wrong_email_value = "";
  }

  public function set_email_value($email_value)
  {
    $this->email_value = $email_value;
  }

  public function get_email_value()
  {
    return $this->email_value;
  }


  public function email_validate($which_email_field)
  {
    $this->email_value = datarefine($which_email_field);


    // set API Access Key
    $access_key = 'f250057339c729acef204ce7b92a162c';

    // set email address
    $email_address = $which_email_field;

    // Initialize CURL:
    $ch = curl_init('http://apilayer.net/api/check?access_key=' . $access_key . '&email=' . $email_address . '');

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $validationResult = json_decode($json, true);


    // if firstname is empty show error
    if (!filter_var($this->email_value, FILTER_VALIDATE_EMAIL)) {
      $this->invalid_syntax_email_value = "Wrong Syntax! Correct Way: name@example.com";
      $this->email_value = "";
      $this->wrong_email_value = "";
    } elseif (!$validationResult['mx_found']) {
      // if firstname is wrong show error
      $this->wrong_email_value = "Email address not found!";
      $this->email_value = "";
      $this->invalid_syntax_email_value = "";

    } else {
      $this->wrong_email_value = "";
      $this->invalid_syntax_email_value = "";
    }
  }

}