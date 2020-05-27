<?php

$name = $_POST['name'];

if (!preg_match('/^(?:(?:[A-Za-z]+|[A-Za-z]{1,3}\.|(?:[A-Z]\.)+[A-Z]?)[ -]?){1,3}(?: (?:[A-Z]\.)+[A-Z]?)?$/', $name)) {
	echo ('Error. That is a made-up name. What is your real name?');
	die();
}

if (strlen($name) > 25) {
	echo ('Error: Your name is too long.');
	die();
}

# Verify captcha
$post_data = http_build_query(
	array(
		'secret' => file_get_contents('captcha-secret-key.txt'),
		'response' => $_POST['g-recaptcha-response'],
		'remoteip' => $_SERVER['REMOTE_ADDR']
	)
);
$opts = array(
	'http' =>
	array(
		'method'  => 'POST',
		'header'  => 'Content-type: application/x-www-form-urlencoded',
		'content' => $post_data
	)
);
$context  = stream_context_create($opts);
$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
$result = json_decode($response);
if (!$result->success) {
	echo ('Error: Failed captcha.');
	die();
}

$prepend = "$name\n";
$file = 'names.dat';
$fileContents = file_get_contents($file);
file_put_contents($file, $prepend . $fileContents);

echo ('Success');
die();
