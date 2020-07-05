<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 * @property-read $id
 * @property $name
 * @property $description
 */
class Category extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public static function getById($id)
    {
        return Category::query()->where('id','=',$id)->get()->first();
    }
}
