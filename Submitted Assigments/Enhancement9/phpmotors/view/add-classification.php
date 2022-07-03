<!DOCTYPE html>
<html lang="en">

<Head>
    <title>Classification | PHP Motors</title>
    <meta name="description" content="A place to add classifications to the database for PHP motors">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/phpmotors/css/styles.css">
    <link rel="stylesheet" href="/phpmotors/css/classification.css">
</Head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        <nav>
            <?php print $navList; ?>
        </nav>
    </header>
    <main>
        <h1>Add a vehicle classification</h1>
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
        <form id="register" method="POST" action="/phpmotors/vehicles/index.php">
            <label for="classification">Classification:</label><br>
            <input type="text" id="classification" name="classification" placeholder="Limit - 30 Characters" required maxlength="30"><br>
            <input type="submit" name="submit" id="regbtn" value="Submit">
            <input type="hidden" name="action" value="classification_submit">
        </form>
    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>

</body>

</html>