<?php
if (!$_SESSION['loggedin']) {
    header('Location: /index.php/');
}
?>
<!DOCTYPE html>
<html lang="en-US">

<Head>
    <title>Account Admin | PHP Motors</title>
    <meta name="description" content="An admin php page for PHP Motors website">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/phpmotors/css/styles.css">
    <link rel="stylesheet" href="/phpmotors/css/template.css">
    <link rel="stylesheet" href="/phpmotors/css/client-update.css">
</Head>

<body>
    <div class="page">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
            <nav>
                <?php print $navList; ?>
            </nav>
        </header>
        <main>
            <h1>Update Account Information</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <div class="userInfo">
                <h2>Update Account Info</h2>
                <form action="/phpmotors/accounts/index.php" method="POST">
                    <label>First Name</label><br>
                    <input type="text" name="firstName" id="firstName" <?php if (isset($firstName)) {
                                                                            echo "value='$firstName'";
                                                                        } elseif (isset($_SESSION['clientData']['clientFirstname'])) {
                                                                            echo "value='" . $_SESSION['clientData']['clientFirstname'] . "'";
                                                                        } ?> required><br>
                    <label>Last Name</label><br>

                    <input type="text" name="lastName" id="lastName" <?php if (isset($lastName)) {
                                                                            echo "value='$lastName'";
                                                                        } elseif (isset($_SESSION['clientData']['clientLastname'])) {
                                                                            echo "value='" . $_SESSION['clientData']['clientLastname'] . "'";
                                                                        } ?> required><br>

                    <label>Email</label><br>

                    <input type="text" name="newEmail" id="newEmail" <?php if (isset($newEmail)) {
                                                                            echo "value='$newEmail'";
                                                                        } elseif (isset($_SESSION['clientData']['clientEmail'])) {
                                                                            echo "value='" . $_SESSION['clientData']['clientEmail'] . "'";
                                                                        } ?> required><br>

                    <input type="submit" name="submit" value="Update Information">
                    <input type="hidden" name="action" value="updateUser">
                    <input type="hidden" name="clientId" <?php if (isset($_SESSION['clientData']['clientId'])) {
                                                                echo "value='" . $_SESSION['clientData']['clientId'] . "'";
                                                            } ?>>
                </form>
            </div>
            <br>
            <div class="userPw">
                <h2>Update Password</h2>
                <p>
                    Passwords must be at least 8 characters and contain at least 1
                    number, 1 capital letter, and 1 special character.
                </p>
                <form action="/phpmotors/accounts/index.php" method="POST">
                    <label>New Password</label><br>
                    <input name="newPassword" id="newPassword" type="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
                    <input type="submit" name="submit" value="Update Password">
                    <input type="hidden" name="action" value="updatePassword">
                    <input type="hidden" name="invId" <?php if (isset($_SESSION['clientData']['clientId'])) {
                                                            echo "value='" . $_SESSION['clientData']['clientId'] . "'";
                                                        } ?>>
                </form>
            </div>
            <br>
        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>