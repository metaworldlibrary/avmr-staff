<?php
  if(session_id() == ''){
      session_start();
  }
  if (isset($_SESSION["user_id"])) {
    echo json_encode($_SESSION, JSON_FORCE_OBJECT);
  }
  else {
    echo 0;
  }
?>
