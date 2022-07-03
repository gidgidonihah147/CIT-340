<?php
$classList = '<label for="clientClassification">Car Classification:</label><br>';
$classList .= '<select name= "classificationId">';
foreach ($classifications as $classification) {
  $classList .= "<option value='$classification[classificationId]'";
  if (isset($classificationId)) {
    if ($classification['classificationId'] == $classificationId) {
      $classList .= '  selected  ';
    }
  } elseif (isset($invInfo['classificationId'])) {
    if ($classification['classificationId'] == $invInfo['classificationId']) {
      $classList .= ' selected ';
    }
  }
  $classList .= ">$classification[classificationName]</option>";
}
$classList .= "</select>";
?>
<!DOCTYPE html>
<html lang="en">

<Head>
  <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
            echo "Modify $invInfo[invMake] $invInfo[invModel]";
          } elseif (isset($invMake) && isset($invModel)) {
            echo "Modify $invMake $invModel";
          } ?> | PHP Motors</title>
  <meta name="description" content="Page to add vehicles to the PHP Motors website">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="/phpmotors/css/styles.css">
  <link rel="stylesheet" href="/phpmotors/css/vehicle.css">
</Head>

<body>
  <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
    <nav>
      <?php print $navList; ?>
    </nav>
  </header>
  <main>
    <h1><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
          echo "Modify $invInfo[invMake] $invInfo[invModel]";
        } elseif (isset($invMake) && isset($invModel)) {
          echo "Modify$invMake $invModel";
        } ?></h1>
    <?php
    if (isset($message)) {
      echo $message;
    }
    ?>
    <p>*Note all fields are Required</p>
    <form method="post" action="/phpmotors/vehicles/index.php">
      <div class="register">
        <?php echo $classList; ?>
        <div class="clientMake">
          <label for="clientMake">Make:</label><br>
          <input type="text" name="clientMake" id="clientMake" required <?php if (isset($clientMake)) {
                                                                          echo "value='$clientMake'";
                                                                        } elseif (isset($invInfo['invMake'])) {
                                                                          echo "value='$invInfo[invMake]'";
                                                                        } ?>>
          <br>
        </div>
        <div class="clientModel">
          <label for="clientModel">Model:</label><br>
          <input type="text" id="clientModel" name="clientModel" placeholder="Civic" required <?php if (isset($clientModel)) {
                                                                                                echo "Value='$clientModel'";
                                                                                              } elseif (isset($invInfo['invModel'])) {
                                                                                                echo "value='$invInfo[invModel]'";
                                                                                              }
                                                                                              ?>> <br>
          <div class="clientDescription">
            <label for="clientDescription">Description:</label><br>
            <input type="text" name="clientDescription" id="clientDescription" required <?php if (isset($clientDescription)) {
                                                                                          echo "value='$clientDescription'";
                                                                                        } elseif (isset($invInfo['invDescription'])) {
                                                                                          echo "value='$invInfo[invDescription]'";
                                                                                        } ?>>
            <br>
          </div>
          <div class="clientYear">
            <label for="clientYear">Year:</label><br>
            <input type="text" id="clientYear" name="clientYear" placeholder="2022"" required <?php if (isset($clientYear)) {
                                                                                                                              echo "Value='$clientYear'";
                                                                                                                            } elseif (isset($invInfo['invYear'])) {
                                                                                                                              echo "value='$invInfo[invYear]'";
                                                                                                                            }
                                                                                                                            ?>> <br>
          </div>
          <div class="clientMiles">
            <label for="clientMiles">Miles:</label><br>
            <input type="text" id="clientMiles" name="clientMiles" placeholder="5" required <?php if (isset($clientMiles)) {
                                                                                                                                      echo "Value='$clientMiles'";
                                                                                                                                    } elseif (isset($invInfo['invMiles'])) {
                                                                                                                                      echo "value='$invInfo[invMiles]'";
                                                                                                                                    }
                                                                                                                                    ?>> <br>
          </div>
          <div class="clientPrice">
            <label for="clientPrice">Vehicle Price</label><br>
            <input type="number" id="clientPrice" name="clientPrice" placeholder="1000" required <?php if (isset($clientPrice)) {
                                                                                                    echo "Value='$clientPrice'";
                                                                                                  } elseif (isset($invInfo['invPrice'])) {
                                                                                                    echo "value='$invInfo[invPrice]'";
                                                                                                  }
                                                                                                  ?>> <br>
          </div>
          <div class="clientColor">
            <label for="clientColor">Vehicle Color</label><br>
            <input type="text" id="clientColor" name="clientColor" placeholder="black" required <?php if (isset($clientColor)) {
                                                                                                  echo "Value='$clientColor'";
                                                                                                } elseif (isset($invInfo['invColor'])) {
                                                                                                  echo "value='$invInfo[invColor]'";
                                                                                                }
                                                                                                ?>> <br>
          </div>
        </div>
        <br>
        <input type="submit" name="submit" value="Submit">
        <input type="hidden" name="action" value="updateVehicle">
        <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                  echo $invInfo['invId'];
                } elseif (isset($invId)) {
                    echo $invId;
                } ?>">
        <br>
    </form>
  </main>
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
  </footer>

</body>

</html>