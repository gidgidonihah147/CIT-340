<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
  header('location: /phpmotors/');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<Head>
  <title><?php if (isset($invInfo['invMake'])) {
            echo "Delete $invInfo[invMake] $invInfo[invModel]";
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
    <h1><?php if (isset($invInfo['invMake'])) {
          echo "Delete $invInfo[invMake] $invInfo[invModel]";
        } ?></h1>
    <?php
    if (isset($message)) {
      echo $message;
    }
    ?>
    <p>***Confirm Vehicle Deletion. The delete is permanent.***</p>
    <form method="post" action="/phpmotors/vehicles/index.php">
      <div class="register">
        <?php echo $classList; ?>
        <div class="clientMake">
          <label for="clientMake">Make:</label><br>
          <input type="text" name="clientMake" id="clientMake" required <?php if (isset($invInfo['invMake'])) {
                                                                          echo "value='$invInfo[invMake]'";
                                                                        } ?>>
          <br>
        </div>
        <div class="clientModel">
          <label for="clientModel">Model:</label><br>
          <input type="text" id="clientModel" name="clientModel" placeholder="Civic" required <?php if (isset($invInfo['invModel'])) {
                                                                                                echo "value='$invInfo[invModel]'";
                                                                                              }
                                                                                              ?>> <br>
          <div class="clientDescription">
            <label for="clientDescription">Description:</label><br>
            <input type="text" name="clientDescription" id="clientDescription" required <?php if (isset($invInfo['invDescription'])) {
                                                                                          echo "value='$invInfo[invDescription]'";
                                                                                        } ?>>
            <br>
          </div>
          <br>
          <input type="submit" name="submit" value="Delete Vehicle">
          <input type="hidden" name="action" value="deleteVehicle">
          <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                      echo $invInfo['invId'];
                                                    } ?>">
          <br>
    </form>
  </main>
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
  </footer>

</body>

</html>