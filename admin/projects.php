<?php
session_start();
include('../action/User.php');
include('../action/Project.php');
// Deal with projects : 
$project = new Project(null, null, null, null, null, null);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addProject"])) {
        // Add project logic here
        $name = $_POST["name"];
        $description = $_POST["description"];
        $idChef = $_POST["idChef"];
        $project->addProject($name, $description, $_FILES["meniature"], $idChef);
    } 
    elseif (isset($_POST["deleteProject"])) {
        // Delete project logic here
        $projectId = $_POST["projectId"];
        $project->deleteProject($projectId);
    }
}
$projects = $project->getAllProjects();
// Deal With user 
$dod = new User();
if (isset($_SESSION["userLogin"])) {
    $u = $_SESSION["userLogin"];
    $user = $dod->getUserById($u['UserID']);
}
$allUsers = $dod->getAllUsers();
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $user['NomComplet']; ?></h6>
                        <php
                            echo 'hi' ;
                        ?>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                </div>
                <div class="navbar-nav w-100">
                    <a href="users.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Membres</a>
                </div>
                <div class="navbar-nav w-100">
                    <a href="pub.php" class="nav-item nav-link"><i class="fa fa-newspaper me-2"></i>Pub</a>
                </div>
                <div class="navbar-nav w-100">
                    <a href="projects.php" class="nav-item nav-link active"><i class="fa fa-newspaper me-2"></i> Projects </a>
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
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
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
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
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
            <div class="container mt-5">
                <div class="row mb-3">
                    <div class="col">
                        <h2>Projects</h2>
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjectModal">Add New Project</button>
                    </div>
                </div>

                <!-- Project Table -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($projects as $project) {
                            echo "<tr>";
                            echo "<td>{$project->name}</td>";
                            echo "<td>
                                    <a class='btn btn-primary btn-sm' href='project.php?projectId={$project->id}'>Edit</a>
                                    <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteProjectModal' data-project-id='{$project->id}'>Delete</button>
                                </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Add Project Modal -->
            <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProjectModalLabel">Add New Project</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="addProject" value="1">
                                <div class="mb-3">
                                    <label for="projectName" class="form-label">Project Name</label>
                                    <input type="text" class="form-control" id="projectName" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="projectDescription" class="form-label">Project Description</label>
                                    <textarea class="form-control" id="projectDescription" name="description" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="projectMeniature" class="form-label">Project Meniature (Image)</label>
                                    <input type="file" class="form-control" id="projectMeniature" name="meniature" accept="image/*" required>
                                </div>
                                <!-- Add this within your HTML form -->
                                <div class="mb-3">
                                    <label for="projectChefId" class="form-label">Chef ID</label>
                                    <input type="text" class="form-control" id="projectChefId" name="idChef" list="usersList" required>
                                    <datalist id="usersList">
                                        <?php
                                        foreach ($allUsers as $u) {
                                            ?>
                                            <option value="<?php echo $u->id; ?>"><?php echo $u->name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </datalist>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Project</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Assuming $allUsers is an array of user objects with 'id' and 'name' properties -->
            <script>
                var usersData = <?php echo json_encode($allUsers); ?>;
                
                document.addEventListener('DOMContentLoaded', function () {
                    var projectChefId = document.getElementById('projectChefId');
                    var selectedUserIdInput = document.getElementById('selectedUserId');

                    // Populate the datalist with usersData
                    usersData.forEach(function (user) {
                        var option = document.createElement('option');
                        option.value = user.name; // Show user name
                        option.setAttribute('data-id', user.id); // Store user ID as a data attribute
                        projectChefId.appendChild(option);
                    });

                    // Listen to the input field changes
                    projectChefId.addEventListener('input', function () {
                        var selectedOption = [...projectChefId.options].find(option => option.value === projectChefId.value);
                        if (selectedOption) {
                            // Set the corresponding user ID in the separate input field
                            selectedUserIdInput.value = selectedOption.getAttribute('data-id');
                        } else {
                            // Reset the user ID if no matching option is found
                            selectedUserIdInput.value = '';
                        }
                    });
                    
                    // Optional: Add a placeholder option
                    var placeholderOption = document.createElement('option');
                    placeholderOption.value = '';
                    placeholderOption.text = 'Search for a user';
                    projectChefId.insertBefore(placeholderOption, projectChefId.firstChild);
                });
            </script>






            <div class="modal fade" id="deleteProjectModal" tabindex="-1" aria-labelledby="deleteProjectModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteProjectModalLabel">Delete Project</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this project?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="" method="post">
                                <input type="hidden" name="deleteProject" value="1">
                                <!-- Update the value attribute dynamically using JavaScript -->
                                <input type="hidden" id="deleteProjectId" name="projectId" value="">
                                <button type="submit" class="btn btn-danger">Delete Project</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add JavaScript to update the hidden input value when the modal is shown -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var deleteProjectModal = new bootstrap.Modal(document.getElementById('deleteProjectModal'));

                    deleteProjectModal._element.addEventListener('show.bs.modal', function (event) {
                        var button = event.relatedTarget;
                        var projectId = button.getAttribute('data-project-id');
                        alert(projectId);
                        document.getElementById('deleteProjectId').value = projectId;
                    });
                });
            </script>
            <!-- Include jQuery -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <!-- Include Select2 CSS and JS -->
            <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>



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
                        Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
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