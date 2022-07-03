<!DOCTYPE html>
<html lang="en">

<Head>
    <title><?php echo $classificationName; ?> | PHP Motors</title>
    <meta name="description" content="An inventory php page for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/phpmotors/css/styles.css">
    <link rel="stylesheet" href="/phpmotors/css/template.css">
    <link rel="stylesheet" href="/phpmotors/css/class.css">
</Head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        <nav>
            <?php print $navList; ?>
        </nav>
    </header>
    <main>
    <h1><?php echo $classificationName; ?> vehicles</h1>
            <?php if(isset($message)){
                    echo $message; }
            ?>
            <?php if(isset($vehicleDisplay)){
                    echo $vehicleDisplay; } 
            ?>
    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>

</body>

</html>