<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<style>
    .hero{
      background-image: url("./photo_2025-12-30_10-49-41.jpg");
      background-position: center;
      background-size: cover;
      height: 120vh;
    }
    .base img{
      padding: 10px;
      position: center;
      margin-left: 100px;
    }
    .mainn{
      display: flex;
      justify-content: center;
      align-items: center;
      position: center;
    }
  </style>
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
    <div class="hero">
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
          <a class="nav-link active" aria-current="page" href="home.php"><button class="bg-danger bg-opacity-50 rounded-pill px-2">Home</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
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
     <!-- hero section start -->
      <div class="home d-flex flex-column h-75 py-5">
      <h1 class="text-dark py-5 px-2">Handmade Crochet With Love</h1>
        <h4 class="text-dark py-5 px-5">Crochet By Khunn</h4>
        <p">Unique, cozy & custom crochet items made just for you</p>
        <a href="designs.php"><button class="py-2 m-b-5 bg-danger bg-opacity-50 rounded-pill px-2">Inquire Now</button></a>
    </div>
     <!-- hero section end -->
     </div>
     <p class="d-flex justify-content-center bg-danger-subtle py-3">Kyeemyindaing Deli Free</p>
      <section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h2 class="fw-bold display-5 mb-4">About Me</h2>
        </div>
        <div class="col-md-8">
            <p class="text-end fw-semibold lh-base">
                Now it's hard to say exactly when and with what products was the beginning of my fascination with handmade. 
                My attention was drawn to handmade toys. For a year and a half I was seriously engaged in 
                this direction. I have a huge number of sketches and patterns of 
                various cute animals and dolls.
            </p>
        </div>
    </div>
</section>
<!-- main section end -->
<!-- main section 1 start -->
        <div class="container-fluid p-0">
    <div class="row g-0 align-items-stretch">
        <div class="col-md-6">
            <img src="./image1.png" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Studio">
        </div>
        
        <div class="col-md-6 bg-danger-subtle d-flex align-items-center justify-content-center p-5">
            <div class="text-center fw-bold fs-5 py-5">
                <p class="mb-1">• 100% Handmade</p>
                <p class="mb-1">• Custom Orders Available</p>
                <p class="mb-1">• Quality Yarn</p>
                <p class="mb-0">• Perfect for Gifts</p>
            </div>
        </div>
    </div>
</div>
  <!-- main section 1 end -->
  <!-- main section 2 start -->
   <div class="container-fluid p-5">
    <div class="row g-0 flex-md-row-reverse align-items-stretch">
        
        <div class="col-md-6">
            <img src="./photo_2025-12-30_19-36-36.jpg" class="img-fluid w-60 h-60 shadow-sm" alt="Gift">
        </div>

        <div class="col-md-6 bg-warning-subtle d-flex flex-column align-items-center justify-content-center p-5 text-center">
            
            <h2 class="fw-bold display-5 mb-4">A Gift</h2> 
            <p class="fw-bold px-lg-5 mb-5 text-dark">
                They'll Truly Love !! <br>
                Each crochet piece is handmade with care, making it perfect for <br>
                birthdays, celebrations, and special moments.
            </p>
            
            <div class="d-flex gap-3">
                 <a href="designs.php">   <button class="btn bg-dark text-white px-5 py-2 fw-bold rounded-pill shadow-sm">
               Shop Now 
                </button></a> 
                
                <a href="contact.message.php">  <button class="btn bg-danger-subtle bg-opacity-50 text-dark px-5 py-2 fw-bold rounded-pill shadow-sm">
                  Custom Order
                </button></a>
            </div>
        </div>
        
    </div>
</div>
  <!-- main section 2 end -->

   <div class="container py-5">
    <div class="row align-items-center text-center mb-5">
        <div class="col-md-3 d-none d-md-block">
            <img src="./photo_2025-12-30_19-13-12.jpg" class="img-fluid" alt="Yarn">
        </div>
        
        <div class="col-md-6 px-4">
            <p class="fw-bold lh-base">
                Every stitch is made with patience, love, and creativity. 
                From cute amigurumi to cozy accessories, each piece is 
                carefully handcrafted to bring warmth and joy into your 
                everyday life.
            </p>
        </div>
        
        <div class="col-md-3 d-none d-md-block">
            <img src="./photo_2025-12-30_19-25-46.jpg" class="img-fluid" alt="Hooks">
        </div>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4 col-sm-6 text-center">
            <img src="./photo_2025-12-30_20-00-07 (2).jpg" class="img-fluid rounded-5 border border-dark border-2 shadow-sm" 
                 style="aspect-ratio: 1/1; object-fit: cover; border-radius: 60px !important;" alt="Design 1">
        </div>
        
        <div class="col-md-4 col-sm-6 text-center mt-md-5">
            <img src="./image3.png" class="img-fluid rounded-5 border border-dark border-2 shadow-sm" 
                 style="aspect-ratio: 1/1; object-fit: cover; border-radius: 60px !important;" alt="Design 2">
        </div>
        
        <div class="col-md-4 col-sm-6 text-center">
            <img src="./image4.png" class="img-fluid rounded-5 border border-dark border-2 shadow-sm" 
                 style="aspect-ratio: 1/1; object-fit: cover; border-radius: 60px !important;" alt="Design 3">
        </div>
    </div>
</div>
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
    // PHP Session ဆီက အရေအတွက်ကို လှမ်းယူဖို့ fetch သုံးပါမယ်
    // သီးသန့် get_cart_count.php ဖန်တီးရပါမယ် (အောက်တွင်ဖော်ပြထားသည်)
    fetch('get_cart_count.php')
    .then(response => response.json())
    .then(data => {
        const badge = document.getElementById('cart-count');
        if (data.count > 0) {
            badge.innerText = data.count;
            badge.style.display = 'block'; // ပစ္စည်းရှိမှ ပြမယ်
        } else {
            badge.style.display = 'none';  // မရှိရင် ဖျောက်ထားမယ်
        }
    })
    .catch(err => console.error('Error fetching cart count:', err));
}

// Page load ဖြစ်တာနဲ့ count ကို update လုပ်မယ်
document.addEventListener('DOMContentLoaded', updateCartBadge);
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>