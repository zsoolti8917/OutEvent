<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class EventTags extends Model
{
    use AsSource;
protected $table = 'eventtags1';
    protected $fillable = [
        'nazov'
    ];
}
