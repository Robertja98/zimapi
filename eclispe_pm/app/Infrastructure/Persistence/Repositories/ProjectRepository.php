<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Repositories;

interface ProjectRepository
{
	/** @return array<int, array<string, mixed>> */
	public function listProjects(): array;
}
