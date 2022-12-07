<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;


class Udalosti extends Model
{
    use AsSource, Filterable;
    protected $table = 'udalosti';

    protected $fillable = [
        //'id',
        'nazov',
        'description',
        'start_time',
        'end_time',
        'image'
    ];

    protected $allowedSorts = [
        'nazov',
        'description',
        'start_time',
        'end_time',
    ];

    protected $allowedFilters = [
        'nazov',
        'description',
        'start_time',
        'end_time',
    ];
}
