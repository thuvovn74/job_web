<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employers';
    protected $primaryKey = 'employer_id';
    public $timestamps = false;

    protected $fillable = [
        'account_id',
        'company_name',
        'contact_name',
        'position',
        'phone',
        'cover_image',
        'avatar',
        'description',
        'website',
        'location',
        'company_size',
        'founded_year'
    ];

    // account
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}
