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
  case 'classification':
    include '../view/add-classification.php';
    break;
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
  default:
    include '../view/vehicle-management.php';
    break;
}
