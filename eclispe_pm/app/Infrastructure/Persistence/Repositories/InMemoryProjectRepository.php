<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Repositories;

final class InMemoryProjectRepository implements ProjectRepository
{
    public function listProjects(): array
    {
        return [
            ['id' => 'p1', 'name' => 'Demo Project', 'status' => 'active'],
            ['id' => 'p2', 'name' => 'Internal Tools', 'status' => 'planning'],
        ];
    }
}
