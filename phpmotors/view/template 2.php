<!DOCTYPE html>
<html lang="en">

<Head>
    <title>Template | PHP Motors</title>
    <meta name="description" content="A template php page for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/phpmotors/css/styles.css">
    <link rel="stylesheet" href="/phpmotors/css/template.css">
</Head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        <nav>
            <?php print $navList; ?>
        </nav>
    </header>
    <main>
        <h1>Future Header HERE</h1>
    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>

</body>

</html>