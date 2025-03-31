<?php

// pattern for correct first and last name
const Pattern = "/^[a-zA-Z]*$/";

// Class name containing name templet
class Name
{
  private $name_value;
  public $empty_name_value;
  public $wrong_name_value;

  // name class constructor
  public function __construct()
  {
    // Initilizing name_value for actual name
    $this->name_value = "";
    // Initilizing empty name_value for errors
    $this->empty_name_value = "";
    $this->wrong_name_value = "";
  }

  // Initilizing wrong name_value for errors
  public function set_name_value($name_value)
  {
    $this->name_value = $name_value;
  }
  public function get_name_value()
  {
    return $this->name_value;
  }

  public function name_validate($which_name_field)
  {
    // if firstname is empty show error
    if (empty($which_name_field)) {
      $this->empty_name_value = "Name field cannot be empty!";
      $this->name_value = "";
      $this->wrong_name_value = "";
    } elseif (!preg_match(Pattern, $which_name_field)) {
      // if firstname is wrong show error
      $this->wrong_name_value = "Input can only contain alphabets";
      $this->name_value = "";
      $this->empty_name_value = "";

    } else {
      // correct firstname is refined
      $this->name_value = datarefine($which_name_field);
      $this->wrong_name_value = "";
      $this->empty_name_value = "";
    }
  }
}