<?php

//This is the Accounts Controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicle model
require_once '../model/vehicle-model.php';


// Get the array of classifications
$classifications = getClassifications();
// var_dump($classifications);
// 	exit;

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='/phpmotors/index.php?action=" . $classification['classificationName'] . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

/* echo $navList;
exit; */
$classList = '<label for="clientClassification">Car Classification:</label><br>';
$classList .= '<select name= "clientClassification" id = "clientClassification">';
$classList .= "<option disabled selected>Select a classification</option>";
foreach ($classifications as $classification) {
    $classList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
}
$classList .= "</select>";

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'classification':
        include '../view/classification.php';
        break;
    case 'vehicle':
        include '../view/vehicleManagement.php';
        break;
    case 'classification_submit':
        // Filter and store the data
        $classification = filter_input(INPUT_POST, 'classification');
        if (empty($classification)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/classification.php';
            exit;
        }
        $regOutcome = submitClassification($classification);
        // Check and report the result
        if ($regOutcome === 1) {
            $message = "<p>Thanks for submitting a new classification called $classification.</p>";
            include '../view/template.php';
            exit;
        } else {
            $message = "<p>Sorry $classification, was not able to be added. Please try again.</p>";
            include '../view/classification.php';
            exit;
        }
        break;
    case 'vehicle_submit':
        // Filter and store the data
        $clientClassification = filter_input(INPUT_POST, 'clientClassification');
        $clientMake = filter_input(INPUT_POST, 'clientMake');
        $clientModel = filter_input(INPUT_POST, 'clientModel');
        $clientDescription = filter_input(INPUT_POST, 'clientDescription');
        $clientImagePath = filter_input(INPUT_POST, 'clientImagePath');
        $clientThumbnailPath = filter_input(INPUT_POST, 'clientThumbnailPath');
        $clientPrice = filter_input(INPUT_POST, 'clientPrice');
        $clientColor = filter_input(INPUT_POST, 'clientColor');
        $clientStock = filter_input(INPUT_POST, 'clientStock');
        if (
            empty($clientClassification) || empty($clientMake) || empty($clientModel) || empty($clientDescription) || empty($clientImagePath) || empty($clientThumbnailPath) || empty($clientPrice) || empty($clientColor) || empty($clientStock)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            exit;

            include '../view/vehicleManagement.php';
            exit;
        }
        $regOutcome = submitVehicle($clientClassification, $clientMake, $clientModel, $clientDescription, $clientImagePath, $clientThumbnailPath, $clientPrice, $clientColor, $clientStock);
        // Check and report the result
        if ($regOutcome === 1) {
            $message = "<p>Thanks for submitting a new vehicle.</p>";
            include '../view/template.php';
            exit;
        } else {
            $message = "<p>Sorry the new vehicle was not able to be added. Please try again. </p>";
            include '../view/vehicleManagement.php';
            exit;
        }
        break;
    default:
        include '../view/template.php';
}
