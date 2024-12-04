<?php

require_once 'config.php';

/**
 * GET request
 */

$ch = curl_init();

// Option 1: individual set options
// curl_setopt($ch, CURLOPT_URL, BASE_URL);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // The response will be returned as a string

// Option 2: all options set in an array
curl_setopt_array($ch, [
    CURLOPT_URL             => BASE_URL . ENDPOINT,
    CURLOPT_RETURNTRANSFER  => true
]);

$data = curl_exec($ch);
curl_close($ch);

echo '<h2>GET request</h2>';
echo '<pre>';
var_dump($data);
echo '</pre>';

/**
 * PATCH request
 */

$payload = json_encode([
    'title' => 'Updated title'
]);

$headers = [
    'Content-type: application/json; charset=UTF-8',
    'Accept-language: en'
];

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL             => BASE_URL . ENDPOINT,
    CURLOPT_RETURNTRANSFER  => true,
    CURLOPT_CUSTOMREQUEST   => 'PATCH',
    CURLOPT_POSTFIELDS      => $payload,
    CURLOPT_HTTPHEADER      => $headers
]);

$data = curl_exec($ch);
// curl_getinfo retrieves response information piece by piece
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo '<h2>PATCH request</h2>';
echo '<p>"title" updated to "Updated title"</p>';
echo '<pre>';
var_dump($data);
echo '</pre>';
echo '<p>HTTP status code</p>';
echo '<pre>';
echo $status_code;
echo '</pre>';

/**
 * PATCH request including the headers in the response body
 */

 $payload = json_encode([
    'title' => 'New updated title'
]);

$headers = [
    'Content-type: application/json; charset=UTF-8',
    'Accept-language: en'
];

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL             => BASE_URL . ENDPOINT,
    CURLOPT_RETURNTRANSFER  => true,
    CURLOPT_CUSTOMREQUEST   => 'PATCH',
    CURLOPT_POSTFIELDS      => $payload,
    CURLOPT_HTTPHEADER      => $headers,
    CURLOPT_HEADER          => true
]);

$data = curl_exec($ch);
curl_close($ch);

echo '<h2>PATCH request including the headers in the response</h2>';
echo '<p>"title" updated to "New updated title"</p>';
echo '<pre>';
var_dump($data);
echo '</pre>';

/**
 * Invalid GET request
 */

 $ch = curl_init();

 curl_setopt_array($ch, [
     CURLOPT_URL             => BASE_URL . '/invalid',
     CURLOPT_RETURNTRANSFER  => true,
     CURLOPT_HEADER          => true
]);
 
 $data = curl_exec($ch);
 curl_close($ch);
 
 echo '<h2>GET request with invalid endpoint</h2>';
 echo '<pre>';
 var_dump($data);
 echo '</pre>'; 