<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
      <div class="nav-top d-flex justify-content-end align-items-center gap-2 m-3">
    <button id="btn-login" class="btn rounded-pill border-0 bg-danger bg-opacity-50 ">
        <a href="login.php" class="text-decoration-none text-dark">Login</a>
    </button>
    
    <button id="btn-signup" class="btn rounded-pill border-0 bg-danger bg-opacity-50 ">
        <a href="signup.php" class="text-decoration-none text-dark">Sign up</a>
    </button>

    <i class="fa-solid fa-user ms-2"></i>
</div>
     <!-- nav section start -->
     <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="./photo_2025-12-30_10-22-42.jpg" alt="Bootstrap" width="100" height="100" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav nav-underline me-auto mb-2 w-100 justify-content-center ">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="designs.php">Designs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="contactme.php"><button class="bg-danger bg-opacity-50 rounded-pill px-2">Contact Me</button></a>
        </li>     
      </ul>
     <a href="shoppingcart.php"> <i class="fa-solid fa-cart-shopping"></i> </a>
    </div>
  </div>
</nav>
    <!-- nav section end -->
<!-- main section start -->
 <div class="container-fluid py-5" style="background-color: #fca390;"> 
    <div class="container">
        <h4 class="fw-bold mb-4">Contact Me</h4>
        <h2 class="fw-bold mb-5 border-bottom border-dark d-inline-block pb-2">Send me messages for any info</h2>

        <form action="send_message.php" method="POST">
            <div class="row g-4">
                <div class="col-md-7">
                    <div class="bg-white bg-opacity-50 p-4 rounded-3 shadow-sm h-100">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control mb-2" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control mb-2" placeholder="Your Email" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control mb-2" placeholder="Phone Number">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="address" class="form-control mb-2" placeholder="Address">
                            </div>
                        </div>
                        <textarea name="message" class="form-control border-0 bg-transparent mt-3" style="height: 150px;" placeholder="Write your message here..." required></textarea>
                    </div>
                </div>

                <div class="col-md-5 d-flex flex-column justify-content-center text-center">
                    <p class="fw-bold fs-5 mb-4">
                        I usually reply within 24 hours. Your questions and ideas are always welcome.
                    </p>
                    <div class="d-flex justify-content-center gap-4 fs-3">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-facebook-messenger"></i>
                        <i class="fa-brands fa-telegram"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <button type="submit" name="send_btn" class="btn btn-danger px-5 py-2 rounded-pill fw-bold shadow-sm">
                        Send Message
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- main section end -->
 <!-- footer section start -->
<div class="container-fluid p-0 mt-5">
    <div class="row g-0">
        <div class="col-md-6 bg-secondary text-white p-5 d-flex flex-column justify-content-center">
            <div class="ms-md-5">
                <p class="mb-3">📧 winhtethtethtun111@gmail.com</p>
                <p class="mb-3">📞 +95 9 788288598</p>
                <p class="mb-0">📍 Yangon, Myanmar.</p>
            </div>
        </div>

        <div class="col-md-6 bg-black text-white p-5 text-center d-flex flex-column align-items-center justify-content-center">
            <p class="fw-bold fs-5 mb-4 px-md-5">
                I usually reply within 24 hours. Your questions and ideas are always welcome.
            </p>
            <div class="d-flex gap-4 fs-3 mt-2">
                <i class="bi bi-facebook"></i>
                <i class="bi bi-messenger"></i>
                <i class="bi bi-telegram"></i>
                <i class="bi bi-instagram"></i>
            </div>
        </div>
    </div>
</div>
 <!-- footer section end -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>