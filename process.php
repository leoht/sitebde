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

$paypalUrl = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7HSF8NGD94D68';

foreach($form as $key => $value) {
    $paypalUrl .= "&$key=$value";
}

header('Location: '.$paypalUrl);
exit;
