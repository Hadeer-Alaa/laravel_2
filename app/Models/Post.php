<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory,Sluggable;
    protected $fillable = [
        
        'title',
        'slug',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //doesnot follow convention
    // public function testRelation()
    // {
    //     return $this->belongsTo(User::class,'post_creator');
    // }


   

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
       
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
