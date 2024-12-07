<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $canva_url
 * @property string $description
 * @property string $status
 * @property string $title
 * @property int    $add_id
 * @property int    $created_at
 * @property int    $updated_at
 *
 *
 *  === Relationships ===
 * @property-read \App\Models\Adds|null $add
 * /
 */
class AddTemplates extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'add_templates';

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
        'add_id', 'canva_url', 'created_at', 'description', 'status', 'title', 'updated_at'
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
        'canva_url' => 'string', 'created_at' => 'timestamp', 'description' => 'string', 'status' => 'string', 'title' => 'string', 'updated_at' => 'timestamp'
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

    // Scopes...

    // Functions ...

    public function add()
    {
        return $this->belongsTo(Adds::class, 'add_id');
    }
}
