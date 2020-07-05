<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Goods
 * @package App
 *
 * @property-read $id
 * @property $name
 * @property $price
 * @property $category_id
 * @property $description
 */
class Goods extends Model
{
    protected $fillable = [
        'name', 'price', 'category_id', 'description'
    ];
    public function getImageId()
    {
        return $this->id % 9 + 1;
    }

    public function getId()
    {
        return $this->id;
    }

    public static function getById($id)
    {
        return self::query()->where('id','=', $id)->get()->first();
    }
}
