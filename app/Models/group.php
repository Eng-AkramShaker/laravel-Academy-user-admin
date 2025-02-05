<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class group extends Model
{


    use HasTranslations;    // ------ ترجمه

    public $translatable =
    ['name', 'notes',];

    // ------ ترجمه



    protected $guarded  = [];
}
