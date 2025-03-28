<?php

// pattern for correct Phone Number
const PhonePattern = "/^\+91[1-9]\d{9}$/";

class Phone_Number
{
  private $phone_value = "";
  // Initilizing name_value for actual name
  public $empty_phone_value = "";
  // Initilizing empty name_value for errors
  public $wrong_phone_value = "";
  // Initilizing wrong name_value for errors
  public function set_phone_value($phone_value)
  {
    $this->phone_value = $phone_value;
  }
  public function get_name_value()
  {
    return $this->phone_value;
  }

  public function phone_validate($which_phone_field)
  {

    if (empty($which_phone_field)) {
      // if phone Number is empty show error
      $this->empty_phone_value = "Phone Number cannot be empty!";
      $this->set_phone_value("");
      $this->wrong_phone_value = "";
    } elseif (!preg_match(PhonePattern, $which_phone_field)) {
      // if Phone Number is wrong show error
      $this->wrong_phone_value = "Phone Number should start with +91 with 10 digits after";
      $this->set_phone_value("");
      $this->empty_phone_value = "";

    } else {
      // correct lastname is refined
      $this->set_phone_value(datarefine($which_phone_field));
      $this->wrong_phone_value = "";
      $this->empty_phone_value = "";
    }
  }


}