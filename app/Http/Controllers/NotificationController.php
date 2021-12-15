<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Notification;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
class NotificationController extends Controller
{
    //
    public function show($id)
    {
        $cates = Category::all();
        $notification = Notification::findOrFail($id);
        $notification->update(["read_at"=> Carbon::now()]);
        $data = $notification->data;
        $data = json_decode($data, true);
        //dd($data);
        return view("notification.ordersuccess.index",["cates" => $cates,"data" => $data]);
    }
}
