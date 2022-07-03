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
  if (!isset($_SESSION['loggedin'])) {
    echo "<span><a href='/phpmotors/accounts/index.php?action=Login'>My Account</a></span>";
  }
  ?>
</div>