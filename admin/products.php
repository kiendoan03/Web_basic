<?php
include_once("../config/db.php");
$limit = 3;
$totalRecords =  "SELECT count(product_id) as total FROM product";
$queryTotalRecords = mysqli_query($conn, $totalRecords);
$result = mysqli_fetch_array($queryTotalRecords);
$total_records = $result['total'];
$total_page = ceil( $total_records/ $limit );
if(isset($_GET['current_page'])){
    $current_page = $_GET['current_page'];
}else{
    $current_page = 1;
}

if($current_page < 1){
    $current_page = 1 ;
}

if($current_page > $total_page){
    $current_page = $total_page;
}

$start = ($current_page - 1) * $limit;



$sqlAllProducts = "SELECT * FROM product P 
                    INNER JOIN category C 
                    ON P.product_cate = C.id_cate
                    ORDER BY P.product_id ASC LIMIT $start,$limit";
$queryAllProducts = mysqli_query($conn, $sqlAllProducts);

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
                                            <li><a class="dropdown-item bg-dark" href="#"><i class="fa-solid fa-user"></i>Profile</a></li>
                            <li><a class="dropdown-item bg-dark" href="login.php"> <i class="fa-solid fa-right-from-bracket"></i>Log out</a></li>

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
                        <a href="products.php" class="list-group-item list-group-item-action active bg-secondary"><i class="fa-solid fa-mobile-screen-button"></i> Product management</a>
                        <a href="category.php" class="list-group-item list-group-item-action "><i class="fa-solid fa-list-check"></i> Category management</a>
                        <a href="orders.php" class="list-group-item list-group-item-action "><i class="fa-solid fa-cart-shopping"></i> Order management</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
            <div class="row">
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a class="text-decoration-none text-dark" href="dashboard.php">
                            <i class="fa-solid fa-house"></i>
                            Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product management</li>
                        </ol>
                    </nav>
                </div>
          
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th class="text-center" scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(mysqli_num_rows($queryAllProducts) > 0) {
                            while($pro = mysqli_fetch_assoc($queryAllProducts)){
                            ?>

                            <tr>
                                <th scope="row">
                                <?php
                                echo $pro['product_id'];
                                ?>

                                </th>
                                <td>
                                <?php
                                echo $pro['product_name'];
                                ?>

                                </td>
                                <td>
                                <?php
                                echo $pro['product_price'].' VND';
                                ?>
                                </td>
                                <td class="text-center"><img width="120" height="120" src="images/<?php echo $pro['pro_img']?>" ></td>
                                <td >
                                    <?php
                                        if($pro['product_status'] == 1){
                                        echo '<span class="label label-success text-success">Availability</span>';
                                        }
                                        else{
                                            echo '<span class="label label-danger text-danger">Out of stock</span>';
                                        }
                                        
                                    ?>
                                </td>
                                <td>
                                <?php
                                    echo $pro['name_cate'];
                                ?>
                                </td>
                                <td><a href="edit_products.php?product_id=<?php echo $pro['product_id'];?>" class="btn btn-warning mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="del_product.php?product_id=<?php echo $pro['product_id'];?>" class="btn btn-danger text-decoration-none mb-2"><i class="fa-solid fa-xmark"></i></a>
                                </td>
                            </tr>
                            <?php

                            }
                            }
                            ?>
                            
                            
                            
                            
                            
                            
                            
                            <!-- <tr>
                                <th scope="row">2</th>
                                <td>Apple Watch SE 2022 40mm</td>
                                <td>6.590.000VND</td>
                                <td class="text-center"><img width="120" height="120" src="images/applewatchse22.webp" alt=""></td>
                                <td style="color: rgb(208, 17, 17);">
                                    Out of stock
                                </td>
                                <td>Accessories</td>
                                <td><a href="edit_products.php" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="#" class="btn btn-danger text-decoration-none"><i class="fa-solid fa-xmark"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Apple MacBook Air M2 2022 8GB 256GB</td>
                                <td>27.690.000VND</td>
                                <td class="text-center"><img width="150" height="120" src="images/macm2.jpeg" alt=""></td>
                                <td style="color: rgb(32, 210, 29);">
                                    Availability
                                </td>
                                <td>Laptop</td>
                                <td><a href="edit_products.php" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="#" class="btn btn-danger text-decoration-none"><i class="fa-solid fa-xmark"></i></a></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                     <ul class="pagination">
                        <?php
                        if($current_page > 1 && $total_page > 1){
                            $pev = $current_page - 1;
                            echo' <li class="page-item">
                        <a class="page-link" href="products.php?current_page='.$pev.'" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>';
                        }
                        ?>
                    
                        
                        <?php
                        for($i = 1;$i < $total_page ; $i ++){
                            if($i == $current_page){
                                echo '<li class="page-item active"><a class="page-link disabled ">'.$i.'</a></li>';
                            }else{
                                echo '<li class="page-item"><a class="page-link" href="products.php?current_page='.$i.'">'.$i.'</a></li>';
                            }
                        }
                        ?>
                    <?php
                    if($current_page < $total_page && $total_page > 1){
                        $next = $current_page + 1;
                        echo ' <li class="page-item">
                        <a class="page-link" href="products.php?current_page='.$next.'" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                        </li>';
                    }
                    ?>
                    
                    </ul>
                </nav>
                <div class="row">
                    <div id="add_member" class="row mt-3">
                        <a href="add_products.php" class="btn btn-info " style="display: inline-block;">
                            <i class="fa-solid fa-plus"></i> Add product
                        </a>
                    </div>
                </div>


            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js "></script>"
</body>

</html>