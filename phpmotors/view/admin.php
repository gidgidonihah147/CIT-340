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
    <link rel="stylesheet" href="/phpmotors/css/admin.css">
</Head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        <nav>
            <?php print $navList; ?>
        </nav>
    </header>
    <main>
        <h1>Welcome, <?php echo $_SESSION['clientData']['clientFirstname'], " ", $_SESSION['clientData']['clientLastname'] ?> you are now logged in!</h1>

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
        </ul>
        <?php
        if ($_SESSION['clientData']['clientLevel'] > 1) {
            echo "<br>";
            echo "<div class='vehicleMgmt'>";
            echo "<h2>Vehicle Management</h2>";
            echo "<p>Use this link to manage the inventory</p>";
            echo "<a href = '/phpmotors/vehicles/index.php'>Vehicle Management</a>";
            echo "</div>";
        }
        ?>
        <br>
        <div class="acctMgmt">
            <h2>Account Management</h2>
            <p>Use this link to update account information</p>
            <a href="../accounts/index.php/?action=updateInfo">Update Account Information</a>
        </div>


    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>

</body>

</html>