<?php
// Logout  
session_start();
session_unset();
header('Location: login.php');