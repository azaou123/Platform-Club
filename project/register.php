<?php
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['full-name'], $_POST['major'], $_POST['appogee'], $_POST['cne'], $_POST['email'], $_POST['whatsapp'], $_FILES['photo'])) {
        $formData = [
            'id_project' => $_POST['id_project'],
            'full-name' => $_POST['full-name'],
            'major' => $_POST['major'],
            'appogee' => $_POST['appogee'],
            'cne' => $_POST['cne'],
            'email' => $_POST['email'],
            'whatsapp' => $_POST['whatsapp'],
        ];

        if ($pro->addFullText($formData)) {
            echo '<script>
            alert("Inscription Avec Succès!");
            </script>';
            header('Location: index.php?id=' . urlencode($_GET['id']));
            exit; // Stop further execution
        } else {
            echo '<script>alert("Failed to insert data.");</script>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Your registration form will go here -->
    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <h3 class="text-center mt-2">
                            <?php echo $project['Title']; ?> <br>
                            <p class="pt-2 text-success">Inscription</p>
                        </h3>
                        <div class="card-body p-1 p-md-5">
                            <?php
                            if (isset($_SESSION['sessionInscriptionInProject'])) {
                                ?>
                                <div class="alert alert-success text-center">
                                    Inscription Avec Succès ! <br>
                                    Birnvenue Mr / Msse
                                    <?php echo $_SESSION['name']; ?>
                                    <br>
                                    Merci de rejoindre Groupe WhatsApp Via Le Lien suivant :
                                    <br>
                                    <a href='<?php echo $project["whatsapp_grp"]; ?>' target="_blank">Groupe Whatsapp</a>
                                    <div class="heart-container">
                                        <img src="./assets/img/love.png" alt="Heart Picture" class="heart">
                                    </div>
                                    <style>
                                        .heart-container {
                                            text-align: center;
                                            margin: 50px;
                                        }

                                        .heart {
                                            width: 100px;
                                            /* Adjust the size as needed */
                                            height: auto;
                                            animation: pulse 2s infinite;
                                        }

                                        @keyframes pulse {
                                            0% {
                                                transform: scale(1);
                                            }

                                            50% {
                                                transform: scale(1.1);
                                            }

                                            100% {
                                                transform: scale(1);
                                            }
                                        }
                                    </style>
                                </div>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <form action="" method="post" class="justify-content-center row">
                                        <button class="col-4 btn btn-primary">Ok</button>
                                    </form>
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                        unset($_SESSION['sessionInscriptionInProject']);
                                        header("Location: ./");
                                    }
                                    ?>
                                    <div class="col-4"></div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <form class="" method="POST" action="" enctype="multipart/form-data">
                                    <input type="number" name="id_project" value="<?php echo $project['ProjectID']; ?>"
                                        style="display : none ;">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1q">Nom Complet <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="form3Example1q" class="form-control" name="full-name"
                                            required />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1q">Filière <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="form3Example1q" class="form-control" name="major" required />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1q">Appogée <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="form3Example1q" class="form-control" name="appogee"
                                            required />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1q">CNE <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="form3Example1q" class="form-control" name="cne" required />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1q">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="form3Example1q" class="form-control" name="email" required />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1q">whatsApp <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="form3Example1q" class="form-control" name="whatsapp"
                                            required />
                                    </div>
                                    <div class="form-outline mb-4">

                                        <label class="form-label" for="form3Example1q">Photo <span
                                                class="text-danger">*</span></label>
                                        <input type="file" id="form3Example1q" class="form-control" name="photo" required />
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg mb-1 float-end">S'inscrire</button>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Add Bootstrap JavaScript (optional, for certain components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>