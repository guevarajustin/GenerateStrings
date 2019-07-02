<?php

define(
	'CHARACTERS',
	[
		'alphanumeric' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
		'ascii' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ`-=[];/,.|~!@#$%^&*()_+{}|:"<>?\'\\',
		
	]
);

function generateString (string $characters, int $length = 32) : String
{

    $string_length = strlen($characters);
    $output_string = '';
    for ($i = 0; $i < $length; $i++) {
        $output_string .= $characters[rand(0, $string_length - 1)];
    }
	return $output_string;
	
}




$model = [];

$model['alphanumerics'] = [];
for ($i = 0; $i < 10; $i++) 
{
	$model['alphanumerics'][] = generateString(CHARACTERS['alphanumeric'], 32);
}

$model['asciis'] = [];
for ($i = 0; $i < 10; $i++) 
{
	$model['asciis'][] = generateString(CHARACTERS['ascii'], 32);
}

$model['unix_timestamp'] = time();




echo <<<EOT
	<!doctype html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title></title>
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
			<style>
				html {
					overflow-y: scroll;
					box-sizing: border-box;
				}
				body {
					margin: 0;
				}
				*,
				*:before,
				*:after {
					box-sizing: inherit;
				}
				@media only screen and (min-width: 1200px) {
					.content-width {
						width: 1200px;	
					}
				}
				@media only screen and (max-width: 1199px) {
					.content-width {
						width: 100%;	
					}
				}
				.center-block-element {
					margin-left: auto;
					margin-right: auto;
				}
				h3 {
					margin: 0;
					padding-bottom: 8px;
					padding-top: 24px;
				}
				div {
					white-space: nowrap; 
					overflow: hidden;
					text-overflow: ellipsis;
				}
			</style>
		</head>
		<body>
EOT;

echo <<<EOT
	<div class="content-width center-block-element" style="padding:8px;">
EOT;

echo <<<EOT
	<h3>alphanumeric 32 char</h3>
EOT;

foreach ($model['alphanumerics'] as $alphanumeric_string)
{
	
	echo $alphanumeric_string;
	echo '<br/>';
	
}

echo <<<EOT
	<h3>ascii 32 char</h3>
EOT;

foreach ($model['asciis'] as $ascii_string)
{
	
	echo htmlentities($ascii_string);
	echo '<br/>';
	
}

echo <<<EOT
	<h3>unix timestamp</h3>
EOT;

echo $model['unix_timestamp'];

echo <<<EOT
	</div>
EOT;

echo <<<EOT
		</body>
	</html>
EOT;
