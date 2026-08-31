<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopulationStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'subcategory',
        'count',
        'male',
        'female',
        'description',
    ];
}
