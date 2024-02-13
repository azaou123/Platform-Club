<?php
include('action/User.php');
include('action/ClubController.php');

$dbSingleton = Database::getInstance();
$dbConnection = $dbSingleton->getConnection();
// About the club 
$Clubcontroller = new ClubController();
$club = $Clubcontroller->getClubDetails();
// About Users 
$user = new User();
// About Projects 

// About Pubs 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kind Heart Charity - Free Bootstrap 5.2.2 CSS Template</title>
    <!-- CSS FILES -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-kind-heart-charity.css" rel="stylesheet">
    <!--

TemplateMo 581 Kind Heart Charity

https://templatemo.com/tm-581-kind-heart-charity

-->

</head>

<body id="section_1">
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
                <img src="<?php echo $club['Logo']; ?>" class="logo img-fluid" alt="Kind Heart Charity" width="200">
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
                        <a class="nav-link click-scroll" href="#section_3">Causes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">Volunteer</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link click-scroll dropdown-toggle" href="#section_5"
                            id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">News</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="news.html">News Listing</a></li>

                            <li><a class="dropdown-item" href="news-detail.html">News Detail</a></li>
                        </ul>
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

    <main>
        <section class="hero-section hero-section-full-height">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-12 p-0">
                        <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/slide/slide1.png" class="carousel-image img-fluid" alt="..."
                                        style="transform: translateY(-850px);">
                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>be a Kind Heart</h1>
                                        <p>Professional charity theme based on Bootstrap 5.2.2</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="images/slide/slide2.png" class="carousel-image img-fluid" alt="..."
                                        style="transform: translateY(-350px);">
                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>Non-profit</h1>
                                        <p>You can support us to grow more</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="images/slide/slide3.png" class="carousel-image img-fluid" alt="..."
                                        style="transform: translateY(-350px);">
                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>Humanity</h1>
                                        <p>Please tell your friends about our website</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="images/slide/slide4.png" class="carousel-image img-fluid" alt="..."
                                        style="transform: translateY(-350px);">
                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>Humanity</h1>
                                        <p>Please tell your friends about our website</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#hero-slide"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-12 text-center mx-auto">
                        <h2 class="mb-5">Welcome to
                            <?php echo $club['Name']; ?>
                        </h2>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="donate.html" class="d-block">
                                <img src="images/icons/hands.png" class="featured-block-image img-fluid" alt="">
                                <p class="featured-block-text">Become an <strong>ITiste</strong></p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="donate.html" class="d-block">
                                <img src="images/icons/heart.png" class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text"><strong>Caring</strong> Earth</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="donate.html" class="d-block">
                                <img src="images/icons/receive.png" class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text">Invest <strong>Time & Energy</strong></p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="donate.html" class="d-block">
                                <img src="images/icons/scholarship.png" class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text"><strong>Scholarship</strong> Program</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="section-padding section-bg" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                        <img src="images/group-people-volunteering-foodbank-poor-people.jpg"
                            class="custom-text-box-image img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="custom-text-box">
                            <h2 class="mb-2">
                                <?php echo $club['Name']; ?>
                            </h2>

                            <h5 class="mb-3">Together We Code Our Evolution</h5>

                            <p class="mb-0">T
                                <?php echo $club['Description']; ?>
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="custom-text-box mb-lg-0">
                                    <h5 class="mb-3">Our Mission</h5>

                                    <p>Sed leo nisl, posuere at molestie ac, suscipit auctor quis metus</p>

                                    <ul class="custom-list mt-2">
                                        <li class="custom-list-item d-flex">
                                            <i class="bi-check custom-text-box-icon me-2"></i>
                                            Charity Theme
                                        </li>

                                        <li class="custom-list-item d-flex">
                                            <i class="bi-check custom-text-box-icon me-2"></i>
                                            Semantic HTML
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0">
                                    <div class="counter-thumb">
                                        <div class="d-flex">
                                            <span class="counter-number" data-from="1" data-to="2009"
                                                data-speed="1000"></span>
                                            <span class="counter-number-text"></span>
                                        </div>

                                        <span class="counter-text">Founded</span>
                                    </div>

                                    <div class="counter-thumb mt-4">
                                        <div class="d-flex">
                                            <span class="counter-number" data-from="1" data-to="120"
                                                data-speed="1000"></span>
                                            <span class="counter-number-text">B</span>
                                        </div>

                                        <span class="counter-text">Donations</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="about-section section-padding">
            <div class="container">
                <div class="row justify-content-center text-center mb-2 mb-lg-4">
                    <div class="col-12 col-lg-8 col-xxl-7 text-center mx-auto">
                        <h2 class="display-5 fw-bold">Meet the Team</h2>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $board = $user->getBoard();
                    foreach ($board as $p) {
                        ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="card text-center border-0 mb-3">
                                <div class="card-body p-3">
                                    <?php
                                    if ($p['Photo'] == null) {
                                        ?>
                                        <div class="mb-4 mx-lg-3 mx-xxl-5"><img class="img-fluid rounded-circle "
                                                src="admin/img/user.png" style=" width:250px; height: 230px; "></div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="mb-4 mx-lg-3 mx-xxl-5"><img class="img-fluid rounded-circle"
                                                src="uploads/users/<?php echo $p['Photo']; ?>"
                                                style=" width:250px; height: 230px; "></div>
                                        <?php
                                    }
                                    ?>
                                    <h5 class="fw-bold">
                                        <?php echo $p['NomComplet']; ?>
                                    </h5>
                                    <div class="text-muted">
                                        <?php echo $user->getRoleNameByUserId($p['UserID']); ?>
                                    </div>
                                    <div class="d-flex justify-content-center mt-4">
                                        <?php if ($p['Facebook'] != null) { ?>
                                            <a class="btn btn-sm me-2" href="<?php echo $p['Facebook']; ?>">
                                                <svg class="bi bi-facebook" fill="currentColor" height="16" viewbox="0 0 16 16"
                                                    width="16" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                                    </path>
                                                </svg>
                                            </a>
                                        <?php } ?>
                                        <?php if ($p['Insta'] != null) { ?>
                                            <a class="btn btn-sm me-2" href="<?php echo $p['Insta']; ?>" target="_black">
                                                <svg class="bi bi-twitter" fill="currentColor" height="16" viewbox="0 0 16 16"
                                                    width="16" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
                                                    </path>
                                                </svg>
                                            </a>
                                        <?php } ?>
                                        <?php if ($p['Linkedin'] != null) { ?>
                                            <a class="btn btn-sm" href="<?php echo $p['Linkedin']; ?>">
                                                <svg class="bi bi-linkedin" fill="currentColor" height="16" viewbox="0 0 16 16"
                                                    width="16" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z">
                                                    </path>
                                                </svg>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="cta-section section-padding section-bg">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <div class="col-12 ms-auto text-center">
                        <h2 class="mb-0">Recruitement <br> Next Avril.</h2>
                    </div>

                    <!-- <div class="col-lg-5 col-12">
                        <a href="#" class="me-4">Make a donation</a>

                        <a href="#section_4" class="custom-btn btn smoothscroll">Become a volunteer</a>
                    </div> -->

                </div>
            </div>
        </section>


        <section class="section-padding" id="section_3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center mb-4">
                        <h2>Our Projects</h2>
                    </div>
                    <style>
                        .hbr {
                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                            /* Box shadow for a subtle shadow effect */
                            border: 1px solid #ccc;
                            /* Light border */
                            padding: 10px;
                            /* Add padding as needed */
                            margin: 10px;
                            /* Add margin as needed */
                        }
                    </style>
                    <div class="row mt-4">

                        <?php
                        $ps = $user->getAllProjects();
                        foreach ($ps as $p) {
                            $chef = $user->getUserById($p['ChefID']);
                            ?>
                            <div class="col-md-4 col-12">
                                <div class="hbr">
                                    <div class="text-center">
                                        <img src="admin/<?php echo $p['Meniature']; ?>" alt="Partner Image" width="100%"
                                            height="140">
                                        <h4 class="mb-0 mt-2" editable="inline" style="height:60px;;">
                                            <?php echo $p['Title']; ?>
                                        </h4>
                                        <span class="mt-3">
                                            <img src="./uploads/users/<?php
                                            if ($chef['Photo'] != null)
                                                echo $chef['Photo'];
                                            else
                                                echo 'user.png';
                                            ?>" alt="Chef Image" width="30" height="30"
                                                style="border-radius: 50%; margin-right: 10px;">
                                            <?php echo $chef['NomComplet']; ?>
                                        </span><br>
                                        <a href="project/index.php?id=<?php echo $p['ProjectID']; ?>" class="btn btn-success p-0 w-50 my-3">Go</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="volunteer-section section-padding" id="section_4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <h2 class="text-white mb-4 text-center">Contact The Club</h2>
                        <form class="custom-form volunteer-form mb-5 mb-lg-0" action="" method="POST">
                            <h3 class="mb-4 ">Send A Message</h3>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <input type="text" name="name" id="volunteer-name" class="form-control"
                                        placeholder="Full Name" required>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="text" name="whatsapp" id="volunteer-subject" class="form-control"
                                        placeholder="WhatsApp" required>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <input type="email" name="email" id="volunteer-email" pattern="[^ @]*@[^ @]*"
                                        class="form-control" placeholder="Jackdoe@gmail.com" required>
                                </div>
                            </div>
                            <textarea name="message" rows="3" class="form-control" id="volunteer-message"
                                placeholder="Comment (Optional)"></textarea>
                            <button type="submit" class="form-control">Submit</button>
                        </form>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Form is submitted, perform login
                            $email = $_POST["email"];
                            $name = $_POST["name"];
                            $whatsapp = $_POST["whatsapp"];
                            $message = $_POST["message"];
                            // Validate login
                            $result = $user->sendMessage($name, $whatsapp, $email, $message);
                            if ($result) {
                                echo '
                                    <script>
                                        alert("Message Envoyé Avec Succès");
                                    </script>
                                ';
                            } else {
                                echo '
                                    <script>
                                        alert("Erreur ! Merci De Re-essayer !");
                                    </script>
                                ';
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
        </section>

        <section class="news-section section-padding" id="section_5">
            <?php
            $pubs = $user->getAllPubs();
            $p1 = $pubs[0];
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 mb-5">
                        <h2>Latest News</h2>
                    </div>

                    <div class="col-md-7 col-12">
                        <div class="news-block">
                            <div class="news-block-top">
                                <div id="lp-slide" class="carousel carousel-fade slide" data-bs-ride="carousel"
                                    style="display:block; width:100%; height:400px;">
                                    <div class="carousel-inner">
                                        <?php
                                        $photosFolder = "css/" . $p1["Repertoire"] . "/";
                                        $photos = scandir($photosFolder);
                                        $photos = array_diff($photos, array(".", ".."));
                                        if (count($photos) > 0) {
                                            foreach ($photos as $photo) { ?>
                                                <div class="carousel-item active">
                                                    <img src=" <?php echo $photosFolder . $photo; ?>"
                                                        class="carousel-image img-fluid" alt="...">
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#lp-slide"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>

                                    <button class="carousel-control-next" type="button" data-bs-target="#lp-slide"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="news-category-block text-center">
                                <a href="#" class="category-block-link text-center">
                                    View
                                </a>
                            </div>
                        </div>

                        <div class="news-block-info">
                            <div class="news-block-title mb-2">
                                <h4>
                                    <a href="news-detail.html" class="news-block-title-link">
                                        <?php echo $p1['Title']; ?>
                                    </a>
                                </h4>
                            </div>
                            <div class="news-block-body">
                                <p>
                                    <?php echo $p1['Description']; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-12 mx-auto">
                        <form class="custom-form search-form">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            <button type="submit" class="form-control">
                                <i class="bi-search"></i>
                            </button>
                        </form>
                        <h5 class="mt-5 mb-3">Recent news</h5>
                        <?php
                        for ($i = 1; $i < 4; $i++) {
                            $pub = $pubs[$i];
                            $photosFolder = "css/" . $pub["Repertoire"] . "/";
                            $photos = scandir($photosFolder);
                            $photos = array_diff($photos, array(".", ".."));
                            if (count($photos) > 0) {
                                foreach ($photos as $photo) {
                                    $d = $photo;
                                }
                            }
                            ?>
                            <div class="news-block news-block-two-col d-flex mt-4">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="news-block-two-col-image-wrap">
                                            <a href="news-detail.html">
                                                <img src="<?php echo $photosFolder . $d; ?>"
                                                    class="news-image img-fluid mt-2" alt=""
                                                    style="height:100px; width:150px;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="news-block-two-col-info">
                                            <div class="news-block-title mb-2">
                                                <h6><a href="news-detail.html" class="news-block-title-link">
                                                        <?php echo $pub['Title']; ?>
                                                    </a>
                                                </h6>
                                            </div>
                                            <div class="news-block-date">
                                                <p>
                                                    <i class="bi-calendar4 custom-icon me-1"></i>
                                                    <?php
                                                    $content = str_split($pub['Description']);
                                                    for ($j = 0; $j < 45; $j++) {
                                                        echo $content[$j];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>


        <section class="testimonial-section section-padding section-bg">
            <?php
            $stmts = $user->getAllStatements();
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="mb-lg-3">About IT Club</h2>
                        <div id="testimonial-carousel" class="carousel carousel-fade slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                foreach ($stmts as $s) {
                                    ?>
                                    <div class="carousel-item active">
                                        <div class="carousel-caption">
                                            <h4 class="carousel-title">
                                                <?php echo $s['statement']; ?>
                                            </h4>
                                            <small class="carousel-name"><span class="carousel-name-title">
                                                    <?php echo $s['name']; ?></small>
                                        </div>
                                    </div>
                                <?php } ?>
                                <ol class="carousel-indicators">
                                    <?php
                                    foreach ($stmts as $s) {
                                        ?>
                                        <li data-bs-target="#testimonial-carousel" data-bs-slide-to="0" class="active">
                                            <img <?php if (!$s['photo']) { ?> src="uploads/users/user.png" <?php } else { ?>
                                                    src="uploads/statements/<?php echo $s['photo']; ?>" <?php } ?>
                                                class="img-fluid rounded-circle avatar-image" alt="avatar">
                                        </li>
                                    <?php } ?>
                                </ol>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-4">
                    <img src="images/logo.png" class="logo img-fluid" alt="">
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <h5 class="site-footer-title mb-3">Quick Links</h5>

                    <ul class="footer-menu">
                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Our Story</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Newsroom</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Causes</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Become a volunteer</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Partner with us</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mx-auto">
                    <h5 class="site-footer-title mb-3">Contact Infomation</h5>

                    <p class="text-white d-flex mb-2">
                        <i class="bi-telephone me-2"></i>

                        <a href="tel: 305-240-9671" class="site-footer-link">
                            <?php echo $club['PhoneNumber']; ?>
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <i class="bi-envelope me-2"></i>

                        <a href="mailto:info@yourgmail.com" class="site-footer-link">
                            <?php echo $club['Email']; ?>
                        </a>
                    </p>

                    <p class="text-white d-flex mt-3">
                        <i class="bi-geo-alt me-2"></i>
                        <?php echo $club['AddressID']; ?>
                    </p>

                    <a href="#" class="custom-btn btn mt-3">Login</a>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-7 col-12">
                        <p class="copyright-text mb-0">Copyright © 2036 <a href="#">Kind Heart</a> Charity Org.
                            Design: <a href="https://templatemo.com" target="_blank">TemplateMo</a><br>Distribution:
                            <a href="https://themewagon.com">ThemeWagon</a>
                        </p>
                    </div>

                    <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-twitter"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-instagram"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-linkedin"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://youtube.com/templatemo" class="social-icon-link bi-youtube"></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>