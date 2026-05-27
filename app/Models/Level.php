<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';
    protected $primaryKey = 'level_id';

    public $timestamps = false;

    protected $fillable = [
        'level_name'
    ];

    public function jobs()
    {
        return $this->hasMany(JobPosting::class, 'level_id');
    }
}