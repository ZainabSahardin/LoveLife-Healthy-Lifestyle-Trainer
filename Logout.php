<?php
session_start();    // start a resume session
session_unset();    // remove the session
session_destroy();  // destroy all the sessions

header("location: index.php");
exit();