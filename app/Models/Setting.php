<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table ='settings';

    protected $fillable = [
        'website_name',
        'logo',
        'favicon',
        'desp',
        'meta_title',
        'meta_keyword',
        'meta_desp'
    ];

    public function posts(){
        return $this->hasMany(Post::class, 'category_id','id');
    }


}
