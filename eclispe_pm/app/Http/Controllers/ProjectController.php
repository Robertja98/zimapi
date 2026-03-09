<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Support\Response;
use App\Infrastructure\Persistence\Repositories\ProjectRepository;

final class ProjectController
{
	public function __construct(private ProjectRepository $projects) {}

	public function index(): void
	{
		Response::json([
			'ok' => true,
			'data' => $this->projects->listProjects(),
		]);
	}
}
