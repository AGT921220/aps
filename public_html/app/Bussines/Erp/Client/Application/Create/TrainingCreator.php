<?php

declare(strict_types=1);

namespace App\Business\Shared\Training\Application\Create;

use App\Business\Shared\Training\Domain\Training;
use App\Business\Shared\Training\Domain\TrainingBrand;
use App\Business\Shared\Training\Domain\TrainingDate;
use App\Business\Shared\Training\Domain\TrainingPublish;
use App\Business\Shared\Training\Domain\TrainingRepository;

class TrainingCreator
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

    public function __invoke(
        string $name,
        string $trainer,
        string $startDate,
        string $startTime,
        string $description,
        int $brandId,
        ?string $registrationUrl = null
    ) {
        $date = new TrainingDate($startDate, $startTime);
        $brand = new TrainingBrand($brandId);
        $publish = new TrainingPublish();

        $training = new Training('', $name, $trainer, $date, $description, $brand, $publish, $registrationUrl);

        $id = $this->repository->create($training);

        $persistedTraining = Training::create(
            $id,
            $name,
            $trainer,
            $date,
            $description,
            $brand,
            $publish,
            $registrationUrl
        );

        return $persistedTraining->toArray();
    }
}
