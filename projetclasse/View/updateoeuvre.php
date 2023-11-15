<?php
require_once('../Controller/OrganizationC.php');

// Check if organization ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch organization details based on ID (this could be from your database)
    // For demonstration purposes, setting up sample organization details
    $organizationDetails = [
        'ID' => $id,
        'Name' => 'Sample Organization', // Fetch the actual organization name from the database using $id
        // Add more organization details as needed
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Assuming input names match the fields in the database
        $updatedName = $_POST['name'];
        $updatedSize = $_POST['size'];
        $updatedActivityArea = $_POST['activityArea'];
        $updatedCountry = $_POST['country'];
        $updatedPhone = $_POST['phone'];
        $updatedPostalCode = $_POST['postalCode'];
        $updatedFullAddress = $_POST['fullAddress'];
        $updatedWebsite = $_POST['website'];
        $updatedLinkedIn = $_POST['linkedIn'];
        $updatedFacebook = $_POST['facebook'];

        // Create an instance of OrganizationC
        $organizationController = new OrganizationC();

        // Update the organization details
        $updateResult = $organizationController->updateOrganization(
            $id,
            $updatedName,
            $updatedSize,
            $updatedActivityArea,
            $updatedCountry,
            $updatedPhone,
            $updatedPostalCode,
            $updatedFullAddress,
            $updatedWebsite,
            $updatedLinkedIn,
            $updatedFacebook
        );

        // Output the update result
        echo "<p>$updateResult</p>";
    }
} else {
    echo "Organization ID not specified.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update oeuvre Information</title>
</head>
<body>
    <h1>Update oeuvre Information</h1>

    <form action="" method="POST">
        <!-- Input fields for organization details -->
        <label for="titre">titre:</label>
        <input type="text" id="titre" name="titre" required><br><br>

        <label for="proprietaire">proprietaire:</label>
        <input type="text" id="proprietaire" name="proprietaire"><br><br>

        <label for="description">description:</label>
        <input type="text" id="description" name="description"><br><br>

        <label for="prix">prix:</label>
        <input type="text" id="prix" name="prix"><br><br>

        <label for="support">support:</label>
        <input type="text" id="support" name="support"><br><br>

        <label for="etat">etat:</label>
        <input type="text" id="etat" name="etat"><br><br>

        <label for="poids">poids:</label>
        <input type="text" id="poids" name="poids"><br><br>

        <label for="image">image:</label>
        <input type="text" id="image" name="image"><br><br>

        <input type="submit" name="submit" value="update oeuvre">
    </form>
</body>
</html>
