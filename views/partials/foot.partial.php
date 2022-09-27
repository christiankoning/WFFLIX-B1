<footer class="text-white text-center bg-dark mt-5">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-6 mb-md-0">
                <h5 class="text-uppercase">Wij zijn WFFLIX en wij zijn hier voor jou!</h5>
            </div>
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-6 mb-md-0">
                <h5 class="text-uppercase">Ontdek</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <a class="nav-link" href="<?= Request::buildUri('/courses') ?>">Cursussen</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= Request::buildUri('/contact') ?>">Contact</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-12 mb-md-0">
                <h5 class="text-uppercase">Begin met leren</h5>
                <ul class="list-unstyled">
                    <li>
                        <a class="nav-link" href="<?= Request::buildUri('/register') ?>">Registreer</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= Request::buildUri('/login') ?>">Log in</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->

        <!-- Copyright -->
        <div class="text-center p-3">
            <span>© 2021 Copyright:</span>
            <a class="footer-black-a" href="/">WFFLIX.nl</a>
        </div>
        <!-- Copyright -->
    </div></footer>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>