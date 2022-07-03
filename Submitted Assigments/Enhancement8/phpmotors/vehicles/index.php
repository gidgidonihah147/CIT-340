<?php

//This is the Accounts Controller

//create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicle model
require_once '../model/vehicle-model.php';
// Get the functions library
require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = navList($classifications);

//Posting action filter
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

//Switch for php communication
switch ($action) {
  case 'vehicle':
    include '../view/add-vehicle.php';
    break;
  case 'classification_submit':
    // Filter and store the data
    $classification = trim(filter_input(INPUT_POST, 'classification', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    if (empty($classification)) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/add-classification.php';
      exit;
    }
    $regOutcome = submitClassification($classification);
    // Check and report the result
    if ($regOutcome === 1) {
      $message = "<p>Thanks for submitting a new classification called $classification.</p>";
      header('location: /phpmotors/vehicles');
      //include '../view/template.php';
      exit;
    } else {
      $message = "<p>Sorry $classification, was not able to be added. Please try again.</p>";
      include '../view/add-classification.php';
      exit;
    }
    break;
  case 'vehicle_submit':
    // Filter and store the data
    $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientMake = trim(filter_input(INPUT_POST, 'clientMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientModel = trim(filter_input(INPUT_POST, 'clientModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientDescription = trim(filter_input(INPUT_POST, 'clientDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientImagePath = trim(filter_input(INPUT_POST, 'clientImagePath', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientThumbnailPath = trim(filter_input(INPUT_POST, 'clientThumbnailPath', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientPrice = trim(filter_input(INPUT_POST, 'clientPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
    $clientColor = trim(filter_input(INPUT_POST, 'clientColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientStock = trim(filter_input(INPUT_POST, 'clientStock', FILTER_SANITIZE_NUMBER_INT));
    if (
      empty($classificationId) || empty($clientMake) || empty($clientModel) || empty($clientDescription) || empty($clientImagePath) || empty($clientThumbnailPath) || empty($clientPrice) || empty($clientColor) || empty($clientStock)
    ) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/add-vehicle.php';
      exit;
    }
    $regOutcome = submitVehicle($classificationId, $clientMake, $clientModel, $clientDescription, $clientImagePath, $clientThumbnailPath, $clientPrice, $clientColor, $clientStock);
    // Check and report the result
    if ($regOutcome === 1) {
      $message = "<p>Thanks for submitting a new vehicle.</p>";
      include '../view/vehicle-management.php';
    } else {
      $message = "<p>Sorry the new vehicle was not able to be added. Please try again. </p>";
      include '../view/add-vehicle.php';
    }
    break;
    /* * ********************************** 
    * Get vehicles by classificationId 
    * Used for starting Update & Delete process 
    * ********************************** */
  case 'getInventoryItems':
    // Get the classificationId 
    $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
    // Fetch the vehicles by classificationId from the DB 
    $inventoryArray = getInventoryByClassification($classificationId);
    // Convert the array to a JSON object and send it back 
    echo json_encode($inventoryArray);
    break;

  case 'mod':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '../view/vehicle-update.php';
    exit;
    break;

  case 'updateVehicle':
    // Filter and store the data
    $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientMake = trim(filter_input(INPUT_POST, 'clientMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientModel = trim(filter_input(INPUT_POST, 'clientModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientDescription = trim(filter_input(INPUT_POST, 'clientDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientImagePath = trim(filter_input(INPUT_POST, 'clientImagePath', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientThumbnailPath = trim(filter_input(INPUT_POST, 'clientThumbnailPath', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientPrice = trim(filter_input(INPUT_POST, 'clientPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
    $clientColor = trim(filter_input(INPUT_POST, 'clientColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientStock = trim(filter_input(INPUT_POST, 'clientStock', FILTER_SANITIZE_NUMBER_INT));
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
    if (
      empty($classificationId) || empty($clientMake) || empty($clientModel) || empty($clientDescription) || empty($clientImagePath) || empty($clientThumbnailPath) || empty($clientPrice) || empty($clientColor) || empty($clientStock) || empty($invId)
    ) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/vehicle-update.php';
      exit;
    }

    $updateResult = updateVehicle($classificationId, $clientMake, $clientModel, $clientDescription, $clientImagePath, $clientThumbnailPath, $clientPrice, $clientColor, $clientStock, $invId);
    // Check and report the result
    if ($updateResult) {
      $message =
        "
        <p class='notice'>Congratulations, the $clientMake $clientModel was successfully updated to the following.</p>
        <ul style = 'width: 90%; margin: auto; text-align: center; max-width:900px;'>
          <li style = 'list-style-type: none; border: black solid 3px'>Classification ID = $classificationId</li>
          <li style = 'list-style-type: none; border: black solid 3px'>Make = $clientMake</li>
          <li style = 'list-style-type: none; border: black solid 3px'>Model = $clientModel</li>
          <li style = 'list-style-type: none; border: black solid 3px'>Description = $clientDescription</li>
          <li style = 'list-style-type: none; border: black solid 3px'>Image Path = $clientImagePath</li>
          <li style = 'list-style-type: none; border: black solid 3px'>Thumbnail Path = $clientThumbnailPath</li>
          <li style = 'list-style-type: none; border: black solid 3px'>Price = $clientPrice</li>
          <li style = 'list-style-type: none; border: black solid 3px'>Color = $clientColor</li>
          <li style = 'list-style-type: none; border: black solid 3px'>Stock Count = $clientStock</li>
        </ul>
      ";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p class='notice'>Error. the $clientMake $clientModel was not updated as nothing was changed.</p>";
      include '../view/vehicle-update.php';
      exit;
    }
    break;

  case 'del':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '../view/vehicle-delete.php';
    exit;

    break;

  case 'deleteVehicle':
    // Filter and store the data
    $clientMake = trim(filter_input(INPUT_POST, 'clientMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientModel = trim(filter_input(INPUT_POST, 'clientModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    $deleteResult = deleteVehicle($invId);
    // Check and report the result
    if ($deleteResult) {
      $message = "<p class='notice'>Congratulations, the $clientMake $clientModel was successfully deleted!</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p class='notice'>Error: $invMake $invModel was not deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    }
    break;

  case 'classification':
    $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $vehicles = getVehiclesByClassification($classificationName);
    if (!count($vehicles)) {
      $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
    } else {
      $vehicleDisplay = buildVehiclesDisplay($vehicles);
    }
    include '../view/classification.php';
    break;

  case 'vehicleView':
    // Filter the input
    $vehicleId = filter_input(INPUT_GET, 'Vehicle', FILTER_SANITIZE_NUMBER_INT);

    // Get the vehicles information
    $vehiclesDetail = getVehicleInfo($vehicleId);
    $vehicleImport = buildVehiclesHTML($vehiclesDetail);

    include '../view/vehicle-detail.php';
    break;

  default:
    $classificationList = buildClassificationList($classifications);


    include '../view/vehicle-management.php';
    break;
}
