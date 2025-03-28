<?php

// picture class for image storage
class Picture
{

  public $picture_name;
  public $picture_tempname;
  public $picture_path;

  public function __construct()
  {
    // initilization of picture name, temp location and file path
    $this->picture_name = "";
    $this->picture_tempname = "";
    $this->picture_path = "";
  }

  public function set_picture_path()
  {
    // adding picture path
    $this->picture_path = UploadDir . "/" . basename($this->picture_name);
  }

  public function move_picture()
  {
    // moving uploaded picture to upload directory
    move_uploaded_file($this->picture_tempname, $this->picture_path);

  }

}
