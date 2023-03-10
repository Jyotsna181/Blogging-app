<?php

namespace App\Models;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table ='categories';

    protected $fillable = [
        'name',
        'slug',
        'desp',
        'image',
        'meta_title',
        'meta_desp',
        'meta_keyword',
        'navbar_status',
        'status',
        'created_by'
    ];

    public function posts(){
        return $this->hasMany(Post::class, 'category_id','id');
    }
}
