<?php

function redirect_home($query = '')
{
    header('Location: index.php'.$query);
    exit;
}

if (empty($_POST)) {
    redirect_home();
}

$requiredInfos = array('first_name', 'last_name', 'formation', 'option', 'birthdate', 'email', 'zip', 'city', 'address1');
$form = array();

foreach($requiredInfos as $info) {
    if (!array_key_exists($info, $_POST) || '' == $_POST[$info]) {
        redirect_home('?form_error=1');
    }

    $form[$info] = $_POST[$info];
}

$paypalUrl = 'https://www.paypal.com/fr/cgi-bin/webscr?cmd=_flow&SESSION=qau51wjk95Ue22JwV3KW2lSpBJXQhCLt2n3C97xvH1dZBMA-lGmoyF7_Eoa&dispatch=50a222a57771920b6a3d7b606239e4d529b525e0b7e69bf0224adecfb0124e9b61f737ba21b081986471f9b93cfa01e00b63629be0164db1';

foreach($form as $key => $value) {
    $paypalUrl .= "&$key=$value";
}

header('Location: '.$paypalUrl);
exit;