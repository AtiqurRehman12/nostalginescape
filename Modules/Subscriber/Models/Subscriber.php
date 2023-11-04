<?php

namespace Modules\Subscriber\Models;
use Illuminate\Notifications\Notifiable;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;


    protected $table = 'subscribers';

    public function routeNotificationForMail()
{
    return $this->email;
}

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Subscriber\database\factories\SubscriberFactory::new();
    }
}
