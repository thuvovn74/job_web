<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';

    public $timestamps = false;

    protected $fillable = [
        'category_name'
    ];

    // 1 category có nhiều job
    public function jobs()
    {
        return $this->hasMany(JobPosting::class, 'category_id');
    }
}