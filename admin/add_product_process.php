<?php
if(isset($_POST['sbm'])) {
    // ktra du lieu truyen tu client len server
    // echo"<pre>";
    // print_r($_POST);
    
    
    // die();
    $prd_name = $_POST['product_name'];
    $prd_price = $_POST['product_price'];
    $prd_cate = $_POST['prd_cate'];
    $prd_status = $_POST['status'];
    $prd_promotion = $_POST['promotion'];
    $prd_warranty = $_POST['warranty'];
    // $prd_feature = $_POST['feature'];
    if(isset($_POST['feature'])){
         $prd_feature = $_POST['feature'];
    }else {
       $prd_feature = 0;
    }
    $prd_detail = $_POST['detail'];
    $prd_image = $_FILES['prd_image']['name'];
    $prd_tmp_image = $_FILES['prd_image']['tmp_name'];
    include_once('../config/db.php');
    $sqlInsertProduct = "INSERT INTO product(product_cate, product_name, product_price, product_status , pro_img ,prd_promotion,prd_featured,prd_warranty,prd_details)
    VALUES ($prd_cate,'$prd_name', $prd_price, $prd_status,'$prd_image','$prd_promotion',$prd_feature,'$prd_warranty','$prd_detail')";

    $queryInsertCate = mysqli_query($conn, $sqlInsertProduct);
    move_uploaded_file($prd_tmp_image , "images/".$prd_image);
    header("Location: products.php");
    }
?>