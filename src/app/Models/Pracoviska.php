<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;


class Pracoviska extends Model
{
    use AsSource, Filterable;
    protected $table = 'pracoviska';

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
