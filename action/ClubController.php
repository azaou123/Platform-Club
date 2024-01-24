<?php

$dbSingleton = Database::getInstance();
$dbConnection = $dbSingleton->getConnection();

class ClubController {
    private $description;
    private $logo;
    private $creationDate;
    private $website;
    private $email;
    private $insta;
    private $linkedin;
    private $facebook;
    private $phoneNumber;
    private $addressID;

    public function __construct() {}

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getLogo() {
        return $this->logo;
    }

    public function setLogo($logo) {
        $this->logo = $logo;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }

    public function getWebsite() {
        return $this->website;
    }

    public function setWebsite($website) {
        $this->website = $website;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getInsta() {
        return $this->insta;
    }

    public function setInsta($insta) {
        $this->insta = $insta;
    }

    public function getLinkedin() {
        return $this->linkedin;
    }

    public function setLinkedin($linkedin) {
        $this->linkedin = $linkedin;
    }

    public function getFacebook() {
        return $this->facebook;
    }

    public function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function getAddressID() {
        return $this->addressID;
    }

    public function setAddressID($addressID) {
        $this->addressID = $addressID;
    }

    public function getClubDetails() {
        global $dbConnection;
        $query = "SELECT * FROM Club LIMIT 1";
        $result = mysqli_query($dbConnection, $query);

        if ($result) {
            $clubDetails = mysqli_fetch_assoc($result);

            $this->description = $clubDetails['Description'];
            $this->logo = $clubDetails['Logo'];
            $this->creationDate = $clubDetails['CreationDate'];
            $this->website = $clubDetails['Website'];
            $this->email = $clubDetails['Email'];
            $this->insta = $clubDetails['Insta'];
            $this->linkedin = $clubDetails['LinkedIn'];
            $this->facebook = $clubDetails['Facebook'];
            $this->phoneNumber = $clubDetails['PhoneNumber'];
            $this->addressID = $clubDetails['AddressID'];

            return $clubDetails;
        } else {
            return null;
        }
    }

    public function updateClubDetails() {
        global $dbConnection;
        $description = mysqli_real_escape_string($dbConnection, $this->description);
        $logo = mysqli_real_escape_string($dbConnection, $this->logo);
        $creationDate = mysqli_real_escape_string($dbConnection, $this->creationDate);
        $website = mysqli_real_escape_string($dbConnection, $this->website);
        $email = mysqli_real_escape_string($dbConnection, $this->email);
        $insta = mysqli_real_escape_string($dbConnection, $this->insta);
        $linkedin = mysqli_real_escape_string($dbConnection, $this->linkedin);
        $facebook = mysqli_real_escape_string($dbConnection, $this->facebook);
        $phoneNumber = mysqli_real_escape_string($dbConnection, $this->phoneNumber);
        $addressID = mysqli_real_escape_string($dbConnection, $this->addressID);

        $query = "UPDATE Club SET Description='$description', Logo='$logo', CreationDate='$creationDate', Website='$website', Email='$email', Insta='$insta', LinkedIn='$linkedin', Facebook='$facebook', PhoneNumber='$phoneNumber', AddressID='$addressID' LIMIT 1";

        $result = mysqli_query($dbConnection, $query);

        return $result;
    }
}
