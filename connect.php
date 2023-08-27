
<?php

$HOSTNAME = 'localhost';
$USERNAME = 'root'; 
$PASSWORD = ''; 
$DATABASE = 'signupforms';

swss
$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if (!$con) {
    die(mysqli_error($con));
}


?>
