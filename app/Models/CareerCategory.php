<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerCategory extends Model
{
    use HasFactory;

    protected $table = 'career_categories';

    protected $primaryKey = 'category_id';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug'
    ];

    // ================= RELATION CAREER GUIDES =================
    public function careerGuides()
    {
        return $this->hasMany(CareerGuide::class, 'category_id');
    }
}