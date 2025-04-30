<?php
include "./admin/process/connection.php";
include './components/head.php';
?>
<style>
  body,
  html {
    margin: auto;
    overflow-x: hidden;
    width: 100%;
    position: relative;
  }

  .count-div {
    width: 130px;
  }

  .count-div input {
    width: 50px;
  }

  @media screen and (max-width: 768px) {
    .count-div {
      width: 90px;
    }

    .count-div input {
      width: 30px;
    }

  }
</style>

<!-- navbar  -->
<?php include "./components/header.php" ?>
<!-- Hero navigation Section -->
<?php include "./components/page-navigation.php";
pageNav("Cart") ?>

<!-- Cart Section -->
<section class="py-5">
  <div class="container px-4">
    <!-- Cart Table -->
    <div class="table-responsive bg-white rounded shadow-sm mb-5">
      <table class="table align-middle">
        <thead class="table-light">
          <tr class="border-bottom">
            <th>Products</th>
            <th>Name</th>
            <!-- <th>Price</th>
              <th>Quantity</th> -->
            <th>Price</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
          <!-- Product 1 -->
          <tr class="border-bottom">
            <td>
              <img src="https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?auto=format&fit=crop&w=100&q=80" alt="Banana" class="rounded-circle object-fit-cover" style="width: 80px; height: 80px;">
            </td>
            <td><strong>Big Banana</strong></td>
            <!-- <td>$2.99</td> -->
            <!-- <td>
                <div class="d-flex justify-content-center align-items-center border rounded-pill count-div">
                  <button class="btn btn-sm rounded-circle px-2"><i class="bi bi-dash"></i></button>
                  <input type="text" value="1" class="form-control text-center border-0" >
                  <button class="btn btn-sm rounded-circle px-2"><i class="bi bi-plus"></i></button>
                </div> -->
            </td>
            <td><strong>$2.99</strong></td>
            <td>
              <button class="btn btn-light rounded-circle"><i class="bi bi-x text-danger"></i></button>
            </td>
          </tr>

          <!-- Product 2 -->
          <tr class="border-bottom">
            <td>
              <img src="https://images.unsplash.com/photo-1518977676601-b53f82aba655?auto=format&fit=crop&w=100&q=80" alt="Potatoes" class="rounded-circle object-fit-cover" style="width: 80px; height: 80px;">
            </td>
            <td><strong>Potatoes</strong></td>
            <!-- <td>$2.99</td>
              <td>
                <div class="d-flex justify-content-center align-items-center border rounded-pill count-div">
                  <button class="btn btn-sm rounded-circle px-2"><i class="bi bi-dash"></i></button>
                  <input type="text" value="1" class="form-control text-center border-0" >
                  <button class="btn btn-sm rounded-circle px-2"><i class="bi bi-plus"></i></button>
                </div>
              </td> -->
            <td><strong>$2.99</strong></td>
            <td>
              <button class="btn btn-light rounded-circle"><i class="bi bi-x text-danger"></i></button>
            </td>
          </tr>

          <!-- Product 3 -->
          <tr>
            <td>
              <img src="https://images.unsplash.com/photo-1584270354949-c26b0d5b4a0c?auto=format&fit=crop&w=100&q=80" alt="Broccoli" class="rounded-circle object-fit-cover" style="width: 80px; height: 80px;">
            </td>
            <td><strong>Awesome Broccoli</strong></td>
            <!-- <td>$2.99</td>
              <td>
                <div class="d-flex justify-content-center align-items-center border rounded-pill count-div" >
                  <button class="btn btn-sm rounded-circle px-2"><i class="bi bi-dash"></i></button>
                  <input type="text" value="1" class="form-control text-center border-0" >
                  <button class="btn btn-sm rounded-circle px-2"><i class="bi bi-plus"></i></button>
                </div> -->
            </td>
            <td><strong>$2.99</strong></td>
            <td>
              <button class="btn btn-light rounded-circle"><i class="bi bi-x text-danger"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Coupon and Total Section -->
    <div class="row justify-content-end">
      <!-- Coupon -->
      <!-- <div class="col-md-6 mb-4">
        <div class="d-flex flex-column flex-sm-row">
          <input type="text" placeholder="Coupon Code" class="form-control mb-2 mb-sm-0 me-sm-3 border-bottom border-primary rounded-0">
          <button class="btn btn-outline-primary rounded-pill">Apply Coupon</button>
        </div>
      </div> -->

      <!-- Cart Total -->
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="card-title mb-4">Cart <span class="fw-normal">Total</span></h4>
            <div class="d-flex justify-content-between mb-2">
              <span>Subtotal:</span>
              <span>$96.00</span>
            </div>
            <div class="d-flex justify-content-between mb-1">
              <span>Shipping:</span>
              <span>Flat rate: $3.00</span>
            </div>
            <p class="text-end text-muted mb-3">Shipping to Ukraine.</p>
            <div class="d-flex justify-content-between py-3 border-top border-bottom">
              <strong>Total:</strong>
              <strong>$99.00</strong>
            </div>
            <button class="btn btn-primary w-100 mt-4 rounded-pill">Proceed to Checkout</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Newsletter Section -->
<!-- <section class="py-5 bg-secondary text-white">
  <div class="container px-4">
    <div class="row align-items-center">
      <div class="col-md-6 mb-3 mb-md-0">
        <h3 class="fw-bold">Subscribe to Our Newsletter</h3>
        <p class="mb-0 text-white-50">Stay updated with our latest offers, product arrivals, and exclusive deals.</p>
      </div>
      <div class="col-md-6">
        <form class="d-flex flex-column flex-sm-row">
          <input type="email" class="form-control mb-2 mb-sm-0 me-sm-2 rounded-pill" placeholder="Your Email Address">
          <button class="btn btn-dark rounded-pill">Subscribe</button>
        </form>
      </div>
    </div>
  </div>
</section> -->

<?Php include "./components/footer.php" ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>

</html>