<?php
session_start();
include('../action/User.php');
include('../action/Pub.php');
$dod = new User();
if (isset($_SESSION["userLogin"])) {
    $u = $_SESSION["userLogin"];
    $user = $dod->getUserById($u['UserID']);
    $users = $dod->getUsers($u['RoleID'], $u['CelluleID']);
}
// Include the Pub class

$pub = new Pub(); // Create an instance of the Pub class
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">
                            <?php echo $user['NomComplet']; ?>
                        </h6>
                        <php echo 'hi' ; ?>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                </div>
                <div class="navbar-nav w-100">
                    <a href="users.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Membres</a>
                </div>
                <div class="navbar-nav w-100">
                    <a href="pub.php" class="nav-item nav-link active"><i class="fa fa-newspaper me-2"></i>Pub</a>
                </div>
                <div class="navbar-nav w-100">
                    <a href="projects.php" class="nav-item nav-link"><i class="fa fa-newspaper me-2"></i> Projects </a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="container-fluid pt-4 px-4">

                        <!-- Display Publications in a Table -->
                        <div class="container-fluid pt-4 px-4">
                            <div class="row">
                                <div class="col-8">
                                    <h2 class="mb-4">Publications</h2>
                                </div>
                                <div class="col-3">
                                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                        data-bs-target="#addPublicationModal">
                                        Add
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="addPublicationModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Publication</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Add Publication Form -->
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="pub_title" class="form-label">Publication Title</label>
                                                    <input type="text" class="form-control" id="pub_title"
                                                        name="pub_title" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pub_description" class="form-label">Publication
                                                        Description</label>
                                                    <textarea class="form-control" id="pub_description"
                                                        name="pub_description" rows="3" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pub_images" class="form-label">Upload Pictures</label>
                                                    <input type="file" class="form-control" id="pub_images"
                                                        name="pub_images[]" multiple accept="image/*">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="project_id" class="form-label">Select Project</label>
                                                    <select class="form-control" id="assign_projet"
                                                        name="assign_projet">
                                                        <?php
                                                        // Call the function to get available projects
                                                        $projects = $dod->getAllProjects();

                                                        // Loop through projects and populate the dropdown
                                                        foreach ($projects as $p) {
                                                            echo "<option value=" . $p['ProjectID'] . ">" . $p['Title'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!-- Add more fields as needed -->
                                                <button type="submit" class="btn btn-primary" name="add_publication">Add
                                                    Publication</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['add_publication'])) {
                                $title = $_POST['pub_title'];
                                $description = $_POST['pub_description'];
                                $projectID = $_POST['assign_projet'];

                                $pubDirectory = '../uploads/pubs/' . preg_replace('/\s+/', '_', strtolower($title));
                                if (!is_dir($pubDirectory)) {
                                    mkdir($pubDirectory, 0777, true);
                                }

                                $uploadedImages = [];
                                if (!empty($_FILES['pub_images']['name'][0])) {
                                    $total = count($_FILES['pub_images']['name']);
                                    for ($i = 0; $i < $total; $i++) {
                                        $fileName = $_FILES['pub_images']['name'][$i];
                                        $tmpName = $_FILES['pub_images']['tmp_name'][$i];
                                        $uploadPath = $pubDirectory . '/' . $fileName;

                                        if (move_uploaded_file($tmpName, $uploadPath)) {
                                            $uploadedImages[] = $uploadPath;
                                        }
                                    }
                                }

                                $pub->addPub($title, $description, $pubDirectory, $projectID);
                            }
                            ?>


                            <!-- Display Publications in a Table -->
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $publications = $pub->getAllPublications(); // Assuming you have a method in Pub to fetch all publications
                                    foreach ($publications as $publication) {
                                        echo "<tr>";
                                        echo "<td>{$publication['Title']}</td>";
                                        echo "
                                        <td>
                                        <a href='edit_publication.php?id={$publication['PubID']}'>Edit</a> 
                                        | 
                                        <a href='#' onclick='confirmDelete({$publication['PubID']})'>Delete</a>
                                        </td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- JavaScript Libraries -->
                    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            </br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com"
                                target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>