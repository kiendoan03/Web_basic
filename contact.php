<?php
include_once ('config/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='public/images/icon.ico' />

    <title>DWG Shop - Contact</title>
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
                    <a class="navbar-brand" href="home.php"> <img src="public/images/icon.ico" width="25" height="25" style=" margin-bottom: 7px;" alt=""> DWG Shop</a>
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
                <div class="row mb-5">
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

                </div>
                <div class="row mt-5">
                    <div class="form_contact">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-3 col-md-0"></div>
                                <div class="col-lg-6 col-md-12 bg-light">
                                    <div class="row text-muted mt-2 mb-3">
                                        <h5>We always look forward to hearing from you. Please send all requests, questions according to the information below, we will contact you as soon as possible</h5>
                                    </div>
                                    <div class=" row ">
                                        <div class=" mb-3 col-lg-6 col-md-12 ">
                                            <input type="text " class="form-control " placeholder="Name " name="name ">
                                        </div>
                                        <div class=" mb-3 col-lg-6 col-md-12 ">
                                            <input type="text " class="form-control " placeholder="Phonenumber " name="phonenumber ">
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="mb-3 col-lg-12 col-md-12 ">
                                            <input type="email " class="form-control " name="email " placeholder="Email ">
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="mb-3 col-lg-12 col-md-12 ">
                                            <input type="text " class="form-control " name="address " placeholder="Address ">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label for="exampleFormControlTextarea1" class="form-label">Customer reviews</label>
                                        <textarea name="detail" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="row ms-auto me-auto">
                                        <input type="submit" class="form-control bg-info" name="btn">
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-0 "></div>
                            </div>
                        </form>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4 " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js " integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3 " crossorigin="anonymous "></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js " integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V " crossorigin="anonymous "></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js "></script>"


</body>

</html>