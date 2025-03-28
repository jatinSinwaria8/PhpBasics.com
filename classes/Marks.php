<?php

// Marks class for marks processing and storage
class Marks
{

  private $string_marks;
  private $marks_arr;

  // marks string initilization
  public function __construct()
  {
    $this->string_marks = "";
  }

  // function to set string marks
  public function set_string_marks($string_marks)
  {
    $this->string_marks = $string_marks;
  }

  public function get_string_marks()
  {
    return $this->string_marks;
  }

  // function to convert string marks into marks array
  public function set_marks_arr()
  {
    $marks = explode("\n", $this->string_marks);
    $index = 0;
    foreach ($marks as $str) {
      $temp = explode("|", $str);
      $this->marks_arr[$index][0] = $temp[0];
      $this->marks_arr[$index][1] = (int) $temp[1];
      $index++;

    }

  }

  public function get_marks_arr()
  {
    return $this->marks_arr;
  }

}
