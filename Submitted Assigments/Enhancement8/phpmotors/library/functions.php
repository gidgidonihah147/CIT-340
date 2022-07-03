<?php

function checkEmail($clientEmail)
{
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
}

function navList($classifications)
{
    // Build a navigation bar using the $classifications array
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName="
            . urlencode($classification['classificationName']) .
            "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
}

// Build the classifications select list 
function buildClassificationList($classifications)
{
    $classificationList = '<select name="classificationId" id="classificationList">';
    $classificationList .= "<option>Choose a Classification</option>";
    foreach ($classifications as $classification) {
        $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
    }
    $classificationList .= '</select>';
    return $classificationList;
}


function buildVehiclesDisplay($vehicles){
    $dv = '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {
        $dv .= '<li>';
        $dv .= "<a href = '/phpmotors/vehicles/index.php?action=vehicleView&Vehicle=$vehicle[invId]'>";
        $dv .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com' class='img'>";
        $dv .= '<hr>';
        $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
        $dv .= "<span>$vehicle[invPrice]</span>";
        $dv .= '</a>';
        $dv .= '</li>';
    }
    $dv .= '</ul>';
    return $dv;
}

function buildVehiclesHTML($vehiclesDetail){
    $dv = "<h1>$vehiclesDetail[invMake] $vehiclesDetail[invModel]</h1>";
    $dv .= "<section class = 'carDetails'>";
    $dv .= "<img src='$vehiclesDetail[invImage]' alt='$vehiclesDetail[invMake]-$vehiclesDetail[inModel]'>";
    $dv .= "<div class = 'details'>";
    $dv .= '<h2>Price: $'.number_format($vehiclesDetail['invPrice']).'</h2>';
    $dv .= "<h3>$vehiclesDetail[invMake] $vehiclesDetail[invModel] Details</h3>";
    $dv .= "<p>$vehiclesDetail[invDescription]</p><br>";
    $dv .= "<p>Color: $vehiclesDetail[invColor]</p><br>";
    $dv .= "<p>Number in Stock: $vehiclesDetail[invStock]</p>";
    $dv .= "</div>";
    $dv .= '</section>';
    return $dv;
}


