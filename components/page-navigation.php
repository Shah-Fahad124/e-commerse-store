<?php 
function pageNav($name) {
  echo '
  <!-- Hero navigation Section -->
  <div class="position-relative bg-dark text-white py-5" style="background-image: url(\'./images/cart3.jpg\'); background-size: cover; background-position: center;">
    <!-- Content -->
    <div class="container position-relative z-1 text-center py-5">
      <h1 class="display-5 fw-bold text-white mb-3">' . $name . '</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center mb-0">
          <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link text-white text-decoration-none">Home</a></li>
          <li class="breadcrumb-item"><a href="shop.php" class="breadcrumb-link text-decoration-none">Shop</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="cart.php" class="breadcrumb-link text-decoration-none">Cart</a></li>
        </ol>
      </nav>
    </div>
  </div>';
}
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const currentPage = window.location.pathname.split("/").pop();

  document.querySelectorAll('.breadcrumb-link').forEach(link => {
    // Remove active classes first
    link.classList.add('text-white')
    link.classList.remove('text-danger', 'fw-bold');

    // Add active classes only to the matching link
    const linkPage = link.getAttribute('href');
    if (linkPage === currentPage) {
      link.classList.remove('text-white');
      link.classList.add('text-danger', 'fw-bold');
    }
  });
});
</script>


