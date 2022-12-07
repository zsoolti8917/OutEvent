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
        'address'
    ];

    protected $allowedSorts = [
        'nazov',
        'address'
    ];

    protected $allowedFilters = [
        'nazov',
        'address'
    ];
}
