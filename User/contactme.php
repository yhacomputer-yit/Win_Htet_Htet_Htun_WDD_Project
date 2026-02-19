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
<div class="container-fluid py-5 overflow-hidden position-relative" style="min-height: 500px;">
    
    <div class="position-absolute start-0 top-50 translate-middle-y rounded-circle bg-danger-subtle shadow-sm" 
         style="width: 700px; height: 700px; margin-left: -150px; z-index: 0; opacity: 0.8;">
    </div>

    <div class="container position-relative" style="z-index: 1;">
        <div class="row align-items-center">
            
            <div class="col-md-5 text-center">
                <img src="./photo_2025-12-31_12-45-52.jpg" class="img-fluid rounded-circle border border-white border-5 shadow" 
                     style="width: 300px; height: 300px; object-fit: cover;" alt="Keychain">
            </div>

            <div class="col-md-7 ps-md-5 text-center text-md-start">
                <h2 class="fw-bold display-6 mb-4 border-bottom border-dark d-inline-block pb-2">
                    Let's Create Something Special Together
                </h2>
                
                <p class="fw-bold fs-4 mb-5 lh-base">
                    Have a question or looking for the perfect handmade gift? <br>
                    I'd love to hear from you.
                </p>

                <a href="designs.gift.php"> <button class="btn bg-danger-subtle text-dark px-5 py-2 fw-bold rounded-pill shadow-sm border-0">
                   Inquire Now 
                </button></a>
            </div>

        </div>
    </div>
</div>
<!-- hero section end -->
 <!-- footer section start -->
  <div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-center">
            <h2 class="fw-bold mb-4">Let's talk crochet !!</h2>
            <p class="fw-bold fs-5 mb-4 px-md-5">
                Whether it's a custom gift or a simple question, feel free to reach out anytime.
            </p>
             <a href="contact.message.php"><button class="btn bg-danger-subtle text-dark px-5 py-2 fw-bold rounded-pill shadow-sm border-0">
              Message Me 
            </button></a>
        </div>

        <div class="col-md-6 text-center mt-4 mt-md-0">
            <img src="./photo_2025-12-31_13-17-54.jpg" class="img-fluid rounded-5 border border-dark border-1 shadow-sm" 
                 style="max-width: 400px; border-radius: 60px !important;" alt="Crochet Bouquets">
        </div>
    </div>
</div>

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
</body>
</html>