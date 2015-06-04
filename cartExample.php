<?php

require(__DIR__."/autoload.php");
require(__DIR__."/config.php");

use SouqAPI\SouqAPIConnection;
use SouqAPI\AccessToken;

$connection= new SouqAPIConnection(CLIENT_ID,CLIENT_SECRET);

// Set the token to connection, so $connection will pass access_token and customer_id in every api call
$tokenInfo['access_token']=OAUTH_ACCESS_TOKEN;
$tokenInfo['customer_id']=OAUTH_CUSTOMER_ID;

$souqToken=new AccessToken($tokenInfo,OAUTH_SCOPES);

$connection->setAccessToken($souqToken);

// Change Default Language and country params
$connection->setDefaultCountry('sa');
$connection->setDefaultLanguage('en');

//Main call
$result=$connection->get('carts');


//Response View
echo('<strong>Response:</strong><pre>');

echo '<br>';
echo ' <b>Status : </b> ';
print_r($result->getStatus());


echo '<br>';
echo ' <b>Message : </b> ';
print_r($result->getMessage());


echo '<br>';
echo ' <b>Data : </b> ';
print_r($result->getData());

