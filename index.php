<?php
require __DIR__ . '/vendor/autoload.php';

use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient(
    '[IDP issuer]', // idp issuer such as 'https://example.com'
    '[Client ID]', // client id such as '7e4ca2fa5d074543cf6a'
    '[Client Secret]'); //client secret such as '2fad960c94a967fb12027c374ead9c4026c49955'

$oidc->providerConfigParam(array(
    'token_endpoint'=>'[Token endpoint UAL]', // such as 'https://example.com/oauth/token'
    'jwks_uri'=>'[JWKS URL]', // such as 'https://example.com/.well-known/jwks.json'
    'response_type'=>'[Response type]', // such as 'code'
));
$oidc->setRedirectURL("http://localhost:8000");
$oidc->addScope(array('openid')); 
$oidc->authenticate();
$sub = $oidc->getVerifiedClaims();

print_r($sub);


?>
