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
                        <a href="users.php" class="list-group-item list-group-item-action  "><i class="fa-solid fa-user"></i> User management</a>
                        <a href="products.php" class="list-group-item list-group-item-action "><i class="fa-solid fa-mobile-screen-button"></i> Product management</a>
                        <a href="category.php" class="list-group-item list-group-item-action "><i class="fa-solid fa-list-check"></i> Category management</a>
                        <a href="orders.php" class="list-group-item list-group-item-action  active bg-secondary"><i class="fa-solid fa-cart-shopping"></i> Order management</a>

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
                            <li class="breadcrumb-item active" aria-current="page">Order management</li>
                        </ol>
                    </nav>
             </div>
            
          <div class="row">
          <table class="table table-light table-striped">
          
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Custemer</th>
      <th scope="col">Product</th>
      <th scope="col">Amount</th>
      <th scope="col">Total</th>
      <th scope="col">Receiver name</th>
      <th scope="col">Receiver address</th>
      <th scope="col">Receiver phone number</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>iPhone 13 Pro Max</td>
      <td>2</td>
      <td>40000000 VND</td>
      <td>Peter</td>
      <td>26 Cau Giay, Hanoi, Viet Nam</td>
      <td>0123456789</td>   
      <td class="text-success">Delivered</td>
      <td><a href="#" class="btn btn-warning mb-2 w-100"> Approve</a>
                                    <a href="#" class="btn btn-danger text-decoration-none mb-2 w-100"><i class="fa-solid fa-xmark"></i></a>
                                </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Nguyen Van An</td>
      <td>iPhone 14 Pro Max</td>
      <td>2</td>
      <td>60000000 VND</td>
      <td>Dinh Phuong Nam</td>
      <td>30 Nguyen Trai, Hanoi, Viet Nam</td>
      <td>0456322478</td>   
      <td class="text-danger">Not approved yet</td>
      <td><a href="#" class="btn btn-warning mb-2 w-100">Approve </a>
                                    <a href="#" class="btn btn-danger text-decoration-none mb-2 w-100"><i class="fa-solid fa-xmark"></i></a>
                                </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Tran Van C</td>
      <td>MacBook Pro</td>
      <td>1</td>
      <td>30000000 VND</td>
      <td>Tran Thi B</td>
      <td>199 Le Dai Hanh, Hanoi, Viet Nam</td>
      <td>0987456321</td>   
      <td class="text-info">Delivery in progress</td>
      <td><a href="#" class="btn btn-warning mb-2 w-100">   Approve </a>
                                    <a href="#" class="btn btn-danger text-decoration-none mb-2 w-100"><i class="fa-solid fa-xmark"></i></a>
                                </td>
    </tr>
  </tbody>

</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
<div class="row">
                    <div id="add_member" class="row mt-3">
                        <a href="#" class="btn btn-info " style="display: inline-block;">
                            <i class="fa-solid fa-plus"></i> Add new 
                        </a>
                    </div>
                </div>
          </div>
           
         

             

             
            <!-- </div> -->

            
      



            </div>
            
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js "></script>"
</body>

</html>