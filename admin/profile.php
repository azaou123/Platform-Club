<?php
// Include your database connection or user class
include_once '../action/User.php';
$dod = new User();
// Check if UserID is set in the URL
if (isset($_GET['UserID'])) {
    // Get the UserID from the URL
    $userID = $_GET['UserID'];
    // Assuming you have a method to get user info by ID in your User class
    $user = $dod->getUserById($userID);

    if ($user) {
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
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">
            <link rel="stylesheet" href="css/bootstrap.min.css">
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
                            <a href="users.php" class="nav-item nav-link active"><i class="fa fa-user me-2"></i>Membres</a>
                        </div>
                        <div class="navbar-nav w-100">
                            <a href="pub.php" class="nav-item nav-link"><i class="fa fa-newspaper me-2"></i>Pub</a>
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
                            <div class="profile">
                                <div class="profile-image">
                                    <?php if ($user['Photo']): ?>
                                        <img src="<?php echo $user['Photo']; ?>" alt="<?php echo $user['NomComplet']; ?>"
                                            style="max-width: 100px; max-height: 100px;">
                                    <?php else: ?>
                                        <!-- Display default avatar if no photo is available -->
                                        <img wtyle="width : 200;"
                                            src="https://www.pngall.com/wp-content/uploads/12/Avatar-Profile-Vector.png"
                                            alt="Default Avatar">
                                    <?php endif; ?>
                                </div>
                                <div class="profile-info">
                                    <h2>
                                        <?php echo $user['NomComplet']; ?>
                                    </h2>
                                    <p>
                                        <?php echo $dod->getRole($user['RoleID'], $dbConnection); ?>
                                    </p>
                                </div>

                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts">Infos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="about-tab" data-toggle="tab" href="#about">Edit </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos">Affect</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="posts">
                                        <div class="user-info-container mt-3">
                                            <div class="user-details  mt-3">
                                                <h4>
                                                    <?php echo $user['NomComplet']; ?>
                                                </h4>
                                                <ul class="user-info-list">
                                                    <li><strong>User ID:</strong>
                                                        <?php echo $user['UserID']; ?>
                                                    </li>
                                                    <li><strong>Motif:</strong>
                                                        <?php echo $user['Motif']; ?>
                                                    </li>
                                                    <li><strong>Telephone:</strong>
                                                        <?php echo $user['Telephone']; ?>
                                                    </li>
                                                    <li><strong>Email:</strong>
                                                        <?php echo $user['Email']; ?>
                                                    </li>
                                                    <li><strong>Account State:</strong>
                                                        <?php echo $user['AccountState']; ?>
                                                    </li>
                                                    <li><strong>Facebook:</strong>
                                                        <?php echo $user['Facebook']; ?>
                                                    </li>
                                                    <li><strong>Instagram:</strong>
                                                        <?php echo $user['Insta']; ?>
                                                    </li>
                                                    <li><strong>LinkedIn:</strong>
                                                        <?php echo $user['Linkedin']; ?>
                                                    </li>
                                                    <li><strong>Cellule ID:</strong>
                                                        <?php echo $user['CelluleID']; ?>
                                                    </li>
                                                    <li><strong>Role:</strong>
                                                        <?php echo $dod->getRole($user['RoleID'], $dbConnection); ?>
                                                    </li>
                                                    <li><strong>Project ID:</strong>
                                                        <?php echo $user['ProjetID']; ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <style>
                                        .user-info-container {
                                            display: flex;
                                            justify-content: space-between;
                                            align-items: center;
                                            margin-bottom: 20px;
                                        }

                                        .user-photo {
                                            flex-shrink: 0;
                                        }

                                        .profile-photo {
                                            max-width: 100px;
                                            max-height: 100px;
                                            border-radius: 50%;
                                        }

                                        .default-avatar {
                                            max-width: 50px;
                                            max-height: 50px;
                                        }

                                        .user-details {
                                            flex-grow: 1;
                                            margin-left: 20px;
                                        }

                                        .user-info-list {
                                            list-style: none;
                                            padding: 0;
                                            margin: 0;
                                        }

                                        .user-info-list li {
                                            margin-bottom: 5px;
                                        }
                                    </style>
                                    <div class="tab-pane fade" id="about">
                                        <?php
                                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_submit'])) {
                                            // Assuming $user is an instance of the User class
                                            $userId = $user['UserID'];

                                            // Validate form data
                                            $newNomComplet = htmlspecialchars(trim($_POST['edit_nomcomplet']));
                                            $newMotif = htmlspecialchars(trim($_POST['edit_motif']));
                                            $newTelephone = htmlspecialchars(trim($_POST['edit_telephone']));
                                            $newEmail = htmlspecialchars(trim($_POST['edit_email']));
                                            $newFacebook = htmlspecialchars(trim($_POST['edit_facebook']));
                                            $newInsta = htmlspecialchars(trim($_POST['edit_insta']));
                                            $newLinkedin = htmlspecialchars(trim($_POST['edit_linkedin']));

                                            // Perform additional validation if needed (e.g., check if email is valid)
                                
                                            // Check if required fields are not empty
                                            if (empty($newNomComplet) || empty($newTelephone) || empty($newEmail)) {
                                                echo '<script>alert("Please fill in all required fields.");</script>';
                                            } else {
                                                // Update the user information in the database
                                                $updateResult = $dod->editUser($userId, $newNomComplet, $newMotif, $newTelephone, $newEmail, '', $newFacebook, $newInsta, $newLinkedin);

                                                if ($updateResult) {
                                                    // Display a success message using JavaScript alert
                                                    echo '<script>alert("User information updated successfully!");</script>';

                                                    // Optionally, redirect to the profile page after the alert
                                                    // header("Location: profile.php?UserID=$userId");
                                                    // exit();
                                                } else {
                                                    // Display an error message using JavaScript alert
                                                    echo '<script>alert("Failed to update user information.");</script>';
                                                }
                                            }
                                        }
                                        ?>

                                        <form method="POST">
                                            <div class="form-group">
                                                <label for="edit_nomcomplet">Full Name:</label>
                                                <input type="text" class="form-control" id="edit_nomcomplet"
                                                    name="edit_nomcomplet"
                                                    value="<?php echo htmlspecialchars($user['NomComplet']); ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_motif">Motif:</label>
                                                <input type="text" class="form-control" id="edit_motif" name="edit_motif"
                                                    value="<?php echo htmlspecialchars($user['Motif']); ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_telephone">Telephone:</label>
                                                <input type="text" class="form-control" id="edit_telephone"
                                                    name="edit_telephone"
                                                    value="<?php echo htmlspecialchars($user['Telephone']); ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_email">Email:</label>
                                                <input type="email" class="form-control" id="edit_email" name="edit_email"
                                                    value="<?php echo htmlspecialchars($user['Email']); ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_facebook">Facebook:</label>
                                                <input type="text" class="form-control" id="edit_facebook" name="edit_facebook"
                                                    value="<?php echo htmlspecialchars($user['Facebook']); ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_insta">Instagram:</label>
                                                <input type="text" class="form-control" id="edit_insta" name="edit_insta"
                                                    value="<?php echo htmlspecialchars($user['Insta']); ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_linkedin">LinkedIn:</label>
                                                <input type="text" class="form-control" id="edit_linkedin" name="edit_linkedin"
                                                    value="<?php echo htmlspecialchars($user['Linkedin']); ?>">
                                            </div>

                                            <button type="submit" name="edit_submit" class="btn btn-primary">Save
                                                Changes</button>
                                        </form>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                    <div class="tab-pane fade" id="photos">
                                        <!-- Display current assignments -->
                                        <div class="form-group">
                                            <label>Current Assignments:</label>
                                            <ul>
                                                <li>Cellule:
                                                    <?php echo $dod->getCelluleLabelByUserId($userID); ?>
                                                </li>
                                                <li>Project:
                                                    <?php
                                                    // echo $dod->getProjectNameByUserId($userID); 
                                                    echo 'Not Yet !';
                                                    ?>
                                                </li>
                                                <li>Role:
                                                    <?php echo $dod->getRoleNameByUserId($userID); ?>
                                                </li>
                                            </ul>
                                        </div>

                                        <?php
                                        function displayDropdownOptions($items)
                                        {
                                            foreach ($items as $id => $name) {
                                                echo "<option value=\"$id\">$name</option>";
                                            }
                                        }
                                        ?>
                                        <?php
                                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['assignCellule'])) {
                                            // Assuming $user is an instance of the User class
                                            $userId = $user['UserID'];
                                            // Get the selected cellule ID from the form
                                            $selectedCelluleId = $_POST['assign_cellule'];

                                            // Use the assignCellule method from the User class to update the database
                                            $assignCelluleResult = $dod->assignCellulee($userId, $selectedCelluleId);

                                            if ($assignCelluleResult) {
                                                // Display a success message using JavaScript alert
                                                echo '<script>alert("Assigned to Cellule successfully!");</script>';
                                            } else {
                                                // Display an error message using JavaScript alert
                                                echo '<script>alert("Failed to assign to Cellule.");</script>';
                                            }
                                        }
                                        ?>
                                        <?php
                                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['assignProject'])) {
                                            // Assuming $user is an instance of the User class
                                            $userId = $user['UserID'];

                                            // Get the selected project ID from the form
                                            $selectedProjectId = $_POST['assign_projet'];

                                            // Use the assignProject method from the User class to update the database
                                            $assignProjectResult = $dod->assignProject($userId, $selectedProjectId);

                                            if ($assignProjectResult) {
                                                // Display a success message using JavaScript alert
                                                echo '<script>alert("Assigned to Project successfully!");</script>';
                                            } else {
                                                // Display an error message using JavaScript alert
                                                echo '<script>alert("Failed to assign to Project.");</script>';
                                            }
                                        }
                                        ?>
                                        <?php
                                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['assignRole'])) {
                                            // Assuming $user is an instance of the User class
                                            $userId = $user['UserID'];

                                            // Get the selected role ID from the form
                                            $selectedRoleId = $_POST['assign_role'];

                                            // Use the assignRole method from the User class to update the database
                                            $assignRoleResult = $dod->assignRolee($userId, $selectedRoleId);

                                            if ($assignRoleResult) {
                                                // Display a success message using JavaScript alert
                                                echo '<script>alert("Assigned to Role successfully!");</script>';
                                            } else {
                                                // Display an error message using JavaScript alert
                                                echo '<script>alert("Failed to assign to Role.");</script>';
                                            }
                                        }
                                        ?>
                                        <form id="assignCelluleForm" class="mt-4">
                                            <div class="form-group">
                                                <label for="assign_cellule">Assign to Cellule:</label>
                                                <select class="form-control" id="assign_cellule" name="assign_cellule">
                                                    <?php displayDropdownOptions($dod->getAllCellules()); ?>
                                                </select>
                                            </div>
                                            <button type="button" id="assignCelluleButton" class="btn btn-primary">Assign
                                                Cellule</button>
                                        </form>

                                        <form id="assignProjectForm" class="mt-4">
                                            <div class="form-group">
                                                <label for="assign_projet">Assign to Project:</label>
                                                <select class="form-control" id="assign_projet" name="assign_projet">
                                                    <?php displayDropdownOptions($dod->getAllProjects()); ?>
                                                </select>
                                            </div>
                                            <button type="button" id="assignProjectButton" class="btn btn-primary">Assign
                                                Project</button>
                                        </form>

                                        <form id="assignRoleForm" class="mt-4">
                                            <div class="form-group">
                                                <label for="assign_role">Assign to Role:</label>
                                                <select class="form-control" id="assign_role" name="assign_role">
                                                    <?php displayDropdownOptions($dod->getAllRoles()); ?>
                                                </select>
                                            </div>
                                            <button type="button" id="assignRoleButton" class="btn btn-primary">Assign
                                                Role</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
            <style>
                body {
                    background: linear-gradient(180deg, #007BFF, #6C757D, #000);
                    animation: gradientAnimation 10s infinite alternate;
                }

                @keyframes gradientAnimation {
                    0% {
                        background-position: 0% 50%;
                    }

                    100% {
                        background-position: 100% 50%;
                    }
                }

                .profile {
                    max-width: 800px;
                    margin: 50px auto;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                .profile-image {
                    text-align: center;
                }

                .profile-image img {
                    width: 150px;
                    height: 150px;
                    border-radius: 50%;
                }

                .profile-info {
                    text-align: center;
                    margin-top: 20px;
                }

                .profile-info h2 {
                    margin-bottom: 10px;
                }

                .profile-info p {
                    color: #888;
                }

                .nav-tabs {
                    margin-top: 20px;
                }

                .timeline {
                    list-style: none;
                    padding: 0;
                    margin-top: 20px;
                }

                .timeline-item {
                    border-bottom: 1px solid #ddd;
                    padding: 20px;
                    position: relative;
                }

                .timeline-item:last-child {
                    border: none;
                }

                .timeline-date {
                    position: absolute;
                    top: 20px;
                    right: 20px;
                    font-size: 14px;
                    color: #888;
                }

                .timeline-content {
                    margin-top: 10px;
                }

                .timeline-content p {
                    color: #555;
                }
            </style>

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
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

            <!-- Template Javascript -->
            <script src="js/main.js"></script>
        </body>

        </html>
        <?php
    } else {
        echo 'User not found.';
    }
} else {
    echo 'UserID not provided in the URL.';
}
?>