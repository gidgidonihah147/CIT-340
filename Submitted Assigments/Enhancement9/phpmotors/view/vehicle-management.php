<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
}
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }
?>
<!DOCTYPE html>
<html lang="en">

<Head>
    <title>Vehicle Management | PHP Motors</title>
    <meta name="description" content="A place to manage vehicles for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/phpmotors/css/styles.css">
    <link rel="stylesheet" href="/phpmotors/css/template.css">
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
        <h1>Vehicle Management</h1>
        <form action="/phpmotors/vehicles/?action=class" method="post">
            <button type="submit">Add Classification</button>
            <button type="submit" formaction="/phpmotors/vehicles/?action=vehicle">Add Vehicle</button>
        </form>
        <?php
        if (isset($message)) {
            echo $message;
        }
        if (isset($classificationList)) {
            echo '<h2>Vehicles By Classification</h2>';
            echo '<p>Choose a classification to see those vehicles</p>';
            echo $classificationList;
        }
        ?>
        <br>
        <noscript>
            <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
        </noscript>
        <table id="inventoryDisplay" class="classification"></table>
    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>
    <script src="../js/inventory.js"></script>
</body>

</html><?php unset($_SESSION['message']); ?>