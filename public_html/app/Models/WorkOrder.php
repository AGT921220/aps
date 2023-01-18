<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    public const STATUS_CREATED = 'created';
    public const STATUS_FINISHED = 'finished';
}
