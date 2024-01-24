<?php

include_once("Database.php");
$dbSingleton = Database::getInstance();
$dbConnection = $dbSingleton->getConnection();

class Pub {
    public $id;
    public $title;
    public $description;
    public $repertoire;
    public $timestamp;
    public $projectId;

    public function __construct(){}

    // Constructor with parameters
    public function __constructWithParams($id, $title, $description, $repertoire, $timestamp, $projectID)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->repertoire = $repertoire;
        $this->timestamp = $timestamp;
        $this->projectID = $projectID;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getRepertoire() {
        return $this->repertoire;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function getProjectId() {
        return $this->projectId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setRepertoire($repertoire) {
        $this->repertoire = $repertoire;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    public function addPub($title, $description, $repertoire, $projectId) {
        global $dbConnection;
    
        // Insert publication details into the database
        $query = "INSERT INTO Pubs (Title, Description, Repertoire, Timestamp, ProjectID) VALUES
        ('$title', '$description', '$repertoire', NOW(), $projectId);";
        $result = $dbConnection->query($query);
    
        if ($result) {
            $_SESSION["successAddPub"] = 'Publication Added Successfully';
        } else {
            $_SESSION['failAddPub'] = 'Failure: Retry Again';
        }
    }
    

    public function deletePub($pubId) {
        global $dbConnection;
    
        // Fetch the publication details to get the directory path
        $query = "SELECT * FROM Pubs WHERE PubID = $pubId";
        $result = $dbConnection->query($query);
    
        if ($result && $result->num_rows > 0) {
            $publication = $result->fetch_assoc();
            $directory = $publication['Repertoire'];
    
            // Delete the associated directory and its contents
            if (file_exists($directory)) {
                $this->deleteDirectory($directory);
            }
    
            // Now, delete the record from the database
            $deleteQuery = "DELETE FROM Pubs WHERE PubID = '$pubId'";
            $deleteResult = $dbConnection->query($deleteQuery);
    
            if ($deleteResult) {
                $_SESSION["successDeletePub"] = 'Publication Deleted Successfully';
            } else {
                $_SESSION['failDeletePub'] = 'Failure: Retry Again';
            }
        } else {
            $_SESSION['failDeletePub'] = 'Publication not found';
        }
    }
    
    // Helper function to recursively delete a directory and its contents
    private function deleteDirectory($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . "/" . $object)) {
                        $this->deleteDirectory($dir . "/" . $object);
                    } else {
                        unlink($dir . "/" . $object);
                    }
                }
            }
            rmdir($dir);
        }
    }

    public function updatePub($id, $title, $description, $repertoire, $projectId) {
        global $dbConnection;
        $query = "UPDATE Pub SET title = '$title', description = '$description', repertoire = '$repertoire', projectId = $projectId WHERE id = $id";
        $result = $dbConnection->query($query);

        if ($result) {
            $_SESSION["successUpdatePub"] = 'Publication Updated Successfully';
        } else {
            $_SESSION['failUpdatePub'] = 'Failure: Retry Again';
        }
    }

    public function getAllPublications() {
        global $dbConnection;
        $query = "SELECT * FROM Pubs";
        $result = $dbConnection->query($query);

        $publications = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $publications[] = $row;
            }
        }

        return $publications;
    }
}
?>
