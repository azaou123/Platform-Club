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

if (isset($_GET['id'])) {
    $project = $pro->getProjectById($_GET['id']);
}

$team = $pro->getUsersInProject($project['ProjectID']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cne'], $_POST['idProject'])) {
        $cne = $_POST['cne'];
        $idProject = $_POST['idProject'];
        // Call the function to submit the form
        $result = $pro->submitBadgeForm($cne, $idProject);
        if ($result){
            $_SESSION['user'] = $result;
            header('Location: badge.php');
        }
        else {
            $_SESSION['fail'] = 'CNE est Invalide !';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Club | Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Your custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../css/templatemo-kind-heart-charity.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container">
        <div class="col-lg-8 col-10 mx-auto mt-5 pt-5">
            <form class="custom-form donate-form" action="" method="post" role="form">
                <h3 class="text-center mb-4 text-white">
                    <?php echo $project['Title']; ?> Badge
                </h3>
                <div class="row">
                    <?php if (isset($_SESSION['fail'])) { ?>
                        <div class="col-2"></div>
                        <div class="col-8 alert alert-danger">
                            <?php echo $_SESSION['fail']; ?>
                        </div>
                        <div class="col-2"></div>
                    <?php } ?>
                    <input type="hidden" name="whoisthis" value="admin">
                    <div class="col-lg-12 col-12 mt-3">
                        <label for="cne" class="form-label text-white">Enter the Massar Code:</label>
                        <input type="text" id="volunteer-email" class="form-control" placeholder="CNE" name="cne" required>
                        <input type="hidden" name="idProject" value="<?php echo $project['ProjectID']; ?>">
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
