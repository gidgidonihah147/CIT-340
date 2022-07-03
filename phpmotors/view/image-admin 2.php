<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
} ?>
<!DOCTYPE html>
<html lang="en">

<Head>
    <title>Image Admin | PHP Motors</title>
    <meta name="description" content="An image admin php page for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/phpmotors/css/styles.css">
    <link rel="stylesheet" href="/phpmotors/css/template.css">
    <link rel="stylesheet" href="/phpmotors/css/img-admin.css">
</Head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        <nav>
            <?php print $navList; ?>
        </nav>
    </header>
    <main>
        <h1>Image Admin</h1>
        <h2>Add New Vehicle Image</h2>
        <?php
        if (isset($message)) {
            echo $message;
        } ?>

        <form action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
            <label>Vehicle</label>
            <?php echo $prodSelect; ?>
            <fieldset>
                <label>Is this the main image for the vehicle?</label>
                <label for="priYes" class="pImage">Yes</label>
                <input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1">
                <label for="priNo" class="pImage">No</label>
                <input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0">
            </fieldset>
            <label>Upload Image:</label>
            <input type="file" name="file1">
            <br>
            <input type="submit" class="regbtn" value="Upload">
            <input type="hidden" name="action" value="upload">
        </form>
        <h2>Existing Images</h2>
        <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
        <?php
        if (isset($imageDisplay)) {
            echo $imageDisplay;
        } ?>
    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>

</body>

</html>
<?php unset($_SESSION['message']); ?>