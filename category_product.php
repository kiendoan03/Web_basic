<?php
include_once("config/db.php");
$sqlCategory = "SELECT * FROM category WHERE id_cate =".$_GET["id_cate"];
$queryCateory = mysqli_query($conn, $sqlCategory);
$cat = mysqli_fetch_assoc($queryCateory);
if(isset($_GET["id_cate"])){
    $cate_id = $_GET["id_cate"];
    $limit = 8;
$totalRecords =  "SELECT count(product_id) as total FROM product WHERE product_cate = $cate_id";
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
                    WHERE product_cate = $cate_id
                    ORDER BY P.product_id ASC LIMIT $start,$limit";
$queryAllProducts = mysqli_query($conn, $sqlAllProducts);
}else{
    header("Location: home.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='public/images/icon.ico' />

    <title>DWG Shop - <?php echo $cat['name_cate']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid " style="padding:0% ;">
        <!--	Header	-->
        <div id="header">
            <nav class="navbar navbar-expand-lg  bg-dark navbar-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                    <a class="navbar-brand" href="home.php">
                        <img src="public/images/icon.ico" width="25" height="25" style=" margin-bottom: 7px;" alt=""> DWG Shop</a>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home.php">
                                    <i class="fa-solid fa-house"></i> Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-mobile-screen-button"></i> Products
                                </a>
                             <?php
                                $sqlCategory = "SELECT * FROM category ORDER BY id_cate ASC";
                                $queryCateory = mysqli_query($conn, $sqlCategory);

                                ?>
                                <ul class="dropdown-menu dropdown-menu-dark bg-dark">
                                    <?php
                                    if(mysqli_num_rows($queryCateory) > 0) {
                                        while($cate = mysqli_fetch_assoc($queryCateory)){

                                    ?>
                                    <li><a class="dropdown-item bg-dark " href="category_product.php?id_cate=<?php echo $cate['id_cate']; ?>"><?php echo $cate['name_cate'] ?></a></li>
                                    <?php
                                                                            }
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="about.php">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="contact.php">Contact</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active " href="cart.php">
                                    <i class="fa-solid fa-cart-plus"></i> Cart
                                </a>
                            </li>

                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light " type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <!--	End Header	-->

        <!--	Body	-->
        <div id="body">
            <div class="container mt-3 mb-3">
                <div class="row">
                    <div class="row mt-3">
                        <div id="sidebar1" class=" col-lg-3 d-md-none d-sm-none d-lg-block">
                            <div id="banner">
                                <div class="banner-item mb-2">
                                    <a href="#"><img class="img-fluid" src="public/images/banner9.png"></a>
                                </div>

                                <div class="banner-item ">
                                    <a href="#"><img class="img-fluid" src="public/images/banner2.webp"></a>
                                </div>

                            </div>
                        </div>
                        <div id="slide" class="col-lg-6 col-md-12 col-sm-12 mt-2">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>

                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="public/images/slide1.webp" class="d-block w-100 h-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="public/images/slide2.webp" class="d-block w-100 h-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="public/images/slide3.png" class="d-block w-100 h-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="public/images/RightBanner_2_699.png" class="d-block w-100 h-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="public/images/banner2.webp" class="d-block w-100 h-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                            </div>
                        </div>
                        <div id="sidebar2" class=" col-lg-3 d-md-none d-sm-none d-lg-block">
                            <div id="banner2">

                                <div class="banner-item ">
                                    <a href="#"><img class="img-fluid" src="public/images/banner10.png"></a>
                                </div>
                                <div class="banner-item mt-2">
                                    <a href="#"><img class="img-fluid" src="public/images/RightBanner_2_699.png"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row mt-5">
                        <p>Buy an Apple iPhone online to indulge in an unbelievable and exemplary smartphone experience. Our latest iPhones have the A14 Bionic, the fastest and most advanced chip in a smartphone, making your smartphone experience glorious
                    </div> -->
                    <div class="row mt-2">
                        <div class="title">
                            <?php
                            $sqlCategory = "SELECT * FROM category WHERE id_cate =".$_GET["id_cate"];
                            $queryCateory = mysqli_query($conn, $sqlCategory);
                            $cat = mysqli_fetch_assoc($queryCateory);
                            ?>
                            <h4 class="title mt-3 " ><?php echo $cat['name_cate'] ?></h4>
                            <div class="row mt-3">
                                <img src="admin/images/<?php echo $cat['cate_img']; ?>" alt="">
                            </div>
                            <!-- <div class="row">
                                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active" data-bs-interval="10000">
                                            <img src="public/images/ipbanner.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item" data-bs-interval="2000">
                                            <img src="public/images/bannerip.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="public/images/ip13banner.jpg" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div> -->

                        </div>

                        <?php
                        if(mysqli_num_rows($queryAllProducts) > 0) {
                            while($pro = mysqli_fetch_assoc($queryAllProducts)){
                        ?>

                        <div class="col-lg-3 col-md-6 col-sm-12 mt-5 mb-5">

                            <div class="card h-100">
                                <a href="detail_product.php?product_id=<?php echo $pro['product_id'];?>"> <img src="admin/images/<?php echo $pro['pro_img']; ?>" class="card-img-top" alt="...">
                                </a>

                                <div class="card-body">
                                    <a href="detail_product.php?product_id=<?php echo $pro['product_id'];?>" class="text-decoration-none">
                                        <h5 class="card-title text-dark "> <?php echo $pro['product_name'];  ?></h5>
                                        <span class="price text-danger"> <?php echo number_format($pro['product_price']); ?> VND</span>
                                        <p class="card-text text-dark">Promotion: <?php echo $pro['prd_promotion']; ?></p>
                                    </a>
                                </div>


                                <div class="card-footer">
                                    <small class="text-muted "> 
                                        <i class="fa-solid fa-star" style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>

                                    </small>
                                </div>
                            </div>


                        </div>

                        <?php
                            }
                        }       
                        ?>
                        <div class="current text-center">
                              <nav aria-label="Page navigation example  ">
                    <ul class="pagination">
                        <?php
                        if($current_page > 1 && $total_page > 1){
                            $pev = $current_page - 1;
                            echo' <li class="page-item">
                        <a class="page-link" href="category_product.php?id_cate='.$cate_id.'&current_page='.$pev.'" aria-label="Previous">
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
                                echo '<li class="page-item"><a class="page-link" href="category_product.php?id_cate='.$cate_id.'&current_page='.$i.'">'.$i.'</a></li>';
                            }
                        }
                        ?>
                    <?php
                    if($current_page < $total_page && $total_page > 1){
                        $next = $current_page + 1;
                        echo ' <li class="page-item">
                        <a class="page-link" href="category_product.php?id_cate='.$cate_id.'&current_page='.$next.'" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                        </li>';
                    }
                    ?>
                    
                    </ul>
                    </nav>
                        </div>
                       
                        <!-- <div class="col-lg-3 col-md-6 col-sm-12 mt-5">

                            <div class="card h-100">
                                <a href="#"> <img src="public/images/ip13promax.webp" class="card-img-top" alt="...">
                                </a>

                                <div class="card-body">
                                    <a href="#" class="text-decoration-none ">
                                        <h5 class="card-title text-dark ">iPhone 13 Pro Max 128GB</h5>
                                        <span class="price text-danger">27.690.000VND</span>
                                        <p class="card-text text-dark">Enter code CPSONL500 when paying VNPAY to receive discount...</p>
                                    </a>
                                </div>


                                <div class="card-footer">
                                    <small class="text-muted "> 
                                        <i class="fa-solid fa-star" style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>

                                    </small>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-5">

                            <div class="card h-100">
                                <a href="detail_product.php"> <img src="public/images/ip14promax.webp" class="card-img-top" alt="...">
                                </a>

                                <div class="card-body">
                                    <a href="detail_product.html" class="text-decoration-none">
                                        <h5 class="card-title text-dark ">iPhone 14 Pro Max 128GB</h5>
                                        <span class="price text-danger">32.990.000VND</span>
                                        <p class="card-text text-dark">Discount up to 2 million when paying via wallet/bank MSB, Moca,...</p>
                                    </a>
                                </div>


                                <div class="card-footer">
                                    <small class="text-muted "> 
                                        <i class="fa-solid fa-star" style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>

                                    </small>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-5">

                            <div class="card h-100">
                                <a href="#"> <img src="public/images/ip13promax.webp" class="card-img-top" alt="...">
                                </a>

                                <div class="card-body">
                                    <a href="#" class="text-decoration-none ">
                                        <h5 class="card-title text-dark ">iPhone 13 Pro Max 128GB</h5>
                                        <span class="price text-danger">27.690.000VND</span>
                                        <p class="card-text text-dark">Enter code CPSONL500 when paying VNPAY to receive discount...</p>
                                    </a>
                                </div>


                                <div class="card-footer">
                                    <small class="text-muted "> 
                                        <i class="fa-solid fa-star" style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>

                                    </small>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-5">

                            <div class="card h-100">
                                <a href="detail_product.php"> <img src="public/images/ip14promax.webp" class="card-img-top" alt="...">
                                </a>

                                <div class="card-body">
                                    <a href="detail_product.html" class="text-decoration-none">
                                        <h5 class="card-title text-dark ">iPhone 14 Pro Max 128GB</h5>
                                        <span class="price text-danger">32.990.000VND</span>
                                        <p class="card-text text-dark">Discount up to 2 million when paying via wallet/bank MSB, Moca,...</p>
                                    </a>
                                </div>


                                <div class="card-footer">
                                    <small class="text-muted "> 
                                        <i class="fa-solid fa-star" style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>

                                    </small>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-5">

                            <div class="card h-100">
                                <a href="#"> <img src="public/images/ip13promax.webp" class="card-img-top" alt="...">
                                </a>

                                <div class="card-body">
                                    <a href="#" class="text-decoration-none ">
                                        <h5 class="card-title text-dark ">iPhone 13 Pro Max 128GB</h5>
                                        <span class="price text-danger">27.690.000VND</span>
                                        <p class="card-text text-dark">Enter code CPSONL500 when paying VNPAY to receive discount...</p>
                                    </a>
                                </div>


                                <div class="card-footer">
                                    <small class="text-muted "> 
                                        <i class="fa-solid fa-star" style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>

                                    </small>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-5">

                            <div class="card h-100">
                                <a href="detail_product.php"> <img src="public/images/ip14promax.webp" class="card-img-top" alt="...">
                                </a>

                                <div class="card-body">
                                    <a href="detail_product.html" class="text-decoration-none">
                                        <h5 class="card-title text-dark ">iPhone 14 Pro Max 128GB</h5>
                                        <span class="price text-danger">32.990.000VND</span>
                                        <p class="card-text text-dark">Discount up to 2 million when paying via wallet/bank MSB, Moca,...</p>
                                    </a>
                                </div>


                                <div class="card-footer">
                                    <small class="text-muted "> 
                                        <i class="fa-solid fa-star" style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>

                                    </small>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-5">

                            <div class="card h-100">
                                <a href="#"> <img src="public/images/ip13promax.webp" class="card-img-top" alt="...">
                                </a>

                                <div class="card-body">
                                    <a href="#" class="text-decoration-none ">
                                        <h5 class="card-title text-dark ">iPhone 13 Pro Max 128GB</h5>
                                        <span class="price text-danger">27.690.000VND</span>
                                        <p class="card-text text-dark">Enter code CPSONL500 when paying VNPAY to receive discount...</p>
                                    </a>
                                </div>


                                <div class="card-footer">
                                    <small class="text-muted "> 
                                        <i class="fa-solid fa-star" style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>
                                        <i class="fa-solid fa-star"  style="color: rgb(240, 214, 38);"></i>

                                    </small>
                                </div>
                            </div>


                        </div> -->

                    </div>
                </div>
            </div>
        </div>

        <!-- End body-->

        <!-- Footer-->
        <div id="footer mt-5 ">
            <div class="footer bg-light text-dark " style="padding: 0%;">
                <div class="row">

                    <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                        <div class="about text-center">
                            <a href="#" class=" text-decoration-none text-muted">

                                <h5>About us</h5>
                            </a>
                            <span>DWG is a company dedicated to providing high quality genuine Apple products and is sponsored by Apple.</span>
                        </div>


                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                        <div class="partner text-center">
                            <h6 class="title text-muted">Partner</h6>
                            <span>Distribution policy of genuine Apple products in Vietnam</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 mb-2">
                        <div class="hotline  mt-2">
                            <h6 class="text-muted text-center">Contact</h6>
                            <div class="content" style="padding-left: 25%;">
                                <p><span class="text-danger"><i class="fa-solid fa-phone"></i> Hotline: </span>19001080</p>
                                <p><span><i class="fa-solid fa-location-dot "></i> Gol Tower 253 Cau Giay, Hanoi </span></p>
                                <p>
                                    <span>Email: dwg@gmail.com</span>
                                </p>

                            </div>


                        </div>
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