<?php

declare(strict_types=1);

namespace App\Business\Shared\Training\Application\Update;

use App\Business\Shared\Training\Domain\Training;
use App\Business\Shared\Training\Domain\TrainingBrand;
use App\Business\Shared\Training\Domain\TrainingDate;
use App\Business\Shared\Training\Domain\TrainingPublish;
use App\Business\Shared\Training\Domain\TrainingRepository;

final class TrainingUpdater
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

    public function __invoke(array $newAttributes, int $trainingId)
    {


        $date = new TrainingDate($newAttributes['start_date'], $newAttributes['start_time']);
        $brand = new TrainingBrand($newAttributes['brand_id']);

        $startAt = implode(' ', [$newAttributes['start_date'],$newAttributes['start_time']]);

        $publish = new TrainingPublish(($startAt) ? true : false);

        $persistedUpdatedTraining = Training::update(
            $trainingId,
            $newAttributes['name'],
            $newAttributes['trainer'],
            $date,
            $newAttributes['description'],
            $brand,
            $publish,
            $newAttributes['registration_url']
        );

        $this->repository->update($persistedUpdatedTraining);
    }
}
