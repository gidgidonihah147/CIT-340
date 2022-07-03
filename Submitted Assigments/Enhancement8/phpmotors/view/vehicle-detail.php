<!DOCTYPE html>
<html lang="en">

<Head>
    <title><?php echo "$vehiclesDetail[invMake] $vehiclesDetail[invModel]"; ?> | PHP Motors</title>
    <meta name="description" content="An inventory php page for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/phpmotors/css/styles.css">
    <link rel="stylesheet" href="/phpmotors/css/vehicleDetails.css">
</Head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        <nav>
            <?php print $navList; ?>
        </nav>
    </header>
    <main>
        <?php 
        echo $vehicleImport;
        ?>
    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>

</body>

</html>