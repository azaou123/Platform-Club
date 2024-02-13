<?php
session_start();
include('../action/User.php');
include('../action/Project.php');
include('../action/ClubController.php');

$dbSingleton = Database::getInstance();
$dbConnection = $dbSingleton->getConnection();
// About the club 
$Clubcontroller = new ClubController();
$club = $Clubcontroller->getClubDetails();
// About Users 
$user = new User();
$pro = new Project(null, null, null, null, null, null);
$project = $pro->getProjectById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
        <?php echo $project['label']; ?>
    </title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav"
        style="background-color:<?php echo $project['color1']; ?>; color: <?php echo $project['color2']; ?>;">
        <div class="container">
            <a class="navbar-brand" href="#page-top">
                <i class="fa-solid fa-code fs-2 mx-1"></i>
                <b class="mb-2">IT Club</b>
            </a>
            <button class="navbar-toggler text-uppercase font-weight-bold rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">about</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#sessions">Sessions</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#team">Team</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead text-center"
        style="background-color: <?php echo $project['color3']; ?>; color: <?php echo $project['color4']; ?>;">
        <div class="container d-flex align-items-center flex-column">
            <img class="masthead-avatar mb-2 rounded-circle" src="<?php echo $project['Meniature']; ?>" alt="..."
                width="1200" /><!-- Button trigger modal -->
            <!-- Masthead Heading-->
            <h4 class="masthead-heading mb-0">
                <?php echo $project['Title']; ?>
            </h4>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Together We Code Our Evolution</p>
            <div class="my-3">
                <i onclick="window.location='https://www.linkedin.com/company/it-club-fssm/'" style="color:#1DA1F2;"
                    class="fa-brands fa-linkedin-in fs-3 mx-2 hovered"></i>
                <i onclick="window.location='https://www.facebook.com/ItClubFssm'" style="color:#4267B2;"
                    class=" fa-brands fa-facebook-f fs-3 mx-2 hovered"></i>
                <i onclick="window.location='https://www.instagram.com/it.clubfssm/'"
                    class="text-dark fa-brands fa-instagram fs-3 mx-2 hovered"></i>
            </div>
        </div>
    </header>











    <!-- About Section  -->
    <section class="page-section text-<?php echo $project['color2']; ?> mb-0" id="about"
        style="background-color: <?php echo $project['color1']; ?>; color: <?php echo $project['color2']; ?>;">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-<?php echo $project['color2']; ?>">About
            </h2>
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <p class="lead text-center">
                        <?php echo $project['Description']; ?>
                    </p>
                </div>
            </div>

            <div class="text-center mt-4">
                <a class="btn btn-xl btn-outline-light btn btn-success" href="register.php?id=<?php echo $project['ProjectID']; ?>">Register
                </a>
            </div>

            <div class="text-center mt-4">
                <a class="btn btn-xl btn-outline-light" href="badgeForm.php?id=<?php echo $project['ProjectID']; ?>">Badge
                </a>
            </div>

        </div>
    </section>
















    <!-- Projects Section-->
    <section class="page-section portfolio text-center" id="sessions"
        style="background-color :<?php echo $project['color3']; ?>; color: <?php echo $project['color4']; ?>;">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Sessions</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Projects Grid Items-->
            <div class="row justify-content-center mb-5">


            </div>
        </div>
    </section>













    <!-- Team 1 - Bootstrap Brain Component -->
    <section class="py-5 py-xl-8 text-center" id="team"
        style="background-color:<?php echo $project['color1']; ?>; color: <?php echo $project['color2']; ?>;">
        <div class="container mb-5 mb-md-6 mb-xl-8">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 text-center">
                    <h2 class="mb-4 display-5 ">Team</h2>
                    <p class=" lead fs-4 mb-4 mb-md-5">Special Thanks To The entire IT Club community.</p>
                    <hr class="w-50 mx-auto mb-0">
                </div>
            </div>
        </div>

        <div class="container overflow-hidden text-center">
            <div class="row gy-4 gy-lg-0 gx-xxl-5 text-center">
                <?php
                $team = $pro->getUsersInProject($project['ProjectID']);
                foreach ($team as $t) { ?>
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">
                                            <?php echo $t['NomComplet']; ?>
                                        </h4>
                                        <p class="text-secondary mb-0">Cellule : Formation</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>






    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>










</body>

</html>