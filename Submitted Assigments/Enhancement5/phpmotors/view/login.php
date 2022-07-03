<!DOCTYPE html>
<html lang="en">

<Head>
    <title>My Account | PHP Motors</title>
    <meta name="description" content="My account page for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/login.css">
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
        <h1>Account Login</h1>
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
        <form action="/phpmotors/accounts/index.php" method="post">
            <div class="login">
                <div class="clientUsername">
                    <label for="clientUsername">Email Address:</label><br>
                    <input type="email" id="clientEmail" name="clientEmail" placeholder="email@url.com" required <?php if(isset($clientUsername)){echo "Value='$clientUsername'";}?>> <br>
                </div>
                <div class="clientPassword">
                    <label for="clientPassword">Password:</label> <br>
                    <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <p>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p>
                </div>
                <div>
                    <br>
                    <input type="submit" name="submit" id="loginbtn" value="Login">
                    <input type="hidden" name="action" value="Login">
                </div>
                <div class="register">
                    <p>Not registered? <a href="index.php/?action=registration">Register now</a></p>
                </div>
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
            <p>
                Last Updated: 23 April, 2022
            </p>
        </div>
    </footer>

</body>

</html>