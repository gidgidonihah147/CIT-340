<!DOCTYPE html>
<html lang="en">

<Head>
    <title>Template | PHP Motors</title>
    <meta name="description" content="A template php page for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/styles.css">
</Head>
<main>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        <nav>
            <?php print $navList; ?>
        </nav>
    </header>

    <body>
        <h1>Server Error</h1>
        <p>Sorry our server seems to be experiencing some technical difficulties. Please check back later.</p>
    </body>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>

</main>

</html>