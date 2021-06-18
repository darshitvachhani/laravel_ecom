<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;


class Product extends Model
{
    //
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','user_id','category_id','description', 'image','status','price',
    ];

    public const VALIDATION_RULES = [

        'name' => ['required','unique:products'] ,
        'description' => ['required'] ,
        'price' => ['required'],
        'image' => ['required','mimes:jpg,png,jpeg'],
        'category' => ['required'],
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status_value()
    {
        if($this->status)
        {
            return "Active";
        }
        else
        {
            return "Inactive";
        }
    }

    public function date_formatting()
    {
        $creationDateOldFormat= date_create($this->created_at);
        $creationDateNewFormat = date_format($creationDateOldFormat,"d/m/Y H:i:s");
        return $creationDateNewFormat;
    }


}
