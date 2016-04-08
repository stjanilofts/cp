<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';

    protected $fillable = ['id', 'title', 'discount', 'status'];

    private $fields = [
        [
            'title' => 'Titill',
            'type' => 'text',
            'name' => 'title'
        ],
        [
            'title' => 'Afsláttur (0-100%)',
            'type' => 'text',
            'name' => 'discount'
        ],
    ];

    private $listables = [
        'Titill' => 'title',
        '(%) Discount' => 'discount',
    ];

    public static function getCurrent()
    {
        $couponCode = session()->get('coupon');

        if($couponCode) {
            $coupon = \App\Coupon::where('title', $couponCode)->first();

            return $coupon;
        }

        return false;
    }

    public function getTitleAttribute($value)
    {
        return strtoupper(trim($value));
    }
}