<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Coupon;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::orderBy('created_at', 'DESC')->get();
        
        return view('admin.coupons.table')->with(['items' => $coupons]);
    }

    public function store(Request $request)
    {
        $coupon = Coupon::create($request->all());

        return redirect()->action('CouponController@index');
    }

    public function update($id, Request $request)
    {
        $coupon = Coupon::find($id);

        $coupon->update($request->all());

        return redirect()->action('CouponController@index');
    }

    public function create()
    {
        $data['coupon'] = new Coupon;
        $data['route'] = 'admin.coupons.store';
        $data['method'] = 'POST';

        return view('admin.coupons.form')->with($data);
    }

    public function edit($id)
    {
        $data['coupon'] = Coupon::find($id);
        $data['route'] = array('admin.coupons.update', $data['coupon']->id);
        $data['method'] = 'PATCH';

        return view('admin.coupons.form')->with($data);
    }

    public function destroy($id)
    {
        $item = Coupon::find($id);

        $item->delete();

        return redirect()->action('CouponController@index');
    }
}
