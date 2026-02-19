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
          <a class="nav-link active" href="designs.php"><button class="bg-danger bg-opacity-50 rounded-pill px-2">Designs</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactme.php">Contact Me</a>
        </li>     
      </ul>
    <a href="shoppingcart.php" class="position-relative text-dark">
    <i class="fa-solid fa-cart-shopping fs-4"></i>
    <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem; display: none;">
        0
    </span>
</a>
    </div>
  </div>
</nav>
    <!-- nav section end -->
     <div class="container-fluid py-5">
    <div class="text-center py-5" 
         style="background-image: url('./photo_2025-12-31_14-14-48.jpg'); 
                background-size: contain; 
                background-position: center; 
                background-repeat: no-repeat; 
                min-height: 300px;">
        
        <h2 class="fw-bold d-inline-block border-bottom border-dark pb-2 mb-4">
            Crochet Designs Collection
        </h2>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="fw-bold fs-5 px-3" style="display: inline-block;">
                    Thoughtfully designed crochet pieces — perfect for gifting <br class="d-none d-md-block"> and custom orders.
                </p>
            </div>
        </div>
    </div>
<!-- card section start   -->

   <div class="container-fluid bg-danger-subtle py-5">
    <div class="container">
        
        <div class="row g-4 mb-5">
            <div class="col-md-4 text-center">
                <div class="mb-3 overflow-hidden rounded-4 border border-white border-2 shadow-sm">
                    <img src="./photo_2025-12-31_14-19-20.jpg" class="w-100" style="height: 350px; object-fit: cover;">
                </div>
               <a href="designs.gift.php"> <button class="btn btn-light rounded-pill px-4 shadow-sm fw-bold border-0">View More</button> </a>
            </div>

            <div class="col-md-4 text-center">
                <div class="mb-3 overflow-hidden rounded-4 border border-white border-2 shadow-sm">
                    <img src="./photo_2025-12-30_20-00-07 (2).jpg" class="w-100" style="height: 350px; object-fit: cover;">
                </div>
              <a href="designs.keychain.php">  <button class="btn btn-light rounded-pill px-4 shadow-sm fw-bold border-0">View More</button> </a>
            </div>

            <div class="col-md-4 text-center">
                <div class="mb-3 overflow-hidden rounded-4 border border-white border-2 shadow-sm">
                    <img src="./photo_2025-12-31_14-21-35.jpg" class="w-100" style="height: 350px; object-fit: cover;">
                </div>
               <a href="designs.hat.php"><button class="btn btn-light rounded-pill px-4 shadow-sm fw-bold border-0">View More</button></a> 
            </div>
        </div>

        <hr class="border-dark opacity-25 my-5 mx-auto w-75">

        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="mb-3 overflow-hidden rounded-4 border border-white border-2 shadow-sm">
                    <img src="./photo_2026-01-01_12-04-07.jpg" class="w-100" style="height: 350px; object-fit: cover;">
                </div>
             <a href="designs.bag.php">   <button class="btn btn-light rounded-pill px-4 shadow-sm fw-bold border-0">View More</button> </a>
            </div>

            <div class="col-md-4 text-center">
                <div class="mb-3 overflow-hidden rounded-4 border border-white border-2 shadow-sm">
                    <img src="./photo_2025-12-31_10-50-16.jpg" class="w-100" style="height: 350px; object-fit: cover;">
                </div>
               <a href="designs.dolls.php"> <button class="btn btn-light rounded-pill px-4 shadow-sm fw-bold border-0">View More</button></a>
            </div>

            <div class="col-md-4 text-center">
                <div class="mb-3 overflow-hidden rounded-4 border border-white border-2 shadow-sm">
                    <img src="./photo_2025-12-31_14-25-59.jpg" class="w-100" style="height: 350px; object-fit: cover;">
                </div>
                <a href="designs.dress.php"><button class="btn btn-light rounded-pill px-4 shadow-sm fw-bold border-0">View More</button></a>
            </div>
        </div>
        
    </div>
</div>
<!-- card section end -->
 <!-- middle section start -->
  <div class="container-fluid bg-danger-subtle py-5 mt-3 p-5">
    <div class="container">
        
        <div class="row align-items-center mb-5">
            <div class="col-md-6 text-center">
                <img src="./photo_2025-12-31_21-17-41.jpg" class="img-fluid rounded-5 shadow-lg border border-white border-4" 
                     style="max-width: 400px; aspect-ratio: 1/1; object-fit: cover;">
            </div>
            <div class="col-md-6 text-center text-md-start mt-4 mt-md-0 ps-md-5">
                <h2 class="fw-bold mb-4">Ready to Find the Perfect Gift?</h2>
                <a href="contact.message.php"><button class="btn btn-danger rounded-pill px-5 py-2 fw-bold shadow-sm border-bottom border-dark border-2">
                    Custom Order Now
                </button></a>
            </div>
        </div>

        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-md-6 text-center">
                <img src="./photo_2025-12-31_15-02-59.jpg" class="img-fluid rounded-5 shadow-lg border border-white border-4" 
                     style="max-width: 400px; aspect-ratio: 1/1; object-fit: cover;">
            </div>
            <div class="col-md-6 text-center text-md-end mt-4 mt-md-0 pe-md-5">
                <h3 class="fw-bold mb-4">Handmade crochet pieces that make every moment special</h3>
               <a href="contact.message.php"> <button class="btn btn-danger rounded-pill px-5 py-2 fw-bold shadow-sm border-bottom border-dark border-2">
                    Explore Gifts
                </button></a>
            </div>
        </div>

    </div>
</div>
 <!-- middle section end -->
  <!-- footer section start -->


<div class="container-fluid p-0 mt-3">
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
  <script>
function updateCartBadge() {

    fetch('get_cart_count.php')
    .then(response => response.json())
    .then(data => {
        const badge = document.getElementById('cart-count');
        if (data.count > 0) {
            badge.innerText = data.count;
            badge.style.display = 'block'; 
        } else {
            badge.style.display = 'none';  
        }
    })
    .catch(err => console.error('Error fetching cart count:', err));
}

document.addEventListener('DOMContentLoaded', updateCartBadge);
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>