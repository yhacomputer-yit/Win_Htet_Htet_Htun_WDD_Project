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
          <a class="nav-link active" href="about.php"><button class="bg-danger bg-opacity-50 rounded-pill px-2">About</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="designs.php">Designs</a>
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
    <!-- home section start -->
     <div class="container-fluid bg-danger-subtle py-5">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-md-6 text-center">
                <img src="./photo_2025-12-31_10-12-56.jpg" class="img-fluid rounded-circle border border-white border-5 shadow-lg" 
                     style="width: 400px; height: 400px; object-fit: cover;" alt="Hero Crochet">
            </div>

            <div class="col-md-6 text-center pt-4 pt-md-0">
                <h1 class="fw-bold mb-3">Handmade Crochet With Love</h1>
                <h4 class="mb-4">Crochet By Khunn</h4>
                
                <p class="fw-bold px-md-5 mb-5 lh-base">
                    Thoughtfully handcrafted crochet pieces, made to be the perfect gift for every special moment.
                </p>

                <div class="d-flex justify-content-center gap-5 fs-1">
                    <i class="bi bi-truck"></i> <i class="bi bi-gift"></i>  <i class="bi bi-emoji-heart-eyes"></i> </div>
            </div>

        </div>
    </div>
</div>

<div class="container py-5 text-center">
    <h2 class="fw-bold mb-4">Our Crochet Story</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="fw-bold lh-lg">
                Every stitch tells a story of patience, creativity, and love. 
                What started as a simple passion for crochet has grown into a 
                heartfelt journey of creating handmade gifts that bring warmth and smiles.
                From cute amigurumi to cozy accessories, each piece is 
                carefully made by hand — because we believe the best gifts are 
                made with love.
            </p>
        </div>
    </div>
</div>
    <!-- home section end -->   
     <!-- home section start -->
      <div class="container-fluid bg-white py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 col-4 text-center">
                <img src="./photo_2025-12-31_10-59-23.jpg" class="img-fluid rounded-5 border border-dark border-2 shadow-sm" style="aspect-ratio: 1/1; object-fit: cover;">
            </div>
            <div class="col-md-4 col-4 text-center">
                <img src="./photo_2025-12-31_10-51-44.jpg" class="img-fluid rounded-5 border border-dark border-2 shadow-sm" style="aspect-ratio: 1/1; object-fit: cover;">
            </div>
            <div class="col-md-4 col-4 text-center">
                <img src="./photo_2025-12-30_10-18-27.jpg" class="img-fluid rounded-5 border border-dark border-2 shadow-sm" style="aspect-ratio: 1/1; object-fit: cover;">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-warning-subtle py-5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            
            <div class="col-2 col-md-3 text-end">
                <span class="fs-1">🦋</span>
            </div>

            <div class="col-8 col-md-6 fw-bold">
                <p class="mb-2">To create meaningful handmade gifts</p>
                <p class="mb-2">To bring comfort and warmth through crochet</p>
                <p class="mb-0">To turn simple yarn into lasting memories</p>
            </div>

            <div class="col-2 col-md-3 text-start">
                <span class="fs-1">🦋</span>
            </div>
            
        </div>
    </div>
</div>
     <!-- home section end -->
    <!-- main section start -->
     <div class="container py-5">
    <div class="row align-items-center">
        
        <div class="col-md-6 px-lg-5">
            <h2 class="fw-bold mb-5">What Makes Our Crochet Special</h2>
            
            <ul class="list-unstyled fw-bold lh-lg fs-5">
                <li class="mb-2">✓ 100% Handmade</li>
                <li class="mb-2">✓ Made with patience & care</li>
                <li class="mb-2">✓ Custom colors & designs</li>
                <li class="mb-2">✓ Perfect for gifting</li>
                <li class="mb-2">✓ Quality, soft yarn only</li>
            </ul>
        </div>

        <div class="col-md-6 text-center">
            <div class="p-3 bg-white rounded-4 shadow-sm border border-danger-subtle">
                <img src="./photo_2025-12-30_19-28-10.jpg" class="img-fluid rounded-3" alt="Yarn Colors">
            </div>
        </div>

    </div>
</div>
    <!-- main section end -->
     <!-- base section start -->
      <div class="container py-5">
    <div class="row align-items-center">
        
        <div class="col-md-5 text-center mb-4 mb-md-0">
            <img src="./photo_2025-12-31_11-25-33.jpg" class="img-fluid rounded-4 shadow-sm border border-light" 
                 style="max-height: 450px; object-fit: cover;" alt="Khunn Crochet">
        </div>

        <div class="col-md-7 ps-md-5">
            <div class="bg-warning-subtle p-5 rounded-5 shadow text-center h-100 d-flex flex-column justify-content-center">
                
                <h2 class="fw-bold mb-4 border-bottom border-dark d-inline-block pb-2 mx-auto" style="width: fit-content;">
                    A short intro about Me
                </h2>
                
                <p class="fw-bold fs-5 lh-lg mt-3">
                    Hi, I'm the hands behind the crochet, Khunn. 
                    I pour my heart into every stitch, creating pieces that 
                    are not only beautiful but meaningful.
                </p>

            </div>
        </div>

    </div>
</div>
     <!-- base section end -->
  <!-- footer section start -->
    <footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row align-items-center text-start">
            <div class="col-md-4 text-center">
                <img src="./photo_2025-12-31_10-50-16.jpg" class="rounded-circle img-fluid shadow" style="width: 200px; height: 200px; object-fit: cover;">
            </div>
            
            <div class="col-md-4 ps-md-5 my-4 my-md-0">
                <ul class="list-unstyled lh-lg">
                    <li>✔️ 100% Handmade</li>
                    <li>✔️ Custom Orders Available</li>
                    <li>✔️ Quality Yarn</li>
                    <li>✔️ Gift-Ready Packaging</li>
                    <li class="mt-3">📧 winhtethtethtun111@gmail.com</li>
                    <li>📞 +95 9 788288598</li>
                    <li>📍 Yangon, Myanmar</li>
                </ul>
            </div>

            <div class="col-md-4 text-center">
                <img src="./image2.png" class="rounded-circle img-fluid shadow" style="width: 200px; height: 200px; object-fit: cover;">
            </div>
        </div>
    </div>
</footer>

<div class="bg-black text-white py-2 text-center">
    <small>Make your loved ones smile with a meaningful handmade gift.</small>
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
</body>
</html>