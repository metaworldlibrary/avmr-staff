<?php
  if(session_id() == ''){
      session_start();
  }
  if (isset($_SESSION["staff_id"])) {
    echo json_encode($_SESSION, JSON_FORCE_OBJECT);
  }
  else {
    echo 0;
  }
?>
