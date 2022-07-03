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
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        <nav>
            <?php print $navList; ?>
        </nav>
    </header>
    <main>
        <h1>Account Login</h1>
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        ?>
        <form action="/phpmotors/accounts/" method="post">
            <div class="login">
                <div class="clientUsername">
                    <label for="clientUsername">Email Address:</label><br>
                    <input type="email" id="clientEmail" name="clientEmail" placeholder="email@url.com" required <?php if (isset($clientUsername)) {
                                                                                                                        echo "Value='$clientUsername'";
                                                                                                                    } ?>> <br>
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
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>

</body>

</html>