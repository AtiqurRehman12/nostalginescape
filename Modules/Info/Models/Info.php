<?php

namespace Modules\Info\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Info extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'infos';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Info\database\factories\InfoFactory::new();
    }
}
