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

function submitVehicle($clientClassification, $clientMake, $clientModel, $clientDescription, $clientImagePath, $clientThumbnailPath, $clientPrice, $clientColor, $clientStock)
{
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO inventory (classificationId,invMake,invModel,invDescription,invImage,invThumbnail,invPrice,invColor,invStock)
     VALUES (:clientClassification,:clientMake, :clientModel, :clientDescription,:clientImagePath, :clientThumbnailPath, :clientPrice, :clientColor, :clientStock)';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':clientClassification', $clientClassification, PDO::PARAM_INT);
    $stmt->bindValue(':clientMake', $clientMake, PDO::PARAM_STR);
    $stmt->bindValue(':clientModel', $clientModel, PDO::PARAM_STR);
    $stmt->bindValue(':clientDescription', $clientDescription, PDO::PARAM_STR);
    $stmt->bindValue(':clientImagePath', $clientImagePath, PDO::PARAM_STR);
    $stmt->bindValue(':clientThumbnailPath', $clientThumbnailPath, PDO::PARAM_STR);
    $stmt->bindValue(':clientPrice', $clientPrice, PDO::PARAM_INT);
    $stmt->bindValue(':clientColor', $clientColor, PDO::PARAM_STR);
    $stmt->bindValue(':clientStock', $clientStock, PDO::PARAM_INT);
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
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}


function updateVehicle($clientClassification, $clientMake, $clientModel, $clientDescription, $clientImagePath, $clientThumbnailPath, $clientPrice, $clientColor, $clientStock, $invId)
{
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'UPDATE inventory 
    SET 
    invMake = :clientMake, 
    invModel = :clientModel, 
    invDescription = :clientDescription, 
    invImage = :clientImagePath,
    invThumbnail = :clientThumbnailPath,
    invPrice = :clientPrice, 
    invColor = :clientColor, 
    invStock = :clientStock, 
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
    $stmt->bindValue(':clientImagePath', $clientImagePath, PDO::PARAM_STR);
    $stmt->bindValue(':clientThumbnailPath', $clientThumbnailPath, PDO::PARAM_STR);
    $stmt->bindValue(':clientPrice', $clientPrice, PDO::PARAM_INT);
    $stmt->bindValue(':clientColor', $clientColor, PDO::PARAM_STR);
    $stmt->bindValue(':clientStock', $clientStock, PDO::PARAM_INT);
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
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function getVehiclesByClassification($classificationName)
{
    $db = phpmotorsConnect();
    // $sql = 'SELECT * FROM inventory WHERE classificationId IN (SELECT classificationId FROM carclassification WHERE classificationName = :classificationName)';
    $sql = "SELECT inv.invId, inv.invMake, inv.invModel, inv.invDescription, inv.invPrice, inv.invStock, inv.invColor, inv.classificationId, (SELECT img.imgPath FROM images img WHERE inv.invId = img.invId AND img.imgPrimary = 1 LIMIT 1) invImage, (SELECT img.imgPath FROM images img WHERE inv.invId = img.invId AND img.imgPrimary = 1 AND img.imgPath LIKE '%-tn%' LIMIT 1) invThumbnail FROM inventory inv WHERE inv.classificationId IN (SELECT classificationId FROM carclassification WHERE classificationName = :classificationName)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
    $stmt->execute();
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicles;
}

// Get vehicle information
function getVehicleInfo($invId)
{
    $db = phpmotorsConnect();
    // $sql = 'SELECT invMake, invModel, invDescription, invPrice, invStock, invColor, invImage FROM inventory WHERE invId = :invId';
    $sql = 'SELECT inv.invMake, inv.invModel, inv.invDescription, inv.invPrice, inv.invStock, inv.invColor, (SELECT img.imgPath FROM images img WHERE inv.invId = img.invId AND img.imgPrimary = 1 LIMIT 1) invImage FROM inventory inv WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
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
