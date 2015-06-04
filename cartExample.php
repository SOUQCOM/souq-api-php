<?php

require(__DIR__."/autoload.php");
require(__DIR__."/config.php");

use SouqAPI\SouqAPIConnection;
use SouqAPI\AccessToken;

$connection= new SouqAPIConnection(CLIENT_ID,CLIENT_SECRET);

// These two values should be obtained by OAuth services
$oauthAccessToken='';
$oauthCustomerID='';

//Authorized Scopes
$scopes='customer_profile,cart_management,customer_demographics';

// Set the token to connection, so $connection will pass access_token and customer_id in every api call
$tokenInfo['access_token']=$oauthAccessToken;
$tokenInfo['customer_id']=$oauthCustomerID;
$souqToken=new AccessToken($tokenInfo,$scopes);
$connection->setAccessToken($souqToken);

// Change Default Language and Country params
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

