<?php

class imageUploader
{
  private $imageName;

  public function __construct($imageName)
  {
    $this->imageName = $imageName;
  }

  public function getImageName()
  {
    return $this->imageName;
  }

  public function uploadImage()
  {
    print_r($_FILES);
    echo '<br>';
    $res = "";
    $imageName = $_FILES['image']['name'];
    $imaget = $_FILES['image']['tmp_name'];
    $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($ext, $allowed)) {
      $res = "File type not allowed";
      return $res;
      exit;
    }
    $imageN = uniqid('IMG-', true) . "." . $ext;
    $this->imageName = $imageName;
    $targetPath = "../uploads/" . $imageN;
    if (move_uploaded_file($imaget, $targetPath) == true) {
      $res = "File uploaded successfully";
    } else {
      $res = "File upload failed, please try again.";
    }
    return $res;
  }
}
