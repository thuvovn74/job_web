<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $primaryKey = 'skill_id';

    public $timestamps = false;

    protected $fillable = [
        'skill_name'
    ];

    // ================= RELATION =================

    // Many-to-many với Resume
    public function resumes()
    {
        return $this->belongsToMany(
            Resume::class,
            'resume_skills',   // bảng trung gian
            'skill_id',        // khóa ngoại trong pivot
            'resume_id'        // khóa liên kết
        );
    }
}