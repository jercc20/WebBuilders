<?php

$dir = "../imgs/";

if (is_writable($dir)) {
  if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 1048576)) {
    if ($_FILES["file"]["error"] > 0){
      echo 0;
    }
    else {
      $_FILES["file"]["name"] = str_replace(' ', '_' , $_FILES["file"]["name"]);
      if (file_exists($dir . $_FILES["file"]["name"])) {
        echo 2;
      }
      else {
        move_uploaded_file($_FILES["file"]["tmp_name"], $dir . $_FILES["file"]["name"]);
        echo 1;
      }
    }
  }
  else {
    echo 0;
  }
}
else {
  echo 0;
}

?>