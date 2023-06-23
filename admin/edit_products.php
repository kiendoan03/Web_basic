<?php
//connect to Database 
include_once('../config/db.php');
$sqlAllcategories = "SELECT * FROM category ORDER BY id_cate ASC";
$queryAllCategories = mysqli_query($conn,$sqlAllcategories);
if(isset($_GET['product_id'])){
    $sqlEditPrd = "SELECT * FROM product WHERE product_id =" .$_GET['product_id'];;
    $queryEditPrd = mysqli_query($conn,$sqlEditPrd);
    if(mysqli_num_rows($queryEditPrd)>0){
    $prd = mysqli_fetch_assoc($queryEditPrd);
    }else{
        header("Location: product.php");
    }
    if(isset($_POST['sbm'])) {
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $prd_cate = $_POST['prd_cat'];
    $prd_status = $_POST['prd_status'];
    $prd_promotion = $_POST['prd_promotion'];
    $prd_warranty = $_POST['prd_warranty'];
    if(isset($_POST['prd_feature'])){
        $prd_feature = $_POST['prd_feature'];
   }else {
      $prd_feature = 0;
   }
   $prd_detail = $_POST['prd_detail'];
         $prd_id = $prd['product_id'];
if(!empty($_FILES['prd_img']['name'])){
      $prd_image = $_FILES['prd_img']['name'];
       $prd_tmp_image = $_FILES['prd_img']['tmp_name'];
       move_uploaded_file($prd_tmp_image , "images/".$prd_image);
}else{
         $prd_image = $prd['pro_img'];
}

$sqlUpdatePrd = "UPDATE product SET product_name = '$prd_name', product_price = $prd_price, pro_img = '$prd_image', product_status =$prd_status, product_cate = $prd_cate, prd_details = '$prd_detail', prd_warranty = '$prd_warranty', prd_promotion = '$prd_promotion', prd_featured = $prd_feature
WHERE product_id = ".$_GET['product_id'];
mysqli_query($conn, $sqlUpdatePrd);

header("Location: products.php");
    }
}else{
    header("Location: Product.php");
}




// if(isset($_POST['sbm'])) {
//     // if(empty($_POST['prd_name'])) {
//     //     $errors['prd_name'] = '<span style="color:red;"> You need to enter a name</span>';
//     // }else{
//         $sqlAllProducts = "SELECT * FROM product WHERE product_id = " .$_GET['product_id'];
//         $queryAllProducts = mysqli_query($conn, $sqlAllProducts);
//         $prd = mysqli_fetch_assoc($queryAllProducts);
//         $prd_name = $_POST['prd_name'];
//         $prd_price = $_POST['prd_price'];
//         $prd_cate = $_POST['prd_cat'];
//         $prd_status = $_POST['prd_status'];
//         $prd_promotion = $_POST['prd_promotion'];
//         $prd_warranty = $_POST['prd_warranty'];
//         if(isset($_POST['prd_feature'])){
//             $prd_feature = $_POST['prd_feature'];
//        }else {
//           $prd_feature = 0;
//        }
//     //    echo $prd['pro_img'];
//     //    die();
//        $prd_detail = $_POST['prd_detail'];
//          $prd_id = $prd['product_id'];
// if(isset($_FILES['prd_img']['name'])){
//       $prd_image = $_FILES['prd_img']['name'];
//        $prd_tmp_image = $_FILES['prd_img']['tmp_name'];
//        move_uploaded_file($prd_tmp_image , "images/".$prd_image);
// }
// if(!isset($_FILES['prd_img']['name'])){
//          $prd_image = $prd['pro_img'];
//          echo $prd_image;
//          die();
// }
//         // echo $prd['pro_img'];
//     //     echo '<br>';
//         echo $prd_image; 
//        die();
//         // $sqlCheck = "SELECT * FROM product WHERE product_name = '$prd_name'";
//         // $queryCheck = mysqli_query($conn, $sqlCheck);
//         // if(mysqli_num_rows($queryCheck) > 0 ){
//         //     $errors['error'] ='<span style="color:red;"> Product already exist </span>';
//         // }else{
//             $sqlUpdatePrd = "UPDATE product SET product_name = '$prd_name', product_price = $prd_price, pro_img = '$prd_image', product_status =$prd_status, product_cate = $prd_cate, prd_details = '$prd_detail', prd_warranty = '$prd_warranty', prd_promotion = '$prd_promotion', prd_featured = $prd_feature
//             WHERE product_id = ".$_GET['product_id'];
//             mysqli_query($conn, $sqlUpdatePrd);
//             // $queryInsertCate = mysqli_query($conn,$sqlInsertCate);
//             header("Location: products.php");
//         // }
//     // }
// }

?>
   <?php
                    // $sqlAllProducts = "SELECT * FROM product WHERE product_id = ".$_GET['product_id'];
                    // $queryAllProducts = mysqli_query($conn, $sqlAllProducts);
                    // $prd = mysqli_fetch_assoc($queryAllProducts);
                    // $sqlnamePrd = "SELECT product_name FROM product WHERE product_id = ".$_GET['product_id'];
                    // $name_prd=mysqli_query($conn, $sqlnamePrd);
                    // $name = mysqli_fetch_assoc($name_prd);
                    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='../public/images/icon.ico' />

    <title>DWG Shop - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-5 ">
                <div id="head" class="row">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                        <div class="container-fluid">
                        <img src="../public/images/icon.ico" width="25" height="25" style=" margin-bottom: 2px;" alt="">

                            <a class="navbar-brand" href="dashboard.php">DWG Shop</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
                            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                                <ul class="navbar-nav ms-auto">

                                    <li class="nav-item dropdown">

                                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-user"></i> Admin
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-dark bg-dark ">
                                            <li><a class="dropdown-item bg-dark" href="#"><i class="fa-solid fa-user"></i>Profilel</a></li>
                            <li><a class="dropdown-item bg-dark" href="login.php"> <i class="fa-solid fa-right-from-bracket"></i>Log out</a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div id="search" class="row ms-auto">
                    <nav class="navbar bg-light ">
                        <div class="container-fluid">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-dark " type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                </div>
                <div id="menu" class="row">
                    <div class="list-group">
                        <a href="dashboard.php" class="list-group-item list-group-item-action " aria-current="true">
                            <i class="fa-solid fa-gauge"></i> Dashboard
                        </a>
                        <a href="users.php" class="list-group-item list-group-item-action "><i class="fa-solid fa-user"></i> User management</a>
                        <a href="products.php" class="list-group-item list-group-item-action active bg-secondary "><i class="fa-solid fa-mobile-screen-button"></i> Product management</a>
                        <a href="category.php" class="list-group-item list-group-item-action "><i class="fa-solid fa-list-check"></i> Category management</a>
                        <a href="orders.php" class="list-group-item list-group-item-action "><i class="fa-solid fa-cart-shopping"></i> Order management</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
            <div class="row">
                    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-decoration-none text-dark" href="dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
    <li class="breadcrumb-item"><a class="text-decoration-none text-dark"  href="products.php"><i class="fa-solid fa-mobile-screen-button"></i> Product management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit product</li>
  </ol>
</nav>
                    </div>
                
                <div class="row mt-2">
                    <h3 class="text-danger">
                 
                        <h3 class="text-danger"><?php
                     echo $prd['product_name'];
                    //  echo $prd['prd_details'];
                        ?>

                    </h3>
                    <div class="row mt-3">
                    <form  role="form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                      <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                    <label>Name</label>
                                    <input required name="prd_name" value="<?php echo $prd['product_name']?>"  class="form-control" placeholder="">
                                    <?php
                                    if(isset($errors['error'])){
                                        echo $errors['error'];
                                    }
                                    ?>
                                    
                                </div>
                                <div class="mb-3">
                                    <label>Price</label>
                                    <input required name="prd_price" value="<?php echo $prd['product_price']?>" class="form-control" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label>Category</label>
                                    <select name="prd_cat" required class="form-select" aria-label="Default select example">
                                    <?php 
                                   
                                    if(mysqli_num_rows($queryAllCategories)){
                                        while($cate = mysqli_fetch_array($queryAllCategories)){

                                    ?>
                                        <option <?php if($prd['product_cate'] == $cate['id_cate']){echo 'selected';} ?> value= <?php echo $cate['id_cate'];?>><?php echo $cate['name_cate'];?></option>
                                        <?php
                                          }
                                    }
                                    ?>
                                        

                                      
                                      </select>
                                </div>
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select class="form-select" required name="prd_status" aria-label="Default select example">
                                        
                                        <option value="1" <?php if($prd['product_status'] == 1){echo 'selected';} ?> >Availability</option>
                                        <option value="0" <?php if($prd['product_status'] == 0){echo 'selected';} ?>>Out of stock</option>
                                        

                                      
                                      </select>
                                </div>
                               
                                <div class="mb-3">
                                    <label>Promotion</label>
                                    <input  name="prd_promotion" value=" <?php echo $prd['prd_promotion']; ?>" required class="form-control" placeholder="">
                                </div>
                                <div class="mb-3">
                                <label>Warranty</label>
                                    <input  value="<?php echo $prd['prd_warranty'] ?>" name="prd_warranty" required class="form-control" placeholder="">
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" name="prd_feature" type="checkbox" value="1" <?php if($prd['prd_featured'] == 1){echo 'checked';} ?> id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                    Featured product
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Product details</label>
                                    <textarea name="prd_detail" required class="form-control"  id="exampleFormControlTextarea1" rows="3"><?php echo $prd['prd_details'] ?></textarea>
                                </div>
                                <input type="submit" name ="sbm" value="Update" class="btn btn-danger"></input>
                                <button type="reset" class="btn btn-primary">Reset</button>
                                </div>
                                
                             <div class="col-lg-6 col-md-12">
                            
                                 <label  class="form-label mt-3">Product image</label>
                            <form>
                            <input class="form-control form-control-sm mb-3"  name="prd_img"  type="file" onchange="preview()">
                            <div class="row">
                              <img id="frame"  src="images/<?php echo $prd['pro_img']; ?>" />
 
                            </div>
                            </form>
                            
                           
                          </div>
                                </div>
                              
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
    function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js "></script>"
</body>

</html>