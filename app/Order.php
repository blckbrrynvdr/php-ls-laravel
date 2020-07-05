<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App
 *
 * @property-read $id
 * @property $user_name
 * @property $user_email
 * @property $good_id
 */
class Order extends Model
{
    protected $fillable = [
        'user_name', 'user_email', 'good_id'
    ];
}
