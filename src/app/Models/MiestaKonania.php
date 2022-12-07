<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class MiestaKonania extends Model
{
    use AsSource;
    protected $table = 'miestakonania1';

    protected $fillable = [
        'nazov',
        'address'
    ];
}
