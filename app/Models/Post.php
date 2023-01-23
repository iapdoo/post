<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'author',
        'content',
        'image',
    ];
    public function comment(){
        return $this->hasMany(Comment::class,'post_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'author');
    }
}