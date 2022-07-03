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
        <form>
            <div class="login">
                <div class="clientUsername">
                    <label for="clientUsername">Username:</label><br>
                    <input type="text" id="clientUsername" name="clientUsername" placeholder="email@url.com"> <br>
                </div>
                <div class="clientPassword">
                    <label for="clientPassword">Password:</label> <br>
                    <input type="password" id="clientPassword" name="clientPassword" placeholder="password">
                </div>
                <div>
                    <br>
                    <button>Login</button>
                </div>
                <div class="register">
                    <p>Not registered? <a href="index.php/?action=register">Register now</a></p>
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