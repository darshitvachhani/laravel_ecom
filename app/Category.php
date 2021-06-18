<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name', 'description','status',
    ];

    public const VALIDATION_RULES =[

        'name' => ['required','unique:categories']  ,
        'description' => ['required',]  ,
        'status' => ['required',]  ,

    ];
}
