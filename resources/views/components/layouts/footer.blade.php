<!--====== FOOTER ONE PART START ======-->
<footer class="footer-area footer-one mt-5">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-4 col-sm-12">
                    <div class="f-about">
                        <div class="footer-logo">
                        </div>
                        <p class="text">
                            All of our events are designed to be engaging, relevant, and forward-thinking.
                        </p>
                    </div>
                    <div class="footer-app-store">
                        <h5 class="download-title">Download Our App Now!</h5>
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="https://cdn.ayroui.com/1.0/images/footer/app-store.svg" alt="app" />
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="https://cdn.ayroui.com/1.0/images/footer/play-store.svg" alt="play" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-sm-4">
                    <div class="footer-link">
                        <h6 class="footer-title">Company</h6>
                        <ul>
                            <li><a href="{{ route('about.index') }}">About</a></li>
                        </ul>
                    </div>
                    <!-- footer link -->
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-4">
                    <div class="footer-link">
                        <h6 class="footer-title">Quick access</h6>
                        <ul>
                            <li><a href="{{ route('user.create')  }}">Create user</a></li>
                            <li><a href="{{ route('events.create')  }}">Create event</a></li>
                            <li><a href="{{ route('events.index')  }}">Events</a></li>
                        </ul>
                    </div>
                    <!-- footer link -->
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-4">
                    <!-- Start Footer Contact -->
                    <div class="footer-contact">
                        <h6 class="footer-title">Help & Support</h6>
                        <ul>
                            <li>
                                <i class="lni lni-map-marker-1"></i> Lorem ipsum dolor sit amet, Perth, WA
                            </li>
                            <li><i class="lni lni-phone"></i> +61 000 000 000</li>
                            <li><i class="lni lni-envelope-1"></i>info@organization.com</li>
                        </ul>
                    </div>
                    <!-- End Footer Contact -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- footer widget -->
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="
                   copyright
                   text-center
                   d-md-flex
                   justify-content-between
                   align-items-center
                   ">
                        <p class="text">Copyright © <?php echo date('Y') ?> Career Training College. All Rights Reserved</p>
                        <ul class="social">
                            <li>
                                <a href="#">
                                    <i class="lni lni-facebook-filled"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="lni lni-twitter-original"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="lni lni-instagram-filled"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#"><i class="lni lni-linkedin-original"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- copyright -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- footer copyright -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        //===== close navbar-collapse when clicked
        let navbarTogglerOne = document.querySelector(
            ".navbar-one .navbar-toggler"
        );
        navbarTogglerOne.addEventListener("click", function () {
            navbarTogglerOne.classList.toggle("active");
        });
    </script>


    <script>
        @if (Session::has('message'))
        console.log("{{ Session::get('alert-type') }}");
        const type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.options.timeOut = 10000;
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':

                Toastify({
                    text:"{{ Session::get('message') }}",
                    duration: 3000,
                    close: true,
                    gravity: "bottom", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "rgba(var(--bs-success-rgb)",
                    },
                    onClick: function(){} // Callback after click
                }).showToast();

                break;
            case 'warning':

                Toastify({
                    text:"{{ Session::get('message') }}",
                    duration: 3000,
                    close: true,
                    gravity: "bottom", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "rgba(var(--bs-warning-rgb)",
                    },
                    onClick: function(){} // Callback after click
                }).showToast();

                break;
            case 'error':


                Toastify({
                    text:"{{ Session::get('message') }}",
                    duration: 3000,
                    close: true,
                    gravity: "bottom", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "rgba(var(--bs-danger-rgb)",
                    },
                    onClick: function(){} // Callback after click
                }).showToast();

                break;
        }
        @endif
    </script>


    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/intlTelInput.min.js"></script>

    @stack('scripts')

</footer>
<!--====== FOOTER ONE PART ENDS ======-->
