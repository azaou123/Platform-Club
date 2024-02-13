<?php
include("Database.php");
$dbSingleton = Database::getInstance();
$dbConnection = $dbSingleton->getConnection();

class User
{
    private $user_id;
    private $nom_complet;
    private $motif;
    private $telephone;
    private $email;
    private $photo;
    private $password;
    private $account_state;
    private $facebook;
    private $insta;
    private $linkedin;
    private $cellule;  // User may or may not belong to a cellule
    private $projet;   // User may or may not belong to a projet
    private $role;

    public function __construct()
    {

    }

    public function constructWithParams($user_id, $nom_complet, $motif, $telephone, $email, $photo, $password, $account_state, $facebook, $insta, $linkedin)
    {
        $this->user_id = $user_id;
        $this->nom_complet = $nom_complet;
        $this->motif = $motif;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->photo = $photo;
        $this->password = $password;
        $this->account_state = $account_state;
        $this->facebook = $facebook;
        $this->insta = $insta;
        $this->linkedin = $linkedin;
        $this->cellule = null;  // User may or may not belong to a cellule
        $this->projet = null;   // User may or may not belong to a projet
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getNomComplet()
    {
        return $this->nom_complet;
    }

    public function getMotif()
    {
        return $this->motif;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAccountState()
    {
        return $this->account_state;
    }

    public function getFacebook()
    {
        return $this->facebook;
    }

    public function getInsta()
    {
        return $this->insta;
    }

    public function getLinkedin()
    {
        return $this->linkedin;
    }

    public function getCellule()
    {
        return $this->cellule;
    }

    public function getProjet()
    {
        return $this->projet;
    }


    // Setters
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setNomComplet($nom_complet)
    {
        $this->nom_complet = $nom_complet;
    }

    public function setMotif($motif)
    {
        $this->motif = $motif;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setAccountState($account_state)
    {
        $this->account_state = $account_state;
    }

    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    public function setInsta($insta)
    {
        $this->insta = $insta;
    }

    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
    }

    public function setCellule($cellule)
    {
        $this->cellule = $cellule;
    }

    public function setProjet($projet)
    {
        $this->projet = $projet;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }


    public function assignCellule($cellule)
    {
        $this->cellule = $cellule;
    }

    public function assignProjet($projet)
    {
        $this->projet = $projet;
    }

    public function assignRole($role)
    {
        $this->role = $role;
    }

    public function getRole($idRole, $dbconnection)
    {
        $query = "SELECT * FROM Roles WHERE RoleID = '$idRole'";
        $result = mysqli_query($dbconnection, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $roleDetails = mysqli_fetch_assoc($result);
            return $roleDetails['RoleName'];
        } else {
            return null;
        }
    }

    public static function getUsersByRole($roleName)
    {
        global $dbConnection; // Assuming you have a global connection instance
        $roleName = mysqli_real_escape_string($dbConnection, $roleName);
        $query = "SELECT * FROM Users WHERE RoleID IN (SELECT RoleID FROM Roles WHERE RoleName = '$roleName')";
        $result = $dbConnection->query($query);
        $user = $result->fetch_assoc();
        // $users = [];
        // if ($result) {
        //     while ($row = $result->fetch_assoc()) {
        //         $user = new User();
        //         $user->constructWithParams(
        //             $row['UserID'],
        //             $row['NomComplet'],
        //             $row['Motif'],
        //             $row['Telephone'],
        //             $row['Email'],
        //             $row['Photo'],
        //             $row['Password'],
        //             $row['AccountState'],
        //             $row['Facebook'],
        //             $row['Insta'],
        //             $row['Linkedin']
        //         );
        //         // Assign cellule and projet if applicable
        //         $user->assignCellule($row['CelluleID']);
        //         $user->assignProjet($row['ProjetID']);
        //         $users[] = $user;
        //     }
        // }

        return $user;
    }

    public function login($email, $password)
    {
        global $dbConnection;

        // Sanitize the email
        $email = mysqli_real_escape_string($dbConnection, $email);
        // Retrieve user details including AccountState
        $query = "SELECT * FROM Users WHERE Email='$email' LIMIT 1";
        $r = mysqli_query($dbConnection, $query);
        if ($r && mysqli_num_rows($r) > 0) {
            $userDetails = mysqli_fetch_assoc($r);
            if (password_verify($password, $userDetails['Password'])) {
                if (!$userDetails['AccountState']) {
                    $_SESSION['failLogin'] = "Your account is pending approval. Please wait for confirmation.";
                    return false;
                }
                unset($userDetails['Password']);
                return $userDetails;
            } else {
                $_SESSION['failLogin'] = "Invalid email or password";
                return false;
            }
        }
        $_SESSION['failLogin'] = "Invalid email or password";
        return false;
    }

    public function getCelluleLabelByUserId($userId)
    {
        global $dbConnection;
        $userId = mysqli_real_escape_string($dbConnection, $userId);
        $query = "SELECT c.Label FROM Cellule c
            INNER JOIN Users u ON c.CelluleID = u.CelluleID
            WHERE u.UserID = '$userId'";
        $result = $dbConnection->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['Label'];
        }

        return null;
    }

    public function getProjectNameByUserId($userId)
    {
        global $dbConnection;
        $userId = mysqli_real_escape_string($dbConnection, $userId);
        $query = "SELECT p.Title FROM Projects p
                  INNER JOIN Users u ON p.ProjectID = u.ProjectID
                  WHERE u.UserID = '$userId'";
        $result = $dbConnection->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['Title'];
        }

        return null;
    }
    public function getRoleNameByUserId($userId)
    {
        global $dbConnection;
        $userId = mysqli_real_escape_string($dbConnection, $userId);
        $query = "SELECT r.RoleName FROM Roles r
                  INNER JOIN Users u ON r.RoleID = u.RoleID
                  WHERE u.UserID = '$userId'";
        $result = $dbConnection->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['RoleName'];
        }

        return null;
    }

    public function getBoard()
    {
        global $dbConnection;
        $users = [];
        for ($i = 1; $i < 20; $i++) {
            $query = "SELECT * FROM Users WHERE RoleID IN (SELECT RoleID FROM Roles WHERE RoleID = '$i')";
            $r = $dbConnection->query($query);
            if ($r->num_rows > 0) {
                while ($row = $r->fetch_assoc()) {
                    array_push($users, $row);
                }
            }
        }
        return $users;
    }






    /**
     * Get a user by email address.
     *
     * @param string $email Email address of the user
     * @return array|null Returns user data as an associative array or null if not found
     */
    public function getUserByEmail($email)
    {
        global $dbConnection;

        // Sanitize the email
        $email = $dbConnection->real_escape_string($email);

        // Query to retrieve the user
        $query = "SELECT * FROM users WHERE Email = '$email' LIMIT 1";

        $result = $dbConnection->query($query);

        if ($result && $result->num_rows > 0) {
            // User found, return user data
            return $result->fetch_assoc();
        } else {
            // User not found
            return null;
        }
    }

    /**
     * Register a new user.
     *
     * @param string $nomComplet Full name of the user
     * @param string $email Email address of the user
     * @param string $password Password for the user
     * @param string $telephone Telephone number of the user
     * @param array $photo Uploaded photo information from $_FILES
     * @return bool|string Returns true on success, or an error message on failure
     */
    public function register($nomComplet, $email, $password, $telephone, $photo)
{
    global $dbConnection;

    // Check if the email is already registered
    $existingUser = $this->getUserByEmail($email);
    if ($existingUser) {
        return "Email address is already registered.";
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Get the current maximum UserID
    $maxUserIdQuery = "SELECT MAX(UserID) AS maxUserId FROM users";
    $maxUserIdResult = $dbConnection->query($maxUserIdQuery);
    
    if ($maxUserIdResult) {
        $maxUserIdData = $maxUserIdResult->fetch_assoc();
        $nextUserId = $maxUserIdData['maxUserId'] + 1;
    } else {
        // Failed to get the current maximum UserID
        return "Failed to retrieve UserID. Please try again.";
    }

    // Process file upload for photo
    if ($photo['error'] === UPLOAD_ERR_OK) {
        // Set a unique filename to avoid overwriting existing files
        $targetDir = 'uploads/users/'; // Update with your actual upload directory
        $uniqueFilename = 'photo_' . $nextUserId . '_' . basename($photo['name']);
        $targetFilePath = $targetDir . $uniqueFilename;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($photo['tmp_name'], $targetFilePath)) {
            // Photo uploaded successfully
            $photoPath = $targetFilePath;
        } else {
            // Failed to move the uploaded file
            return "Failed to upload photo.";
        }
    } else {
        // File upload error
        return "Photo upload error.";
    }

    // Insert the new user into the database with the next available UserID
    $query = "INSERT INTO users (UserID, NomComplet, Email, Password, Telephone, photo) 
        VALUES ('$nextUserId', '$nomComplet', '$email', '$hashedPassword', '$telephone', '$uniqueFilename')";
    if ($dbConnection->query($query)) {
        // Registration successful
        return true;
    } else {
        // Registration failed
        return "Registration failed. Please try again.";
    }
}



    function getUserById($id)
    {
        global $dbConnection;
        $sql = "SELECT * FROM Users WHERE UserID = " . $id;
        $result = $dbConnection->query($sql);
        // Check if the query was successful
        if ($result->num_rows > 0) {
            // Fetch user data
            $user = $result->fetch_assoc();
            // Close the database connection
            // $dbConnection->close();
            // Return user data
            return $user;
        } else {
            // Close the database connection
            // $dbConnection->close();
            // Return null if user with the given ID is not found
            return null;
        }
    }

    public function getUsers($roleId, $celluleId = null)
    {
        // Create a new instance of the Database class
        $dbSingleton = Database::getInstance();
        $dbConnection = $dbSingleton->getConnection();

        // Check connection
        if ($dbConnection->connect_error) {
            die("Connection failed: " . $dbConnection->connect_error);
        }

        // Prepare the SQL query based on the role and cellule
        if ($roleId == 1 || $roleId == 2 || $roleId == 3 || $roleId == 4 || $roleId == 7 || $roleId == 8) {
            // For roles P and VP, get all users
            $sql = "SELECT * FROM users";
        } elseif ($roleId == 5 || $roleId == 6) {
            // For roles RC and CC, get users in the same cellule
            if ($celluleId !== null) {
                $sql = "SELECT * FROM users WHERE CelluleID = $celluleId ";
            } else {
                // Handle the case where celluleId is not provided
                return [];
            }
        }

        // Execute the query
        $result = $dbConnection->query($sql);

        // Check if the query was successful
        if ($result->num_rows > 0) {
            // Fetch all users
            $users = $result->fetch_all(MYSQLI_ASSOC);

            // Log the fetched data for debugging
            error_log(print_r($users, true));

            // Return the array of users
            return $users;
        } else {
            // Return an empty array if no users found
            return [];
        }
    }


    public function editUser($userId, $newNomComplet, $newMotif, $newTelephone, $newEmail, $newPhoto, $newFacebook, $newInsta, $newLinkedin)
    {
        global $dbConnection;

        // Use prepared statements to prevent SQL injection
        $stmt = $dbConnection->prepare("UPDATE Users SET NomComplet = ?, Motif = ?, Telephone = ?, Email = ?, Photo = ?, Facebook = ?, Insta = ?, Linkedin = ? WHERE UserID = ?");

        if (!$stmt) {
            // Handle the error appropriately
            return false;
        }

        // Bind parameters
        $stmt->bind_param("ssssssssi", $newNomComplet, $newMotif, $newTelephone, $newEmail, $newPhoto, $newFacebook, $newInsta, $newLinkedin, $userId);

        // Execute the statement
        $result = $stmt->execute();

        // Close the statement
        // $stmt->close();

        // Check if the update was successful
        if ($result) {
            return true;
        } else {
            // Handle the error appropriately
            return false;
        }
    }

    public function assignToCellule($celluleId)
    {
        global $dbConnection;

        // Check if the user already belongs to a cellule
        if ($this->cellule !== null) {
            return false; // User is already assigned to a cellule
        }

        // Use prepared statements to prevent SQL injection
        $stmt = $dbConnection->prepare("UPDATE Users SET CelluleID = ? WHERE UserID = ?");

        if (!$stmt) {
            // Handle the error appropriately
            return false;
        }

        // Bind parameters
        $stmt->bind_param("ii", $celluleId, $this->user_id);

        // Execute the statement
        $result = $stmt->execute();

        // Close the statement
        // $stmt->close();

        // Check if the assignment was successful
        if ($result) {
            // Update the user object
            $this->cellule = $celluleId;
            return true;
        } else {
            // Handle the error appropriately
            return false;
        }
    }


    public function assignCellulee($userId, $celluleId)
    {
        global $dbConnection;

        // Perform the database update for assigning to Cellule
        // Use prepared statements to prevent SQL injection
        $query = "UPDATE users SET CelluleID = ? WHERE UserID = ?";
        $stmt = $dbConnection->prepare($query);
        $stmt->bind_param("ii", $celluleId, $userId);

        // Execute the statement
        $result = $stmt->execute();

        // Check if the update was successful
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function assignProject($userId, $projectId)
    {
        global $dbConnection;

        // Perform the database update for assigning to Project
        // Use prepared statements to prevent SQL injection
        $query = "UPDATE users SET ProjectID = ? WHERE UserID = ?";
        $stmt = $dbConnection->prepare($query);
        $stmt->bind_param("ii", $projectId, $userId);

        // Execute the statement
        $result = $stmt->execute();

        // Check if the update was successful
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function assignRolee($userId, $roleId)
    {
        global $dbConnection;

        // Perform the database update for assigning to Role
        // Use prepared statements to prevent SQL injection
        $query = "UPDATE users SET RoleID = ? WHERE UserID = ?";
        $stmt = $dbConnection->prepare($query);
        $stmt->bind_param("ii", $roleId, $userId);

        // Execute the statement
        $result = $stmt->execute();

        // Check if the update was successful
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function assignToProjet($projetId)
    {
        global $dbConnection;

        // Check if the user already belongs to a projet
        if ($this->projet !== null) {
            return false; // User is already assigned to a projet
        }

        // Use prepared statements to prevent SQL injection
        $stmt = $dbConnection->prepare("UPDATE Users SET ProjetID = ? WHERE UserID = ?");

        if (!$stmt) {
            // Handle the error appropriately
            return false;
        }

        // Bind parameters
        $stmt->bind_param("ii", $projetId, $this->user_id);

        // Execute the statement
        $result = $stmt->execute();

        // Close the statement
        $stmt->close();

        // Check if the assignment was successful
        if ($result) {
            // Update the user object
            $this->projet = $projetId;
            return true;
        } else {
            // Handle the error appropriately
            return false;
        }
    }

    public function assignToRole($roleId)
    {
        global $dbConnection;

        // Check if the user already has a role
        if ($this->role !== null) {
            return false; // User already has a role
        }

        // Use prepared statements to prevent SQL injection
        $stmt = $dbConnection->prepare("UPDATE Users SET RoleID = ? WHERE UserID = ?");

        if (!$stmt) {
            // Handle the error appropriately
            return false;
        }

        // Bind parameters
        $stmt->bind_param("ii", $roleId, $this->user_id);

        // Execute the statement
        $result = $stmt->execute();

        // Close the statement
        $stmt->close();

        // Check if the assignment was successful
        if ($result) {
            // Update the user object
            $this->role = $roleId;
            return true;
        } else {
            // Handle the error appropriately
            return false;
        }
    }

    public function getAllCellules()
    {
        global $dbConnection;
        $query = "SELECT * FROM Cellule";
        $result = $dbConnection->query($query);

        $cellules = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $cellules[] = $row; // Add the entire row to the $cellules array
            }
        } else {
            // Print an error message if the query fails
            die("Query failed: " . $dbConnection->error);
        }
        return $cellules;
    }

    public function getAllProjects()
    {
        global $dbConnection;
        $query = "SELECT * FROM Projects";
        $result = $dbConnection->query($query);
        $projects = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($projects, $row);
            }
        }
        return $projects;
    }

    public function getAllStatements()
    {
        global $dbConnection;
        $query = "SELECT * FROM statements";
        $result = $dbConnection->query($query);
        $stmts = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($stmts, $row);
            }
        }
        return $stmts;
    }

    public function getAllPubs()
    {
        global $dbConnection;
        $query = "SELECT * FROM Pubs";
        $result = $dbConnection->query($query);

        $pubs = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                array_push($pubs, $row);
            }
        }

        return $pubs;
    }

    public function sendMessage($name, $whatsapp, $email, $message)
    {
        global $dbConnection;
        $sql = "insert into Messages (name,whatsapp,email,message) values ('$name', '$whatsapp' ,'$email', '$message')";
        $result = $dbConnection->query($sql);
        if ($result)
            return true;
        else
            return false;
    }


    public function getAllRoles()
    {
        global $dbConnection;
        $query = "SELECT * FROM Roles";
        $result = $dbConnection->query($query);

        $roles = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $roles[$row['RoleID']] = $row['RoleName'];
            }
        } else {
            // Print an error message if the query fails
            die("Query failed: " . $dbConnection->error);
        }
        return $roles;
    }


    public function getAllUsers()
    {
        global $dbConnection;
        // Provide a valid SELECT query to fetch all users
        $query = "SELECT UserID, NomComplet FROM Users where AccountState = 1";
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




}
?>