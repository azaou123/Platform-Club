<?php
include_once("Database.php");
$dbSingleton = Database::getInstance();
$dbConnection = $dbSingleton->getConnection();

class Project
{
    public $id;
    public $name;
    public $description;
    public $timestamp;
    public $meniature;
    public $idChef;

    public function __construct($id, $name, $description, $timestamp, $meniature, $idChef)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->timestamp = $timestamp;
        $this->meniature = $meniature;
        $this->idChef = $idChef;
    }


    public function getProjectById($projectId)
    {
        global $dbConnection;
        // Assuming you have a connection to your database, adjust the query accordingly
        $query = "SELECT * FROM projects WHERE ProjectID = ?";
        $stmt = $dbConnection->prepare($query);
        $stmt->bind_param("i", $projectId);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Fetch project details as an associative array
                $projectDetails = $result->fetch_assoc();
                return $projectDetails;
            }
        }
        return null; // Return null if project with given ID is not found
    }

    public function deleteUserFromProject($projectId, $userId)
    {
        global $dbConnection;
        // Implement logic to delete the user from the project
        $dbConnection->query("DELETE FROM project_user WHERE ProjectID = $projectId AND UserID = $userId");
    }

    public function getAllProjects()
    {
        global $dbConnection;
        $projects = array();
        $query = "SELECT * FROM Projects";
        $result = $dbConnection->query($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $project = new Project(
                    $row['ProjectID'],
                    $row['Title'],
                    $row['Description'],
                    $row['Timestamp'],
                    $row['Meniature'],
                    $row['ChefID']
                );
                $projects[] = $project;
            }
        }

        return $projects;
    }

    public function getAllUsers()
    {
        global $dbConnection;

        // Provide a valid SELECT query to fetch all users
        $query = "SELECT UserID, NomComplet FROM Users";
        $result = $dbConnection->query($query);

        $users = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Create User objects and add them to the array
                $user = new User();
                $user->id = $row['UserID'];
                $user->name = $row['NomComplet'];
                $users[] = $user;
            }
        }

        return $users;
    }

    public function addProject($name, $description, $meniature, $idChef)
    {
        global $dbConnection;

        // Handle file upload
        $uploadDirectory = '../uploads/projects/';
        $uploadedFileName = $uploadDirectory . basename($_FILES['meniature']['name']);
        $uploadOk = 1;

        // Check if file already exists
        if (file_exists($uploadedFileName)) {
            $_SESSION['failAddProject'] = 'File already exists.';
            $uploadOk = 0;
        }

        // Check file size (you can adjust this limit)
        if ($_FILES['meniature']['size'] > 5000000) {
            $_SESSION['failAddProject'] = 'File is too large. Max file size is 5 MB.';
            $uploadOk = 0;
        }

        // Allow certain file formats (you can customize this list)
        $allowedFileTypes = array('jpg', 'jpeg', 'png', 'gif');
        $uploadedFileType = strtolower(pathinfo($uploadedFileName, PATHINFO_EXTENSION));
        if (!in_array($uploadedFileType, $allowedFileTypes)) {
            $_SESSION['failAddProject'] = 'Invalid file type. Allowed types: JPG, JPEG, PNG, GIF.';
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $_SESSION['failAddProject'] = 'Error in file upload.';
            return;
        } else {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES['meniature']['tmp_name'], $uploadedFileName)) {
                // File uploaded successfully, proceed to insert into the database
                $stmt = $dbConnection->prepare("INSERT INTO Projects (Title, Description, Timestamp, Meniature, ChefID) VALUES (?, ?, NOW(), ?, ?)");
                if (!$stmt) {
                    $_SESSION['failAddProject'] = 'Error in preparing statement';
                    return;
                }

                $stmt->bind_param("sssi", $name, $description, $uploadedFileName, $idChef);
                $result = $stmt->execute();
                $stmt->close();

                if ($result) {
                    $_SESSION['successAddProject'] = 'Project Added Successfully';
                } else {
                    $_SESSION['failAddProject'] = 'Failure: Retry Again';
                }
            } else {
                $_SESSION['failAddProject'] = 'Error moving uploaded file.';
            }
        }
    }
    public function deleteProject($id)
    {
        global $dbConnection;
        // Fetch the Meniature file path before deleting the project
        $stmtSelect = $dbConnection->prepare("SELECT Meniature FROM Projects WHERE ProjectID = ?");
        if (!$stmtSelect) {
            $_SESSION['failDeleteProject'] = 'Error in preparing SELECT statement';
            return;
        }

        $stmtSelect->bind_param("i", $id);
        $stmtSelect->execute();
        $stmtSelect->bind_result($meniaturePath);
        $stmtSelect->fetch();
        $stmtSelect->close();

        // Now, delete the project from the database
        $stmtDelete = $dbConnection->prepare("DELETE FROM Projects WHERE ProjectID = ?");
        if (!$stmtDelete) {
            $_SESSION['failDeleteProject'] = 'Error in preparing DELETE statement';
            return;
        }

        $stmtDelete->bind_param("i", $id);
        $resultDelete = $stmtDelete->execute();
        $stmtDelete->close();

        // Check if the project was deleted successfully
        if ($resultDelete) {
            // Delete the associated Meniature file if it exists
            if ($meniaturePath && file_exists($meniaturePath)) {
                if (unlink($meniaturePath)) {
                    $_SESSION['successDeleteProject'] = 'Project and associated Meniature deleted successfully';
                } else {
                    $_SESSION['failDeleteProject'] = 'Error deleting associated Meniature file';
                }
            } else {
                $_SESSION['successDeleteProject'] = 'Project deleted successfully';
            }
        } else {
            $_SESSION['failDeleteProject'] = 'Failure: Retry Again';
        }
    }

    public function submitBadgeForm($cne, $idProject)
    {
        global $dbConnection;

        $cne = mysqli_real_escape_string($dbConnection, $cne);
        $idProject = mysqli_real_escape_string($dbConnection, $idProject);

        $sql = "SELECT * FROM FullTexts WHERE (cne = '$cne' OR appogee = '$cne') AND id_project = '$idProject'";
        $result = $dbConnection->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            return $user ;
        } else {
            return false ;
        }
    }

    public function addFullText($data)
    {
        global $dbConnection;
        // Assuming your table name is FullTexts
        $tableName = "FullTexts";
        // Extract data from the form
        $id_project = mysqli_real_escape_string($dbConnection, $data['id_project']);
        $full_name = mysqli_real_escape_string($dbConnection, $data['full-name']);
        $major = mysqli_real_escape_string($dbConnection, $data['major']);
        $appogee = mysqli_real_escape_string($dbConnection, $data['appogee']);
        $cne = mysqli_real_escape_string($dbConnection, $data['cne']);
        $email = mysqli_real_escape_string($dbConnection, $data['email']);
        $whatsapp = mysqli_real_escape_string($dbConnection, $data['whatsapp']);
        // Process file upload
        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            // Set a unique filename to avoid overwriting existing files
            $targetDir = '../uploads/studProjects/'; // Make sure this directory exists and is writable
            $uniqueFilename = uniqid() . '_' . basename($_FILES['photo']['name']);
            $targetFilePath = $targetDir . $uniqueFilename;
            // Move the uploaded file to the destination directory
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath)) {
                // Photo uploaded successfully
                $photo = $targetFilePath;
            } else {
                // Failed to move the uploaded file
                return false;
            }
        } else {
            // File upload error
            return false;
        }
        // Insert data into the database
        $query = "INSERT INTO $tableName (id_project, full_name, major, appogee, cne, email, whatsapp, photo)
        VALUES ('$id_project', '$full_name', '$major', '$appogee', '$cne', '$email', '$whatsapp', '$photo')";
        $result = $dbConnection->query($query);
        if ($result) {
            // Data inserted successfully
            return true;
        } else {
            // Failed to insert data
            return false;
        }
    }


    public function affectUsersToProject($projectId, $userIds)
    {
        global $dbConnection;
        // Affect new users
        foreach ($userIds as $userId) {
            $dbConnection->query("INSERT INTO project_user (ProjectID, UserID) VALUES ($projectId, $userId)");
        }
    }

    public function getUsersInProject($projectId)
    {
        global $dbConnection;
        $sql = "SELECT users.*
                FROM users
                JOIN project_user ON users.UserID = project_user.UserID
                WHERE project_user.ProjectID = ?";

        $stmt = $dbConnection->prepare($sql);
        $stmt->bind_param("i", $projectId);
        $stmt->execute();

        $result = $stmt->get_result();
        $usersInProject = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $usersInProject;
    }


    // Get users not assigned to the project
    public function getAvailableUsers($projectId)
    {
        global $dbConnection;
        $sql = "SELECT users.*
                FROM users
                WHERE users.UserID NOT IN (
                    SELECT project_user.UserID
                    FROM project_user
                    WHERE project_user.ProjectID = ?
                )";

        $stmt = $dbConnection->prepare($sql);
        $stmt->bind_param("i", $projectId);
        $stmt->execute();

        $result = $stmt->get_result();
        $availableUsers = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $availableUsers;
    }


    public function updateProject($id, $name, $description, $meniature, $idChef)
    {
        global $dbConnection;
        // Provide a valid UPDATE query
        $query = "UPDATE Projects SET Title = '$name', Description = '$description', Meniature = '$meniature', ChefID = $idChef WHERE ProjectID = $id";
        $result = $dbConnection->query($query);
        if ($result) {
            $_SESSION['successUpdateProject'] = 'Project Updated Successfully';
        } else {
            $_SESSION['failUpdateProject'] = 'Failure: Retry Again';
        }
    }
}
?>