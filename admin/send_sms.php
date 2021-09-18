<?php
require __DIR__ . '/vendor/autoload.php';
 use Twilio\Rest\Client;

function enrolledSms($name){
        // Your Account SID and Auth Token from twilio.com/console
$account_sid = getenv('TWILIO_ACCOUNT_SID');
$auth_token = getenv('TWILIO_AUTH_TOKEN');

// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+16467603049";

$client = new Client($account_sid, $auth_token);
    $client->messages->create(
    // Where to send a text message (your cell phone?)
    '+233553798229',
    array(
        'from' => $twilio_number,
        'body' => 'Congratulations '.$name.', you have been admitted to Kwame Nkrumah University of Science and Technology.
Your letter has been sent to your email.',
    )
);
}

function notifySms($name){
    // Your Account SID and Auth Token from twilio.com/console
    $account_sid = getenv('TWILIO_ACCOUNT_SID');
    $auth_token = getenv('TWILIO_AUTH_TOKEN');
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+16467603049";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
// Where to send a text message (your cell phone?)
'+233553798229',
array(
    'from' => $twilio_number,
    'body' => 'Dear '.$name.', your admission has been received to the Kwame Nkrumah University of Science and Technology. 
We will notify you of admission if you are admitted into our institution',
)
);
}

function sendvoucher($contact,$serial,$pin){
    // Your Account SID and Auth Token from twilio.com/console
$account_sid = getenv('TWILIO_ACCOUNT_SID');
$auth_token = getenv('TWILIO_AUTH_TOKEN');
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+16467603049";

$client = new Client($account_sid, $auth_token);
    $client->messages->create(
    // Where to send a text message (your cell phone?)
    $contact,
    array(
        'from' => $twilio_number,
        'body' => 'Your serial number is '.$serial.' and your pin is '.$pin,
    )
    );

}





