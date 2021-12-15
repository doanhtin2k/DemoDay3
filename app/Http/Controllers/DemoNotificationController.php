<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Notifications\OrderSuccess;
use Illuminate\Http\Request;
use Auth;
class DemoNotificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
      public function index()
      {
          dd(Auth::user()->notifications);
          $bill = Bill::findOrFail(1);

          Auth::user()->notify(new OrderSuccess($bill));

      }
}
