<!DOCTYPE html>
<html lang="en">

<Head>
    <title>Vehicle Management | PHP Motors</title>
    <meta name="description" content="A template php page for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/phpmotors/css/styles.css">
    <link rel="stylesheet" href="/phpmotors/css/vehicle.css">
</Head>

<body>
    <header>
        <div id="Logo">
            <a href="/phpmotors/index.php"><img src="/phpmotors/images/site/logo.png" alt="PHP Motors Logo"></a>
        </div>
        <div id="myAccount">
            <a href="/phpmotors/accounts/index.php">My Account</a>
        </div>
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
        <p>*Note all fields are Required</p>
        <form method="post" action="/phpmotors/vehicles/index.php">
            <div class = "register">
                    <?php print $classList; ?>
                <div class="clientMake">
                    <label for="clientMake">Make:</label><br>
                    <input type="text" id="clientMake" name="clientMake" placeholder="Honda" required> <br>
                </div>
                <div class="clientModel">
                    <label for="clientModel">Model:</label><br>
                    <input type="text" id="clientModel" name="clientModel" placeholder="Civic" required> <br>
                </div>
                <div class="clientDescription">
                    <label for="clientDescription">Description:</label><br>
                    <textarea id="clientDescription" name="clientDescription" placeholder="Enter a description for the vehicle" required></textarea> <br>
                </div>
                <div class="clientImagePath">
                    <label for="clientImagePath">Image Path:</label><br>
                    <input type="text" id="clientImagePath" name="clientImagePath" value="/phpmotors/images/no-image.png" required> <br>
                </div>
                <div class="clientThumbnailPath">
                    <label for="clientThumbnailPath">Thumbnail Path:</label><br>
                    <input type="text" id="clientThumbnailPath" name="clientThumbnailPath" value="/phpmotors/images/no-image.png" required> <br>
                </div>
                <div class="clientPrice">
                    <label for="clientPrice">Vehicle Price</label><br>
                    <input type="number" id="clientPrice" name="clientPrice" placeholder="1000" required> <br>
                </div>
                <div class="clientColor">
                    <label for="clientColor">Vehicle Color</label><br>
                    <input type="text" id="clientColor" name="clientColor" placeholder="black" required> <br>
                </div>
                <div class="clientStock">
                    <label for="clientStock">Vehicle Stock</label><br>
                    <input type="number" id="clientStock" name="clientStock" placeholder="1" required> <br>
                </div>
            </div>
            <br>
            <input type="submit" name="submit" id="regbtn" value="Submit">
            <input type="hidden" name="action" value="vehicle_submit"><br>
        </form>
    </main>
    <footer>
        <hr>
        <div>
            <p>
                &#169; PHP Motors, All Rights Reserved.
            </p>
            <p>
                All images used are believed to be in "Fair Use". Please notify the author if they are not and they will be removed.
            </p>
            <p>
                Last Updated: 23 April, 2022
            </p>
        </div>
    </footer>

</body>

</html>