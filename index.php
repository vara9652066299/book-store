<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery File -->
    <script src="includes/jquery_latest.js"></script>
    <!-- BootStrap files -->
    <link rel="stylesheet" href="bootstrap-5/css/bootstrap.min.css">
    <script src="bootstrap-5/js/bootstrap.min.js"></script>
    <!-- External CSS File -->
    <link rel="stylesheet" href="css/style.css">
    <title>BOOK-SHARE</title>
    <style>
        
    </style>
</head>

<body>
    <!-- NavBar Starts -->
    <nav class="navbar navbar-expand-lg" style="background-color: #65b741;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BOOK-SHARE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <!-- <i class="fa-solid fa-bars"></i> -->
                <span class="navbar-toggler-icon text-white">Menu</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="admin/login.php">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donor/login.php">Donor Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="seeker/login.php">Seeker Login</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Slider code Start -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/slider1.jpg" class="d-block w-100" alt="Slider Image 1">
            </div>
            <div class="carousel-item">
                <img src="images/slider2.jpg" class="d-block w-100" alt="Slider Image 2">
            </div>
            <div class="carousel-item">
                <img src="images/slider3.jpg" class="d-block w-100" alt="Slider Image 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Why Vidya-Dhan -->
    <div class="container">
        <div class="row mb-5">
            <h3 class="text-center mt-2 mb-3"><u>Why BOOK-SHARE?</u></h3>
            <div class="col-md-4">
                <img src="images/image1.jpg" height="350px;" alt="Student Image">
            </div>
            <div class="col-md-6">
                <p class="para1">
                    While millions of students in India cannot afford the books they wish to read, there are privileged
                    people who have the same books lying on their shelves - books that they have already read.
                <p class="para2">BOOK-SHARE aims to bridge this gap!</p>
                </p>
            </div>
        </div>
    </div>

    <!-- How you can reach? -->
    <div class="container">
        <div class="row mb-5">
            <h3 class="text-center mt-2 mb-5"><u>How you can reach?</u></h3>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header">Our Address</h5>
                    <div class="card-body">
                        <p class="card-text"><p class="card-text">Veltech univercity, Morai Road, chennai, Tamilnadu</p>
                        <p>Pin Code - 600062</p></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header">Contact US</h5>
                    <div class="card-body">
                        <p class="card-text">Email: bookshare@gmail.com</p>
                        <p>Business Email: business@bookshare.com</p>
                        <p>Toll Free No: 1800-8877-5588</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header">Ask People</h5>
                    <div class="card-body">
                        <p class="card-text">BOOK-SHARE is so popular among the people that you can ask people around you, you can easily reach to us.</p>
                        <p>See you soon...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Locate us on Google Map -->
    <div class="container">
        <div class="row mb-5">
            <h3 class="text-center mt-2 mb-5"><u>Search US on Google Map</u></h3>
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/@13.1765659,80.0974784,16.98z?entry=ttu&g_ep=EgoyMDI0MTIwMS4xIKXMDSoASAFQAw%3D%3D" width="1300" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid">
        <div class="footer">
            <p>Copyright &copy 2024 BOOK-SHARE.com</p>
        </div>
    </div>
</body>

</html>