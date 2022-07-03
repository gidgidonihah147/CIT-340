<!DOCTYPE html>
<html lang="en">

<Head>
    <title>Registration | PHP Motors</title>
    <meta name="description" content="Registration page for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/phpmotors/css/styles.css">
    <link rel="stylesheet" href="/phpmotors/css/register.css">
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
        <h1>Registration:</h1>
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
        <form method="POST" action="/phpmotors/accounts/index.php">
            <div class="register">
                <div class="clientFirstName">
                    <label for="clientFirstName">First Name:</label><br>
                    <input type="text" id="clientFirstname" name="clientFirstname" placeholder="John" required <?php if(isset($clientFirstname)){echo "Value='$clientFirstname'";}?>> <br>
                </div>
                <div class="clientLastName">
                    <label for="clientLastName">Last Name:</label> <br>
                    <input type="text" id="clientLastname" name="clientLastname" placeholder="Doe" required <?php if(isset($clientLastname)){echo "Value='$clientLastname'";}?>>
                </div>
                <div class="clientEmail">
                    <label for="clientEmail">Email Address:</label> <br>
                    <input type="email" id="clientEmail" name="clientEmail" placeholder="email@url.com" required <?php if(isset($clientEmail)){echo "Value='$clientEmail'";}?>>
                </div>
                <div class="clientPassword">
                    <label for="clientPassword">Password:</label> <br>
                    <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <p>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p>
                </div>
                <input type="submit" name="submit" id="regbtn" value="Register">
                <input type="hidden" name="action" value="register">
            </div>
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