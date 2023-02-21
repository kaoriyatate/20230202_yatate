<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;



class Todo extends Model
{
    use HasFactory;



    protected $fillable = [
        'content',
        'tag_id',
        'user_id',
        'created_at',
        'updated_at'
    ];

    



    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function isSelectedTag($tag_id,$request)
    {
        if(!$tag_id === $request->tag_id){
        return $this->selected;

        }

        else{
        return $this->null;
        }
    }

    protected static function booted()
    {
        static::addGlobalScope('user_id', function (Builder $builder) {

            $user_id = auth()->id();
            $builder->where('user_id', $user_id);
        });
    }
}
