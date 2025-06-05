<?php 
$link = mysqli_connect('db', 'root', 'password');
if (!$link) {
    die('Error:' . mysqli_error());
} 
echo 'Good!';
mysqli_close($link);

?>