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
                <div id="search" class="row ms-auto ">
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
                        <a href="dashboard.php" class="list-group-item list-group-item-action active bg-secondary" aria-current="true">
                            <i class="fa-solid fa-gauge"></i> Dashboard
                        </a>
                        <a href="users.php" class="list-group-item list-group-item-action "><i class="fa-solid fa-user"></i> User management</a>
                        <a href="products.php" class="list-group-item list-group-item-action "><i class="fa-solid fa-mobile-screen-button"></i> Product management</a>
                        <a href="category.php" class="list-group-item list-group-item-action "><i class="fa-solid fa-list-check"></i> Category management</a>
                        <a href="orders.php" class="list-group-item list-group-item-action "><i class="fa-solid fa-cart-shopping"></i> Order management</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
            <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    
    <li class="breadcrumb-item active text-dark" aria-current="page"><i class="fa-solid fa-house"></i> Home</li>
  </ol>
</nav>

                <div class="row">

                    <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                        <a href="users.php" class="text-decoration-none">
                           <div class="card border-danger mb-3" style="max-width: 18rem;">
                            <div class="card">
                                <img src="images/user.png" alt="">
                            </div>
                            <div class="card-body text-danger ">
                                <h5 class="card-title ">30 Users</h5>
                               
                            </div>
                        </div> 
                        </a>
                        
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                        <a href="products.php" class="text-decoration-none">
                              <div class="card border-warning mb-3" style="max-width: 18rem;">
                            <div class="card">
                                <img src="images/shopping-bag-vector-icon-png_267378-removebg-preview.png" alt="">
                            </div>
                            <div class="card-body text-warning ">
                                <h5 class="card-title ">100 Products</h5>
                               
                            </div>
                        </div>
                        </a>
                      
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                        <a href="category.php" class="text-decoration-none">
                            <div class="card border-info mb-3" style="max-width: 18rem;">
                            <div class="card">
                                <img src="images/pngtree-vector-checklist-icon-png-image_319693-removebg-preview.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-info ">3 Categories</h5>
                              
                            </div>
                        </div>
                        </a>
                        
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                        <a href="orders.php" class="text-decoration-none">
                             <div class="card border-primary mb-3" style="max-width: 18rem;">
                            <div class="card">
                                <img src="images/supermarket-shop-logo-vector-removebg-preview.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-primary">25 Orders</h5>
                               
                            </div>
                        </div>
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