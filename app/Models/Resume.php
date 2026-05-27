<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $table = 'resumes';
    protected $primaryKey = 'resume_id';

    public $timestamps = false; // vì DB của bạn không có created_at, updated_at

    protected $fillable = [
        'resume_title',
        'candidate_id',
        'category_id',
        'job_type_id',
        'level_id',
        'career_objective',
        'experience',
        'education',
        'soft_skills',
        'awards'
    ];

    // ================= RELATION =================

    // 1 Resume thuộc về 1 Candidate
    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    // Resume có nhiều Application
    public function applications()
    {
        return $this->hasMany(Application::class, 'resume_id');
    }

    // Resume có nhiều skill (many-to-many)
    public function skills()
    {
        return $this->belongsToMany(
            Skill::class,
            'resume_skills',
            'resume_id',
            'skill_id'
        );
    }
}