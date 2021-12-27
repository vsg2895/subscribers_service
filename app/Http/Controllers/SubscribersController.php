<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribersRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Subscribers;


class SubscribersController extends Controller
{
    public function subscribe(SubscribersRequest $request)
    {
        $isset_subscriber = Subscribers::where(['email' => $request->email, 'site_id' => $request->site_id])->first();
        if (is_null($isset_subscriber))
        {
            $request->merge([
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
//        Use insert but it faster than create
            $result = Subscribers::insert($request->all());
        }
        else
        {
            return response()->json("You are already subscribed to this site");
        }
        return response()->json("You are successfully subscribe");
    }
}
