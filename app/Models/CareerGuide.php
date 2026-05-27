<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerGuide extends Model
{
    protected $table = 'career_guides';

    protected $primaryKey = 'guide_id';

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'thumbnail',
        'account_id',
        'category_id',
        'views',
        'is_featured',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(
            CareerCategory::class,
            'category_id'
        );
    }
}