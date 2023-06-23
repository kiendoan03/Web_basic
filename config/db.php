<?php
$conn = mysqli_connect('localhost','root','','shop');
if(!$conn){
    die("Ket noi khong thanh cong".mysql_connect_error());
}
mysqli_set_charset($conn,'UTF8');
?>