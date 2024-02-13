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


$user = $_SESSION['user'];
$proj = $pro->getProjectById($user['id_project']);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap 5 ID Card Template</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row ">
            <div class=".col-xl-3 col-lg-3"></div>
            <div class="col-xl-6 col-lg-6">
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fs-1 fa-brands fa-python"></i></div>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-4 pt-3">
                                <div>
                                    <img src="<?php echo $user['photo']; ?>" alt="photo profile" width="120"
                                        class="rounded-3" height="140">
                                </div>
                            </div>
                            <div class="col-7 mt-3">
                                <h4 class="card-title ">
                                    <?php echo $user['full_name']; ?>
                                </h4>
                                <p class="card-text  id-number">ID:
                                    <?php echo $user['id']; ?> (
                                    <?php if ($proj['ProjectID'] == 1)
                                        echo 'X-Change';
                                    else if ($proj['ProjectID'] == 2)
                                        echo 'SOW';
                                    else
                                        echo 'CCP'; ?>)
                                </p>
                                <p class="card-text  personal-info">Filière :
                                    <?php echo $user['major']; ?>
                                </p>
                                <p class="card-text personal-info">Email:
                                    <?php echo $user['email']; ?>
                                </p>
                            </div>
                        </div>

                        <?php
                        // Define the column names (s1 to s16) for background color
                        $columnsForBackground = ['s1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11', 's12', 's13', 's14', 's15', 's16'];
                        // Sample data for demonstration (replace with your actual data)
                        
                        ?>
                        <div class="row mt-3">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <table class="table mt-2 rounded-4">
                                    <tbody>
                                        <?php
                                        // Output the column names as table headers
                                        $i = 0;
                                        foreach ($columnsForBackground as $column) {
                                            if ($i % 4 === 0) {
                                                echo '</tr><tr>';
                                            }

                                            $cssClass = '';
                                            if ($user[$column] == 1) {
                                                $cssClass = 'bg-success';
                                            } elseif ($user[$column] == 2) {
                                                $cssClass = 'bg-warning';
                                            } else {
                                                $cssClass = 'bg-light';
                                            }

                                            echo "<td class='$cssClass'>$column</td>";
                                            $i++;
                                        }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-1"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card {
            background-color: #fff;
            border-radius: 10px;
            border: none;
            position: relative;
            margin-bottom: 30px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
        }

        .l-bg-cherry {
            background: linear-gradient(to right, #493240, #f09) !important;
            color: #fff;
        }

        .l-bg-blue-dark {
            background: linear-gradient(to right, #373b44, #4286f4) !important;
            color: #fff;
        }

        .l-bg-green-dark {
            background: linear-gradient(to right, #0a504a, #38ef7d) !important;
            color: #fff;
        }

        .l-bg-orange-dark {
            background: linear-gradient(to right, #a86008, #ffba56) !important;
            color: #fff;
        }

        .card .card-statistic-3 .card-icon-large .fas,
        .card .card-statistic-3 .card-icon-large .far,
        .card .card-statistic-3 .card-icon-large .fab,
        .card .card-statistic-3 .card-icon-large .fal {
            font-size: 110px;
        }

        .card .card-statistic-3 .card-icon {
            text-align: center;
            line-height: 50px;
            margin-left: 15px;
            color: #000;
            position: absolute;
            right: -5px;
            top: 20px;
            opacity: 0.1;
        }

        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
            color: #fff;
        }

        .l-bg-green {
            background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
            color: #fff;
        }

        .l-bg-orange {
            background: linear-gradient(to right, #f9900e, #ffba56) !important;
            color: #fff;
        }

        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
            color: #fff;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
    <!-- Add Bootstrap JavaScript (optional, for certain components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>