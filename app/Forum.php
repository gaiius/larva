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

    public function threads()
    {
        return $this->hasMany(Thread::class, 'forum');
    }

    /**
     * Creates the relation for getting the thread count.
     *
     * @link http://softonsofa.com/tweaking-eloquent-relations-how-to-get-hasmany-relation-count-efficiently/
     *
     * @return mixed
     */
    public function threadsCount()
    {
        return $this->threads()
            ->selectRaw('forum, count(forum) as count')
            ->groupBy('forum');
    }

    /**
     * Returns the number of threads attribute.
     *
     * @return int|mixed
     */
    public function getThreadsCountAttribute()
    {
        if (!$this->relationLoaded('threadsCount'))
        {
            $this->load('threadsCount');
        }

        $relation = $this->getRelation('threadsCount');

        return $relation ? $relation : 0;
    }
}
