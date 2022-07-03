<!DOCTYPE html>
<html lang="en">

<Head>
    <title>Vehicle Management | PHP Motors</title>
    <meta name="description" content="A place to manage vehicles for PHP Motors website">
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
        <h1>Vehicle Management</h1>
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
        <form action="/phpmotors/vehicles/?action=classification" method="post">
            <button type="submit">Add Classification</button><br/>
            <button type="submit" formaction="/phpmotors/vehicles/?action=vehicle">Add Vehicle</button>
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

        </div>
    </footer>

</body>

</html>