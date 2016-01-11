<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
