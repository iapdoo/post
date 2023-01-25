<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title',
        'author',
        'content',
        'image',
    ];
    public function comment(){
        return $this->hasMany(Comment::class,'post_id');
    }

    public function getImageForWebAttribute()
    {
        $width = 100; // You can keep this info in app config
        $height = 100;

        // Here i am assuming `image` is where you store Cloudinary url
        return str_replace("/upload", "/upload/w_".$width.",h_".$height.",c_fit", $this->image);
    }
    public function user(){
        return $this->belongsTo(User::class,'author');
    }
}
