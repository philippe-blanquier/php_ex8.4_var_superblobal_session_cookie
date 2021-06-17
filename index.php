<?php
declare(strict_types = 1);
// $regex = '/^[A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç][A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç\-\s\']*$/';
if (empty($_REQUEST))
{
    $partSide= "Client";
}
else
{
    $partSide= "Server";
    function phpDebug( string $msg = '')
    {
        echo 'phpDebug( '.$msg.' ) --> $_REQUEST<br>';
        echo var_dump($_REQUEST);
        echo 'phpDebug( '.$msg.' ) --> $_COOKIE<br>';
        echo var_dump($_COOKIE);
    }
    function phpGetCookieInfo( string $thisCookieName): string
    {
        if (!empty($_COOKIE[ $thisCookieName ]))
        { 
            $answer= "Cookie '".$thisCookieName."' is present, and its value is '".$_COOKIE[ $thisCookieName ]."'";
        }
        else
        {
            $answer= "Cookie '".$thisCookieName."' is not present";
        }
        return $answer;
    }
    function phpDisplayCookie()
    {
        ?>
        <p>Server:</p>
        <p> - <?= phpGetCookieInfo( 'userName' ) ?></p>
        <p> - <?= phpGetCookieInfo( 'passwordName' ) ?></p>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>PHP ex 8.3 Cookie <?= $partSide ?></title>
        <script type="text/javascript" src="cookieMgr.js"></script>
    </head>
    <body>
        <?php
            /*  Faire un formulaire qui permet de récupérer le login et le mot de passe de l'utilisateur. 
                A la validation du formulaire, stocker les informations dans un cookie.
            */
            if (empty($_REQUEST))
            {
        ?>
        <form action="#" id="myFormId" method="GET" target="_blank" onsubmit="JsSaveDataAsCookies('passwordNameId','userNameId')">
            <label for='userName'>Username: </label>
            <input type= "text" id= 'userNameId' name= 'userName' value= 'nom'>
            <label for='passwordName'>Password:</label>
            <input type= "password" id= 'passwordNameId' name= 'passwordName' value= 'secret'> 
            <input type="submit" value="Validation"  name="cookieTest">
            </form>
        <?php
       }
        else
        {
            // Server Part.
            phpDisplayCookie();
        }
        ?>
     </body>
</html>