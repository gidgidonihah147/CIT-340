<?php
if (!$_SESSION['loggedin']) {
    header('location: /phpmotors/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<Head>
    <title>Account Admin | PHP Motors</title>
    <meta name="description" content="An admin php page for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/phpmotors/css/styles.css">
    <link rel="stylesheet" href="/phpmotors/css/template.css">
</Head>

<body>
    <header>
    <div id="Logo">
            <a href="/phpmotors/index.php"><img src="/phpmotors/images/site/logo.png" alt="PHP Motors Logo"></a>
        </div>
        <div id="myAccount">
            <?php if (isset($_SESSION['loggedin'])) {
                echo "<a href='/phpmotors/accounts/index.php'>";
                echo $_SESSION['clientData']['clientFirstname'];
                echo "</a>";
                echo "<span> | <a href='/phpmotors/accounts/index.php?action=Logout'>Logout</a></span>";
            }
            if(!$_SESSION['loggedin']){
                echo "<span><a href='/phpmotors/accounts/index.php?action=Login'>My Account</a></span>";
            }
            ?>     
        </div>
        <nav>
            <?php print $navList; ?>
        </nav>
    </header>
    <main>
        <h1><?php echo $_SESSION['clientData']['clientFirstname'], " ", $_SESSION['clientData']['clientLastname'] ?></h1>

        <ul>
            <li>
                First Name: <?php echo $_SESSION['clientData']['clientFirstname'] ?>
            </li>
            <li>
                Last Name: <?php echo $_SESSION['clientData']['clientLastname'] ?>
            </li>
            <li>
                Email: <?php echo $_SESSION['clientData']['clientEmail'] ?>
            </li>
            <li>
                Client Level: <?php echo $_SESSION['clientData']['clientLevel'] ?>
            </li>
            <?php
            if ($_SESSION['clientData']['clientLevel'] > 1) {
                echo '<li>
                        <a href="/phpmotors/vehicles/index.php">Vehicle Management</a>
                     </li>';
            }
            ?>
        </ul>
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
        </div>
    </footer>

</body>

</html>