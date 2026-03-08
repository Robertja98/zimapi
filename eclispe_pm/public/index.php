<?php
declare(strict_types=1);

session_start();

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

if ($path === '/' || $path === '/health') {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'ok' => true,
        'message' => 'eclispe_pm is running',
        'date_utc' => gmdate('c'),
        'php_session_id' => session_id(),
    ], JSON_PRETTY_PRINT);
    exit;
}

http_response_code(404);
header('Content-Type: application/json; charset=utf-8');
echo json_encode(['ok' => false, 'error' => 'Not Found', 'path' => $path], JSON_PRETTY_PRINT);