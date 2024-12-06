<?php

namespace App\Models;

use App\Services\AddTemplateService;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $created_at
 * @property int    $updated_at
 * @property string $description
 * @property string $status
 * @property string $title
 * @property string $url
 */
class Adds extends Model
{
    public bool $createTemplate;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'adds';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_at', 'description', 'status', 'title', 'updated_at', 'url'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'timestamp', 'description' => 'string', 'status' => 'string', 'title' => 'string', 'updated_at' => 'timestamp', 'url' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;
}
