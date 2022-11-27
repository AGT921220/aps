<?php
namespace App\Bussines\Erp\Client\Infrastructure;

use App\Bussines\Erp\Client\Domain\Client as DomainClient;
use App\Bussines\Erp\Client\Domain\ClientRepository;
use App\Bussines\Erp\Client\Domain\ClientResponse;
use App\Models\Client;

class ClientEloquentRepository implements ClientRepository
{

    // public function create(DomainTraining $training): string
    // {
    //     $model = new Training();
    //     $model->name = $training->getName();
    //     $model->description = $training->getDescription();
    //     $model->trainer = $training->getTrainer();
    //     $model->registration_url = $training->getRegistrationUrl();
    //     $model->brand_id = $training->getBrandId();
    //     $model->starts_at = $training->getStartDate() . ' ' . $training->getStartTime();
    //     $model->save();

    //     return $model->id;
    // }

    public function search(): ClientResponse
    {


        $clients = Client::get();

        $domainClients = $clients->map(function ($client) {
            return (new DomainClient(
                $client->name,
                $client->id
            ));
        });

        return new ClientResponse(
            $clients->count(),
            ...$domainClients
        );
    }



//     public function find(int $trainingId): DomainTraining
//     {
//         $training = Training::select(
//             'trainings.*',
//             DB::raw("
//         (CASE
//         WHEN published_at IS NULL THEN '" . self::IS_NOT_PUBLISHED . "'
//         ELSE '" . self::IS_PUBLISHED . "'
//     END) AS status"),
//             DB::raw("
//     (CASE
//     WHEN published_at IS NULL AND registration_url IS NOT NULL and starts_at IS NOT NULL THEN '"
//                 . self::IS_PUBLISHABLE . "'
//     WHEN published_at IS NOT NULL AND registration_url IS NOT NULL THEN '" . self::IS_UNPUBLISHABLE . "'
//     ELSE null
// END) AS publishable")
//         )
//             ->where('id', $trainingId)->first();


//         $date = explode(" ", $training->starts_at);
//         $date = new TrainingDate($date[0], $date[1]);
//         $brand = new TrainingBrand($training->brand_id);
//         $publish = new TrainingPublish($training->publishedAt, $training->publishable, $training->status);


//         return new DomainTraining(
//             $training->id,
//             $training->name,
//             $training->trainer,
//             $date,
//             $training->description,
//             $brand,
//             $publish,
//             $training->registration_url
//         );
//     }

//     public function update(DomainTraining $updatedTraining): array
//     {
//         $training = Training::where('id', $updatedTraining->getId())->firstOrFail();
//         $training->name = $updatedTraining->getName();
//         $training->description = $updatedTraining->getDescription();
//         $training->trainer = $updatedTraining->getTrainer();
//         $training->registration_url = $updatedTraining->getRegistrationUrl();
//         $training->brand_id = $updatedTraining->getBrandId();
//         $training->starts_at = $updatedTraining->getStartDate() . ' ' . $updatedTraining->getStartTime();
//         $training->published_at = $updatedTraining->getPublishedAt();
//         $training->update();

//         return $training->toArray();
//     }
//     public function publish(DomainTraining $updatedTraining): array
//     {
//         $training = Training::where('id', $updatedTraining->getId())->firstOrFail();
//         $training->published_at = $updatedTraining->getPublishedAt();
//         $training->update();

//         return $training->toArray();
//     }
}
