<?php

declare(strict_types=1);

namespace App\Business\Shared\Training\Application\Find;

use App\Business\Shared\Training\Domain\Training;
use App\Business\Shared\Training\Domain\TrainingRepository;

final class TrainingFinder
{
    /**
     *
     * @var App\Business\Shared\Training\Domain\TrainingRepository
     */
    private $repository;

    public function __construct(TrainingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $trainingId): Training
    {
        return $this->repository->find($trainingId);
    }
}
