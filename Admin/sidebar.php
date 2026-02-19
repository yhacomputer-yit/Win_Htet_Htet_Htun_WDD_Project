

<div class="col-lg-2 sidebar px-0">
    <div class="text-center py-4">
        <img src="./photo_2025-12-30_10-22-42.jpg" alt="Logo" class="rounded-circle shadow" width="80" height="80">
        <h5 class="mt-2 text-white">Admin Panel</h5>
    </div>
    
    <ul class="list-unstyled">
        <?php

            $current_page = basename($_SERVER['PHP_SELF']);
        ?>

        <li>
            <a class="sidebar-link <?= ($current_page == 'dashboard.php') ? 'active' : '' ?>" href="dashboard.php">
                <i class="fa-solid fa-gauge me-2"></i> Dashboard
            </a>
        </li>
        
        <hr class="text-white mx-3 my-2">
        <small class="text-white-50 px-3 mb-2 d-block text-uppercase" style="font-size: 0.7rem;">General</small>
        <li>
            <a class="sidebar-link <?= ($current_page == 'Usertable.php') ? 'active' : '' ?>" href="Usertable.php">
                <i class="fa-solid fa-person me-2"></i> User table
            </a>
        </li>
        <li>
            <a class="sidebar-link <?= ($current_page == 'categories.php') ? 'active' : '' ?>" href="categories.php">
                <i class="fa-solid fa-list me-2"></i> Categories
            </a>
        </li>
        <li>
            <a class="sidebar-link <?= ($current_page == 'order.php') ? 'active' : '' ?>" href="order.php">
                <i class="fa-solid fa-receipt me-2"></i> Orders
            </a>
        </li>
        <li>
            <a class="sidebar-link <?= ($current_page == 'contactme.php') ? 'active' : '' ?>" href="contactme.php">
                <i class="fa-solid fa-envelope me-2"></i> Messages
            </a>
        </li>
          <li>
            <a class="sidebar-link <?= ($current_page == 'balancelist.php') ? 'active' : '' ?>" href="balancelist.php">
                <i class="fa-solid fa-wallet me-2"></i> Balance
            </a>
        </li>
        <hr class="text-white mx-3 my-2">
        <small class="text-white-50 px-3 mb-2 d-block text-uppercase" style="font-size: 0.7rem;">Product Types</small>

        <li>
            <a class="sidebar-link <?= ($current_page == 'productkeychain.php') ? 'active' : '' ?>" href="productkeychain.php">
                <i class="fa-solid fa-key me-2"></i> Keychains
            </a>
        </li>
        <li>
            <a class="sidebar-link <?= ($current_page == 'productdoll.php') ? 'active' : '' ?>" href="productdoll.php">
                <i class="fa-solid fa-ghost me-2"></i> Dolls
            </a>
        </li>
        <li>
            <a class="sidebar-link <?= ($current_page == 'producthat.php') ? 'active' : '' ?>" href="producthat.php">
                <i class="fa-solid fa-hat-wizard me-2"></i> Hats
            </a>
        </li>
        <li>
            <a class="sidebar-link <?= ($current_page == 'productdress.php') ? 'active' : '' ?>" href="productdress.php">
                <i class="fa-solid fa-shirt me-2"></i> Dresses
            </a>
        </li>
        <li>
            <a class="sidebar-link <?= ($current_page == 'productbag.php') ? 'active' : '' ?>" href="productbag.php">
                <i class="fa-solid fa-bag-shopping me-2"></i> Bags
            </a>
        </li>
        <li>
            <a class="sidebar-link <?= ($current_page == 'productgift.php') ? 'active' : '' ?>" href="productgift.php">
                <i class="fa-solid fa-gift me-2"></i> Gifts
            </a>
        </li>
        
    </ul>
</div>