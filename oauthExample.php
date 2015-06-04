<?php

require(__DIR__."/autoload.php");
require(__DIR__."/config.php");

use SouqAPI\SouqAPIConnection;

$connection= new SouqAPIConnection(CLIENT_ID,CLIENT_SECRET);

if (!isset($_GET["code"]))
{
    $authUrl = $connection->getAuthenticationUrl(REDIRECT_URL, OAUTH_SCOPES);
    header("Location: ".$authUrl);
    die("Redirect");
}else {
    $Token = $connection->getAccessTokenFromServer($_GET["code"],REDIRECT_URL,OAUTH_SCOPES);

    //Token Response View
    echo('<strong>Response:</strong><pre>');
    echo ' <b>access_token : </b> ';
    print_r($Token->getAccessTokenVal());

    echo '<br/>';
    echo '<b> customer_id : </b>';
    print_r($Token->getCustomerId());

    echo '<br/>';
    echo '<b> scopes : </b>';
    print_r(implode(',',$Token->getAuthorizedScopes()));
    echo('</pre>');
}