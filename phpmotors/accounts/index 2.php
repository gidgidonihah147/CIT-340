<?php

//This is the Accounts Controller

//create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';

if (isset($_COOKIE['firstname'])) {
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

// Get the array of classifications
$classifications = getClassifications();
//var_dump($classifications);
//	exit;
// Build a navigation bar using the $classifications array
$navList = navList($classifications);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'registration':
        include '../view/registration.php';
        break;
    case 'register':
        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkpassword($clientPassword);

        $existingEmail = checkExistingEmail($clientEmail);

        //Check for existing email address in the table
        if ($existingEmail) {
            $message = '<br><p class="notice" style="color=red">That email address already exists in our system. Do you want to login instead?</p><br>';
            include '../view/login.php';
            exit;
        }

        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        // Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
            header('Location: /phpmotors/accounts/?action=Login');
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }
        break;
    case 'Login':
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $passwordCheck = checkPassword($clientPassword);

        // Run basic checks, return if errors
        if (empty($clientEmail) || empty($passwordCheck)) {
            $message = '<p class="notice">Please provide a valid email address and password.</p>';
            include '../view/login.php';
            exit;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;

        if (isset($_session['loggedin'])) {
            $_Session['firstName'] = $_Session['clientData']['clientFirstname'];
            $_Session['clientLevel'] = $_Session['clientData']['clientLevel'];
            $_Session['clientEmail'] = $_Session['clientData']['clientEmail'];
        }
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        include '../view/admin.php';
        exit;
        break;

    case 'Logout':
        echo "<p>least its pulling</p>";
        if (isset($_SESSION['clientData'])) {
            unset($_SESSION['clientData']);
            setcookie('firstname', "", time() - 3600, '/');
            session_destroy();
            header('Location: /phpmotors/');
            exit;
        }
        header('Location: /phpmotors/index.php');
        exit;
        break;
    case 'updateInfo':
        include '../view/client-update.php';
        break;

    case 'updateUser':
        // Get the data from the view.
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $newEmail = filter_input(INPUT_POST, 'newEmail', FILTER_SANITIZE_EMAIL);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

        // Validate the new email.
        $newEmail = checkEmail($newEmail);

        // If email already exist, return client to update page.
        if (checkExistingEmail($newEmail)) {
            $message = "Email already exist, please try a different one.";
            include '../view/client-update.php';
            exit;
        }

        // Check that all the information is present.
        if (empty($firstName) || empty($lastName) || empty($newEmail) || empty($clientId)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit;
        }

        // Update the information in the database.
        $resultUser = updateUser($firstName, $lastName, $newEmail, $clientId);

        // Query the client data based on the email address
        $clientData = getClientId($clientId);
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;

        // Check and report the result
        if ($resultPersonal) {
            $message = "<p>Information update was a success.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        } else {
            $message = "<p>Sorry, but information update failed. Please try again.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        }
        break;

    case 'updatePassword':
        // Get the new password.
        $newPassword = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        // Validate the password
        $checkPassword = checkPassword($newPassword);

        // Check for missing data
        if (empty($checkPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password.
        $resultPassword = updateNewPassword($hashedPassword, $invId);

        // Check and report the result
        if ($resultPassword) {
            $message = "<p>Password update was a success.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        } else {
            $message = "<p>Sorry, but password update failed. Please try again.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        }
        break;


    default:
        include '../view/admin.php';
        exit;
}
