<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 d-flex flex-wrap">
                <p class="d-flex me-4 mb-0">
                    <i class="bi-geo-alt me-2"></i>
                    <?php echo $club['AddressID']; ?>
                </p>
                <p class="d-flex mb-0">
                    <i class="bi-envelope me-2"></i>
                    <a href="mailto:info@company.com">
                        <?php echo $club['Email']; ?>
                    </a>
                </p>
            </div>
            <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                <ul class="social-icon">
                    <li class="social-icon-item">
                        <a href="<?php echo $club['Facebook']; ?>" class="social-icon-link bi-facebook"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="<?php echo $club['Insta']; ?>" class="social-icon-link bi-instagram"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="<?php echo $club['Logo']; ?>" class="logo img-fluid" alt="Kind Heart Charity"
                style="width:150px; height:100px;">
            <span>
                IT Club FSSM
                <small>Together We Code Our Evolution</small>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#top">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Board</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_4">Recruitement</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_4">Projects</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_4">News</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_6">Contact</a>
                </li>

                <li class="nav-item ms-3">
                    <a class="nav-link custom-btn custom-border-btn btn" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>