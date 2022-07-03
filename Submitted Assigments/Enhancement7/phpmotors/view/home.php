<!DOCTYPE html>
<html lang="en">

<Head>
    <title>Home | PHP Motors</title>
    <meta name="description" content="Home page for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/home.css">
</Head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        <nav>
            <?php print $navList; ?>
        </nav>
    </header>
    <main>
        <h1>Welcome to PHP Motors!</h1>
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
        <div class="delorean">
            <h2>DMC Delorean</h2>
            <p>
                3 Cup holders <br>
                Superman doors <br>
                Fuzzy dice!<br>
            </p>
            <img class="ownButton" src="images/site/own_today.png" alt="own today button">
        </div>
        <img src="images/delorean.jpg" alt="delorean picture" id="delorean">
        <div class="description">
            <div class="reviews">
                <h3>DMC Delorean Reviews</h3>
                <ul>
                    <li>"So fast its like traveling in time." (4/5)</li>
                    <li>"Coolest ride on the road." (4/5)</li>
                    <li>"I'm feeling Marty Mcfly!" (5/5)</li>
                    <li>"The most futuristic ride of our day." (4.5/5)</li>
                    <li>"80's livin and I love it!" (5/5)</li>
                </ul>
            </div>
            <div class="upgrades">
                <h2>Delorean Upgrades</h2>
                <div class="box1">
                    <div class="box">
                        <img src="images/upgrades/flux-cap.png" alt="flux capaciter">
                    </div>
                    <a href="">Flux Capacitor</a>
                </div>
                <div class="box2">
                    <div class="box">
                        <img src="images/upgrades/flame.jpg" alt="flame upgrade">
                    </div>
                    <a href="">Flame Decals</a>
                </div>
                <div class="box3">
                    <div class="box">
                        <img src="images/upgrades/hub-cap.jpg" alt="hub cap">
                    </div>
                    <a href="">Hub Caps</a>
                </div>
                <div class="box4">
                    <div class="box">
                        <img src="images/upgrades/bumper_sticker.jpg" alt="bumper sticker">
                    </div>
                    <a href="">Bumper Stickers</a>
                </div>

            </div>
        </div>
    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>
</body>

</html>