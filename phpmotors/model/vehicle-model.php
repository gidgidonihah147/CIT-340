<?php

//This is the vehicles model



function submitClassification($classification)
{
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO carclassification 
     VALUES (default, :classification)';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':classification', $classification, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}

function submitVehicle($clientClassification, $clientMake, $clientModel, $clientDescription, $clientYear, $clientMiles, $clientPrice, $clientColor)
{
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO inventory (classificationId,invMake,invModel,invDescription,invYear,invMiles,invPrice,invColor)
     VALUES (:clientClassification,:clientMake, :clientModel, :clientDescription,:clientYear, :clientMiles, :clientPrice, :clientColor)';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':clientClassification', $clientClassification, PDO::PARAM_INT);
    $stmt->bindValue(':clientMake', $clientMake, PDO::PARAM_STR);
    $stmt->bindValue(':clientModel', $clientModel, PDO::PARAM_STR);
    $stmt->bindValue(':clientDescription', $clientDescription, PDO::PARAM_STR);
    $stmt->bindValue(':clientYear', $clientYear, PDO::PARAM_STR);
    $stmt->bindValue(':clientMiles', $clientMiles, PDO::PARAM_STR);
    $stmt->bindValue(':clientPrice', $clientPrice, PDO::PARAM_INT);
    $stmt->bindValue(':clientColor', $clientColor, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}


// Get vehicles by classificationId 
function getInventoryByClassification($classificationId)
{
    $db = phpmotorsConnect();
    $sql = ' SELECT * FROM inventory WHERE classificationId = :classificationId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT);
    $stmt->execute();
    $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $inventory;
}


// Get vehicle information by invId
function getInvItemInfo($invId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_STR);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}


function updateVehicle($clientClassification, $clientMake, $clientModel, $clientDescription, $clientYear, $clientMiles, $clientPrice, $clientColor, $invId)
{
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'UPDATE inventory 
    SET 
    invMake = :clientMake, 
    invModel = :clientModel, 
    invDescription = :clientDescription, 
    invYear = :clientYear,
    invMiles = :clientMiles,
    invPrice = :clientPrice, 
    invColor = :clientColor, 
    classificationId = :clientClassification
    WHERE invId = :invId';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':clientClassification', $clientClassification, PDO::PARAM_INT);
    $stmt->bindValue(':clientMake', $clientMake, PDO::PARAM_STR);
    $stmt->bindValue(':clientModel', $clientModel, PDO::PARAM_STR);
    $stmt->bindValue(':clientDescription', $clientDescription, PDO::PARAM_STR);
    $stmt->bindValue(':clientYear', $clientYear, PDO::PARAM_STR);
    $stmt->bindValue(':clientMiles', $clientMiles, PDO::PARAM_STR);
    $stmt->bindValue(':clientPrice', $clientPrice, PDO::PARAM_INT);
    $stmt->bindValue(':clientColor', $clientColor, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}


function deleteVehicle($invId)
{
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function getVehiclesByClassification($classificationId)
{
    $db = phpmotorsConnect();
    $sql = "SELECT 
        inv.invId, 
        inv.invYear,
        inv.invMake, 
        inv.invModel, 
        inv.invDescription,
        inv.invPrice, 
        inv.invMiles, 
        inv.invColor, 
        inv.classificationId, 
        (SELECT img.imgPath 
            FROM images img 
            WHERE inv.invId = img.invId LIMIT 1) 
        invImage, 
        (SELECT img.imgPath 
            FROM images img 
            WHERE inv.invId = img.invId AND img.imgPath LIKE '%-tn%' LIMIT 1)
        invThumbnail
        FROM inventory inv 
        WHERE inv.classificationId = :classificationId";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_STR);
    $stmt->execute();
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicles;
}

// Get vehicle information
function getVehicleInfo($invId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT 
        inv.invYear,
        inv.invMake, 
        inv.invModel, 
        inv.invDescription,
        inv.invPrice, 
        inv.invMiles, 
        inv.invColor, 
        (SELECT img.imgPath 
            FROM images img 
            WHERE inv.invId = img.invId LIMIT 1) 
            invImage, 
        (SELECT img.imgPath 
            FROM images img 
            WHERE inv.invId = img.invId AND img.imgPath LIKE "%-tn%")
        invThumbnail 
        FROM inventory inv 
        WHERE inv.invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_STR);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}
// Get information for all vehicles
function getVehicles()
{
    $db = phpmotorsConnect();
    $sql = 'SELECT invId, invMake, invModel FROM inventory';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $invInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}
