<?php
$classList = '<label for="clientClassification">Car Classification:</label><br>';
$classList .= '<select name= "classificationId">';
foreach ($classifications as $classification) {
  $classList .= "<option value='$classification[classificationId]'";
  if (isset($classificationId)) {
    if ($classification['classificationId'] == $classificationId) {
      $classList .= '  selected  ';
    }
  }
  $classList .= ">$classification[classificationName]</option>";
}
$classList .= "</select>";
?>
<!DOCTYPE html>
<html lang="en">

<Head>
  <title>Vehicle Management | PHP Motors</title>
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
    <h1>Add a vehicle to your inventory</h1>
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
          <input type="text" id="clientMake" name="clientMake" placeholder="Honda" required <?php if (isset($clientMake)) {
                                                                                              echo "Value='$clientMake'";
                                                                                            } ?>> <br>
        </div>
        <div class="clientModel">
          <label for="clientModel">Model:</label><br>
          <input type="text" id="clientModel" name="clientModel" placeholder="Civic" required <?php if (isset($clientModel)) {
                                                                                                echo "Value='$clientModel'";
                                                                                              } ?>> <br>
        </div>
        <div class="clientDescription">
          <label for="clientDescription">Description:</label><br>
          <textarea id="clientDescription" name="clientDescription" placeholder="Enter a description for the vehicle" required <?php if (isset($clientDescription)) {
                                                                                                                                  echo "Value='$clientDescription'";
                                                                                                                                } ?>></textarea> <br>
        </div>
        <div class="clientImagePath">
          <label for="clientImagePath">Image Path:</label><br>
          <input type="text" id="clientImagePath" name="clientImagePath" value="/phpmotors/images/no-image.png" required <?php if (isset($clientImagePath)) {
                                                                                                                            echo "Value='$clientImagePath'";
                                                                                                                          } ?>> <br>
        </div>
        <div class="clientThumbnailPath">
          <label for="clientThumbnailPath">Thumbnail Path:</label><br>
          <input type="text" id="clientThumbnailPath" name="clientThumbnailPath" value="/phpmotors/images/no-image.png" required <?php if (isset($clientThumbnailPath)) {
                                                                                                                                    echo "Value='$clientThumbnailPath'";
                                                                                                                                  } ?>> <br>
        </div>
        <div class="clientPrice">
          <label for="clientPrice">Vehicle Price</label><br>
          <input type="number" id="clientPrice" name="clientPrice" placeholder="1000" required <?php if (isset($clientPrice)) {
                                                                                                  echo "Value='$clientPrice'";
                                                                                                } ?>> <br>
        </div>
        <div class="clientColor">
          <label for="clientColor">Vehicle Color</label><br>
          <input type="text" id="clientColor" name="clientColor" placeholder="black" required <?php if (isset($clientColor)) {
                                                                                                echo "Value='$clientColor'";
                                                                                              } ?>> <br>
        </div>
        <div class="clientStock">
          <label for="clientStock">Vehicle Stock</label><br>
          <input type="number" id="clientStock" name="clientStock" placeholder="1" required <?php if (isset($clientStock)) {
                                                                                              echo "Value='$clientStock'";
                                                                                            } ?>> <br>
        </div>
      </div>
      <br>
      <input type="submit" name="submit" id="addVehiclebtn" value="Submit">
      <input type="hidden" name="action" value="vehicle_submit"><br>
    </form>
  </main>
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
  </footer>

</body>

</html>