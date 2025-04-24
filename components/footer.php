<footer class="bg-dark text-white pt-4 pb-2">
    <div class="container-fluid px-4">
        <div class="row">
            <!-- About -->
            <div class="col-md-5 mb-3">
                <h5>About Us</h5>
                <p class="small w-75">We offer the best quality products at affordable prices. Shop with confidence!</p>
            </div>

            <!-- Quick Links -->
            <div class="col-6 col-md-4 mb-3">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Shop</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                    <li><a href="#" class="text-white text-decoration-none">FAQs</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-6 col-md-3 mb-3">
                <h5>Contact Us</h5>
                <p class="small mb-1">Email: <a class="text-decoration-none text-white" href="https://mail.google.com/mail/?view=cm&fs=1&to=support@example.com" target="_blank">
                        shahfahadcoder@gmail.com
                    </a></p>
                <p class="small mb-0">Phone: +92 330 9520278</p>
            </div>
        </div>

        <hr class="bg-white">
        <p class="text-center small mb-0">&copy; <span class="footer-year"></span> YourShop. All rights reserved.</p>
    </div>
</footer>

<script>
    let data = new Date();
    let year = data.getFullYear();
    let footerYear = document.querySelector('.footer-year');
    footerYear.innerHTML = year;
</script>