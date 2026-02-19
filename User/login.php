<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    
    <div class="nav-top d-flex justify-content-end align-items-center gap-2 m-3">
        <a href="login.php" class="btn rounded-pill border-0 bg-danger bg-opacity-50 text-decoration-none text-dark">Login</a>
        <a href="signup.php" class="btn rounded-pill border-0 text-decoration-none text-dark">Sign up</a>
        <i class="fa-solid fa-user ms-2"></i>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./photo_2025-12-30_10-22-42.jpg" alt="Logo" width="100" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav nav-underline me-auto mb-2 w-100 justify-content-center">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="designs.php">Designs</a></li>
                    <li class="nav-item"><a class="nav-link" href="contactme.php">Contact Me</a></li>
                </ul>
                <a href="shoppingcart.php" class="text-dark"> <i class="fa-solid fa-cart-shopping"></i> </a>
            </div>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row shadow-lg overflow-hidden" style="width: 900px; border-radius: 15px;">
            
            <div class="col-md-4 d-flex flex-column justify-content-center align-items-center text-white p-5 bg-danger bg-opacity-50">
                <h2 class="fw-bold mb-3">Hello Friends</h2>
                <a href="signup.php" class="btn border-white text-white rounded-pill px-5">Sign Up</a>
            </div>

            <div class="col-md-8 bg-white p-5 text-center">
                <h2 class="fw-bold mb-5">Login Account</h2>
                
            <form action="login_process.php" method="POST">
    <div class="mb-3 text-start">
        <label class="small fw-bold text-muted">Email Address</label>
        <input type="email" name="email" class="form-control border-top-0 border-start-0 border-end-0 rounded-0 shadow-none" placeholder="example@gmail.com" required>
    </div>
    <div class="mb-4 text-start">
        <label class="small fw-bold text-muted">Password</label>
        <input type="password" name="password" class="form-control border-top-0 border-start-0 border-end-0 rounded-0 shadow-none" placeholder="Enter password" required>
    </div>

    <p class="text-muted small">Handmade with love &bullet; Beauty with crochet</p>

    <button type="submit" name="login_btn" class="btn rounded-pill px-5 text-white shadow bg-danger bg-opacity-75 fw-bold">LOG IN</button>
</form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>