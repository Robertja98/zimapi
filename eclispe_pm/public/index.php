<?php
declare(strict_types=1);

use App\Support\Response;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\ProjectController;
use App\Infrastructure\Persistence\Repositories\InMemoryProjectRepository;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($method === 'GET' && ($path === '/' || $path === '/health')) {
    (new HealthController())->handle();
    exit;
}

if ($method === 'GET' && $path === '/api/projects') {
    $repo = new InMemoryProjectRepository();
    (new ProjectController($repo))->index();
    exit;
}

Response::json([
    'ok' => false,
    'error' => 'Not Found',
    'path' => $path,
], 404);