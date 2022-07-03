<?php

function header(){
    echo '
    <div id="Logo">
    <a href="/phpmotors/index.php"><img src="/phpmotors/images/site/logo.png" alt="PHP Motors Logo"></a>
</div>
<div id="myAccount">
    if (isset($cookiefirstname)) {
        <span>Welcome $cookiefirstname - </span>;
    } 
    if($_SESSION["loggedin"]= TRUE) {
     <a href="/phpmotors/accounts/index.php?action=Login">My Account</a>
    }
</div>
<nav>
    <?php print $navList; ?>
</nav>
    ';
}