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
            <a href="/phpmotors/accounts/index.php">My Account</a>
        </div>
        <nav>
            <?php print $navList; ?>
        </nav>
    </header>
    <main>
    <h1>Registration:</h1>
        <form>
            <div class="register">
                <div class="clientFirstName">
                    <label for="clientFirstName">First Name:</label><br>
                    <input type="text" id="clientFirstName" name="clientFirstName" placeholder="John"> <br>
                </div>
                <div class="clientLastName">
                    <label for="clientLastName">Last Name:</label> <br>
                    <input type="text" id="clientLastName" name="clientLastName" placeholder="Doe">
                </div>
                <div class="clientEmail">
                    <label for="clientEmail">Email Address:</label> <br>
                    <input type="text" id="clientEmail" name="clientEmail" placeholder="email@url.com">
                </div>
                <div class="clientPassword">
                    <label for="clientPassword">Password:</label> <br>
                    <input type="password" id="clientPassword" name="clientPassword" placeholder="password">
                </div>
                <button>Submit</button>
                <button>Clear</button>
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