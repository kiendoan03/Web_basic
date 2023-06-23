<?php
include_once("../config/db.php");
if(isset($_GET['id_cate'])){
$sqlCheckDel = "SELECT * FROM category WHERE id_cate = ".$_GET['id_cate'];
$queryCheckDel = mysqli_query($conn, $sqlCheckDel);
    if(mysqli_num_rows($queryCheckDel) > 0){
    $sqlDel = "DELETE FROM category WHERE id_cate =" .$_GET['id_cate'];
    mysqli_query($conn, $sqlDel);
    header("location: category.php");
    }
    else{
    header("location: category.php");
    }
}
?>