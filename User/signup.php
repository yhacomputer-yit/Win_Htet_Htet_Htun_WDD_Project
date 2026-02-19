
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Beauty with Crochet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        .btn-main { background-color: rgba(220, 53, 69, 0.7); border: none; transition: 0.3s; }
        .btn-main:hover { background-color: rgba(220, 53, 69, 0.9); transform: scale(1.05); }
        input::placeholder { font-size: 0.9rem; color: #aaa; }
        .form-control:focus { border-color: #dc3545; box-shadow: none; }
    </style>
</head>
<body style="background-color: #fde2e4;">

    <div class="nav-top d-flex justify-content-end align-items-center gap-2 m-3">
        <a href="login.php" class="btn rounded-pill border-0 text-decoration-none text-dark">Login</a>
        <a href="signup.php" class="btn rounded-pill border-0 bg-danger bg-opacity-50 text-decoration-none text-dark fw-bold">Sign up</a>
        <i class="fa-solid fa-user ms-2"></i>
    </div>

    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="row shadow-lg overflow-hidden bg-white" style="max-width: 950px; width: 100%; border-radius: 20px;">
            
            <div class="col-md-4 d-flex flex-column justify-content-center align-items-center text-white p-5 bg-danger bg-opacity-75">
                <h2 class="fw-bold mb-3 text-center">Welcome Back!</h2>
                <p class="text-center mb-4 small">To keep connected with us please login with your personal info</p>
                <a href="login.php" class="btn border-white text-white rounded-pill px-5 hover-effect">Login</a>
            </div>

            <div class="col-md-8 p-5">
                <h2 class="fw-bold mb-4 text-center">Create Account</h2>
                
                <form action="signup_process.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="small fw-bold text-muted">Full Name</label>
                            <input type="text" name="username" class="form-control border-top-0 border-start-0 border-end-0 rounded-0 shadow-none" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small fw-bold text-muted">Phone Number</label>
                            <input type="text" name="phone" class="form-control border-top-0 border-start-0 border-end-0 rounded-0 shadow-none" placeholder="09xxxxxxxxx" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="small fw-bold text-muted">Email Address</label>
                        <input type="email" name="email" class="form-control border-top-0 border-start-0 border-end-0 rounded-0 shadow-none" placeholder="example@gmail.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="small fw-bold text-muted">City / Location</label>
                        <input type="text" name="location" class="form-control border-top-0 border-start-0 border-end-0 rounded-0 shadow-none" placeholder="Yangon, Mandalay, etc." required>
                    </div>

                    <div class="mb-3">
                        <label class="small fw-bold text-muted">Full Address</label>
                        <input type="text" name="address" class="form-control border-top-0 border-start-0 border-end-0 rounded-0 shadow-none" placeholder="Street, Ward, Township" required>
                    </div>

                    <div class="mb-4">
                        <label class="small fw-bold text-muted">Password</label>
                        <input type="password" name="password" class="form-control border-top-0 border-start-0 border-end-0 rounded-0 shadow-none" placeholder="Create a password" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-main rounded-pill px-5 text-white shadow fw-bold">SIGN UP</button>
                        <p class="text-muted small mt-3">Handmade with love &bullet; Beauty with crochet</p>
                    </div>
                </form>

                <div class="d-flex justify-content-center gap-4 mt-3 fs-5">
                    <a href="#" class="text-danger opacity-50"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-danger opacity-50"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-danger opacity-50"><i class="fab fa-telegram"></i></a>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>