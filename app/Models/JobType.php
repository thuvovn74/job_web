<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = 'job_types';
    protected $primaryKey = 'job_type_id';

    public $timestamps = false;

    protected $fillable = [
        'job_type_name'
    ];

    public function jobs()
    {
        return $this->hasMany(JobPosting::class, 'job_type_id');
    }
}