<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    use Sluggable;
    use SluggableScopeHelpers;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate'=> true,
            ]
        ];
    }
    protected $fillable = [
        'title', 'body','user_id', 'slug','address', 'category_id', 'duties', 'startingDate', 'endingDate', 'price_type', 'price'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function category(){

        return $this->belongsTo(Category::class);
    }
}
