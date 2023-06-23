<?php
include_once('config/db.php');
if(isset($_GET['product_id'])){
    $prd_id = $_GET['product_id'];
    $sqlProductDetail = "SELECT * FROM product WHERE product_id = $prd_id";
    $queryProductDetail = mysqli_query($conn,$sqlProductDetail);
    if(mysqli_num_rows($queryProductDetail) > 0){
        $productDetail = mysqli_fetch_assoc($queryProductDetail);
    }else{
        header("Location: home.php");
    }
}else{
    header ("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='public/images/icon.ico' />
    <title>DWG Shop - <?php  echo $productDetail['product_name']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

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
            <div class="container mt-3 mb-5">
                <div class="row">
                    <div class="row mt-3">
                        <div id="sidebar1" class=" col-lg-3 d-md-none d-sm-none d-lg-block">
                            <div id="banner">
                                <div class="banner-item mb-2">
                                    <a href="#"><img class="img-fluid" src="public/images/banner9.png"></a>
                                </div>

                                <div class="banner-item ">
                                    <a href="detail_product.html"><img class="img-fluid" src="public/images/banner2.webp"></a>
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
                                        <a href="detail_product.html">
                                            <img src="public/images/slide1.webp" class="d-block w-100 h-100" alt="...">
                                        </a>

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
                                    <a href="category_product.php"><img class="img-fluid" src="public/images/banner10.png"></a>
                                </div>
                                <div class="banner-item mt-2">
                                    <a href="#"><img class="img-fluid" src="public/images/RightBanner_2_699.png"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <img src="admin/images/<?php echo $productDetail['pro_img']; ?>" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="admin/images/<?php echo $productDetail['pro_img']; ?>" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="admin/images/<?php echo $productDetail['pro_img']; ?>" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="admin/images/<?php echo $productDetail['pro_img']; ?>" class="d-block w-100" alt="...">
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
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="product_name">
                                <div class="card h-100 w-100" style="width: 18rem;">
                                    <div class="card-body">
                                        <h3 class="card-title text-dark ">
                                        <?php echo $productDetail['product_name']; ?>    
                                        </h3>
                                        <h4 class="price text-danger"> <?php echo number_format($productDetail['product_price']); ?> VND </h4>
                                        <p class="card-text">
                                            <ul>
                                                <li><span>
                                                    Screen:
                                                </span>OLED 6.7-inch</li>
                                                <li><span>
                                                    Storage:
                                                </span> 128GB</li>
                                                <li><span>
                                                    Camera:
                                                </span>48MP </li>
                                                <li>
                                                    <span>Chip:</span> A16 Bionic
                                                </li>
                                                <li><span>
                                                    Condition
                                                </span> New, genuine accessories</li>
                                                <li>Warranty: <Span><?php echo $productDetail['prd_warranty']; ?></Span></li>
                                                

                                            </ul>

                                        </p>
                                       
                                        <p class="Promotion">Promotion </p>
                                        <ul>
                                            <li><?php echo $productDetail['prd_promotion']; ?></li>
                                            <li>No Cost EMI options available on Credit Cards</li>
                                            <li>Trade in your old phone and get attractive exchange price.</li>
                                            <li>Up to 1% more discount for Smember members (applicable depending on products)</li>
                                            <li>Comprehensive product protection with extended warranty service</li>
                                            <li>New old collection: High price - Quick procedure - Best subsidy</li>
                                            <li>Extra 4% off (up to 250,000 VND) via Moca wallet for orders from 500,000 VND</li>
                                        </ul>
                                        <p class="Status">
                                        <?php
                                        if($productDetail['product_status'] == 1){
                                            echo "<span class=' text-success'>Availability</span>";
                                        }else{
                                            echo "<span class=' text-danger'>Out of stock</span>";

                                        }
                                        ?>

                                        </p>


                                    </div>
                                    <div class="card-footer text-muted">
                                        <a href="#" class="btn btn-danger">Buy now</a>
                                        <a href="#" class="btn btn-warning ">
                                            <i class="fa-solid fa-cart-shopping "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-lg-12 col-sm-12">
                            <div class="box_content bg-light">
                                <div class="contents " style="padding:3%; border-radios: 20px">
                                <h3 for="" class="text-danger">Product Reviews</h3>
                                <p><?php echo $productDetail['prd_details'] ?></p>
                                    <!-- <p class="content mb-2">
                                        The iPhone 14 Pro Max features an innovative new way of receiving notifications and activities with the Dynamic Island, the Always-On display, the first-ever 48MP camera on an iPhone, Crash Detection, Emergency SOS via satellite, and much more.
                                    </p>
                                    <img width="50%" height="50%" src="public/images/ip14_4.jpg" alt="" class="mt-3 mb-3">
                                    <p class="content mb-2">The Dynamic Island, a new design that introduces an intuitive way to experience the iPhone, and the Always-On display make the iPhone 14 Pro Max the most technologically advanced Pro lineup ever. The iPhone 14 Pro Max
                                        introduces a new class of pro camera system with the first-ever 48MP main camera on an iPhone featuring a quad-pixel sensor and Photonic Engine, an enhanced image pipeline that ultimately improves low-light photos
                                        and powered by the A16 Bionic, the fastest chip ever in a smartphone. With features including Emergency SOS via satellite and Crash Detection, the iPhone has become indispensable for everyday tasks, craft projects,
                                        and now even emergency situations.
                                    </p>
                                    <img src="public/images/ip14_1.webp" alt="" class="mt-3 mb-3">
                                    <p class="content mb-2">The beautiful surgical-grade stainless steel and textured matte glass design of the iPhone 14 Pro Max is available in four stunning colors. The new iPhones, which come in 6.7-inch sizes, include a new Super Retina XDR
                                        display with ProMotion that, along with a new 1Hz refresh rate and other power-efficient technologies, provides the Always-On display for the first time ever on an iPhone. </p>

                                    <img src="public/images/ip14_2.jpg" alt="" class="mt-3 mb-3">

                                    <p class="content mb-2">
                                        The new 48MP main camera features second-generation sensor-shift optical image stabilization and a quad-pixel sensor that adapts to the photo being captured.
                                    </p>
                                    <img src="public/images/ip14_3.webp" width="50%" height="50%" alt="" class="mt-3 mb-3">
                                    <p>
                                        The iPhone 14 Pro Max A16 Bionic chip, which is many generations ahead of rivals, enables revolutionary experiences like Dynamic Island, powers all-day battery life, and has amazing computational photography capabilities. The new 6-core CPU, which has
                                        two high-performance cores and four high-efficiency cores, is up to 40% faster than the competition and can handle demanding tasks easily. The A16 Bionic has a new 16-core Neural Engine that can perform nearly 17
                                        trillion operations per second and an enhanced 5-core GPU with 50% greater memory bandwidth, making it ideal for graphics-intensive games and apps.
                                    </p> -->
                                </div>

                            </div>

                        </div>
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