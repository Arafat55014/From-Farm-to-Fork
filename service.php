<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Our Services - From Farm To Fork</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="FarmToFork Services" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        /* Navbar hover and active */
        .navbar-nav .nav-link {
            transition: color 0.3s, transform 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107;
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link.active {
            color: #ffd700;
        }

        /* Hero Background as green */
        .bg-hero {
            background-color: #28a745;
            position: relative;
        }

        .bg-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .bg-hero h1,
        .bg-hero .btn {
            position: relative;
            z-index: 2;
        }

        /* Hero buttons */
        .bg-hero .btn {
            transition: color 0.3s, background-color 0.3s, transform 0.3s;
        }

        .bg-hero .btn-light:hover,
        .bg-hero .btn-outline-light:hover {
            color: #212529;
            background-color: #ffc107;
            border-color: #ffc107;
            transform: translateY(-2px);
        }

        .bg-hero .btn-light:active,
        .bg-hero .btn-outline-light:active {
            background-color: #ffd700;
            border-color: #ffd700;
            transform: translateY(-1px);
        }

        /* Service cards hover */
        .service-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none d-lg-block">
        <div class="row gx-5 py-3 align-items-center">
            <div class="col-lg-3">
                <div class="d-flex align-items-center justify-content-start">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-2"></i>
                    <h2 class="mb-0">+8801884624832</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex align-items-center justify-content-center">
                    <a href="index.html" class="navbar-brand ms-lg-5">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">FarmTo</span>Fork</h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5">
        <a href="index.php" class="navbar-brand d-flex d-lg-none">
            <h1 class="m-0 display-4 text-secondary"><span class="text-white">FarmTo</span>Fork</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="service.php" class="nav-item nav-link">Service</a>
                <a href="product.php" class="nav-item nav-link">Product</a>
                <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart.php" class="dropdown-item">Cart</a>
                                    <a href="chackout.php" class="dropdown-item">Chackout</a>
                                </div>
                            </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Start -->
    <div class="container-fluid bg-hero py-5 mb-5">
        <div class="container py-5">
            <div class="row justify-content-center justify-content-lg-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-3 text-white fw-bold mb-4">Our Services</h1>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
                        <a href="index.html" class="btn btn-light btn-lg py-3 px-5 fw-semibold">Home</a>
                        <a href="service.html" class="btn btn-outline-light btn-lg py-3 px-5 fw-semibold">Services</a>
                        <a href="product.html" class="btn btn-light btn-lg py-3 px-5 fw-semibold">Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Services Section -->
    <div class="container py-5">
        <h2 class="text-center mb-5">Our Services</h2>
        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 text-center border-primary shadow-sm p-3 service-card">
                    <div class="card-body">
                        <div class="fs-1 mb-3">🛒</div>
                        <h5 class="card-title mb-3">Ordering & Delivery</h5>
                        <p class="card-text">Fast and reliable delivery service right to your doorstep.</p>
                        <a href="ordering-delivery.html" class="btn btn-primary mt-3">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 text-center border-primary shadow-sm p-3 service-card">
                    <div class="card-body">
                        <div class="fs-1 mb-3">✂️</div>
                        <h5 class="card-title mb-3">Customization & Processing</h5>
                        <p class="card-text">Get your meat cuts customized to your preferences.</p>
                        <a href="customization-processing.html" class="btn btn-primary mt-3">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 text-center border-primary shadow-sm p-3 service-card">
                    <div class="card-body">
                        <div class="fs-1 mb-3">📄</div>
                        <h5 class="card-title mb-3">Product Info & Assistance</h5>
                        <p class="card-text">Detailed product information and customer support at your service.</p>
                        <a href="product-info.html" class="btn btn-primary mt-3">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 text-center border-primary shadow-sm p-3 service-card">
                    <div class="card-body">
                        <div class="fs-1 mb-3">🎁</div>
                        <h5 class="card-title mb-3">Loyalty & Offers</h5>
                        <p class="card-text">Exclusive deals and loyalty rewards for our valued customers.</p>
                        <a href="loyalty-offers.html" class="btn btn-primary mt-3">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 text-center border-primary shadow-sm p-3 service-card">
                    <div class="card-body">
                        <div class="fs-1 mb-3">✅</div>
                        <h5 class="card-title mb-3">Safety & Quality Assurance</h5>
                        <p class="card-text">We ensure the highest quality and safety standards for our products.</p>
                        <a href="safety-quality.html" class="btn btn-primary mt-3">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 text-center border-primary shadow-sm p-3 service-card">
                    <div class="card-body">
                        <div class="fs-1 mb-3">🏢</div>
                        <h5 class="card-title mb-3">Business & Bulk Buyers</h5>
                        <p class="card-text">Special services and pricing for corporate and bulk orders.</p>
                        <a href="business-bulk.html" class="btn btn-primary mt-3">Learn More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid bg-footer bg-primary text-white mt-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <h4 class="text-white mb-4">Get In Touch</h4>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-white me-2"></i>
                                <p class="text-white mb-0">Bashundhara Residential Area, Dhaka</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-white me-2"></i>
                                <p class="text-white mb-0">arafatridoy333@gmail.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-white me-2"></i>
                                <p class="text-white mb-0">+8801884624832</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-white mb-4">Quick Links</h4>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Home</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Our Services</a>
                                <a class="text-white" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-n5">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-secondary p-5">
                        <h4 class="text-white">Newsletter</h4>
                        <h6 class="text-white">Subscribe Our Newsletter</h6>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                                <button class="btn btn-primary">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="container-fluid bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; <a class="text-secondary fw-bold" href="#">From Farm To Fork</a>. All Rights Reserved. Designed by <a class="text-secondary fw-bold" href="https://htmlcodex.com">HTML Codex</a></p>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Auto highlight navbar active -->
    <script>
        const currentLocation = location.href;
        const menuItems = document.querySelectorAll('.navbar-nav .nav-link');

        menuItems.forEach(item => {
            if (item.href === currentLocation) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    </script>

</body>

</html>
