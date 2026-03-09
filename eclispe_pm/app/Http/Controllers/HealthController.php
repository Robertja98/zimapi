<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Support\Response;

final class HealthController
{
    public function handle(): void
    {
        Response::json([
            'ok' => true,
            'service' => 'eclispe_pm',
            'date_utc' => gmdate('c'),
        ]);
    }
}
