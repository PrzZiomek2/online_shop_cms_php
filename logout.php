<?php
include('includes/config.php');

unset($_SESSION['id']);
unset($_SESSION['email']);
unset($_SESSION['username']);


header("location: /project_p_ziomek");

die();

?>