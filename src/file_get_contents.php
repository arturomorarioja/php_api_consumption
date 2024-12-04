<?php

require_once 'config.php';

/**
 * GET request
 */

$data = file_get_contents(BASE_URL . ENDPOINT);

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

$options = [
    'http' => [
        'method'  => 'PATCH',
        'header'  => 'Content-type: application/json; charset=UTF-8',
        'content' => $payload
    ]
];

$context = stream_context_create($options);

$data = file_get_contents(BASE_URL . ENDPOINT, false, $context);

echo '<h2>PATCH request</h2>';
echo '<p>"title" updated to "Updated title"</p>';
echo '<pre>';
var_dump($data);
echo '</pre>';
echo '<p>Response header:</p>';
echo '<pre>';
print_r($http_response_header);
echo '</pre>';

/**
 * Invalid GET request
 */

$data = file_get_contents(BASE_URL . '/invalid');

echo '<h2>GET request with invalid endpoint</h2>';
echo '<pre>';
var_dump($data);
echo '</pre>';
