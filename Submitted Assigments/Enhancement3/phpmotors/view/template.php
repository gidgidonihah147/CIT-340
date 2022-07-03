<!DOCTYPE html>
<html lang="en">

<Head>
    <title>Template | PHP Motors</title>
    <meta name="description" content="A template php page for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/login.css">
</Head>

<body>
    <header>
        <div id="Logo">
            <a href="phpmotors/index.php"><img src="../images/site/logo.png" alt="PHP Motors Logo"></a>
        </div>
        <div id="myAccount">
            <a href="phpmotors/accounts/index.php">My Account</a>
        </div>
        <nav>
           <!--  <ul>
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="">Classic</a>
                </li>
                <li>
                    <a href="">Sports</a>
                </li>
                <li>
                    <a href="">SUV</a>
                </li>
                <li>
                    <a href="">Trucks</a>
                </li>
                <li>
                    <a href="">Used</a>
                </li>
            </ul>  -->
            <?php print $navList; ?>
        </nav>
    </header>
    <main>
        <h1>Content Title Goes Here</h1>
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