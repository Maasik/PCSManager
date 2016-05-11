<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\RecursionContext\Exception;
use function view;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index() {

        $email = Auth::user()->email;


        $customer = Customer::where('email', $email)->first();

        if ($customer) {
            $id = $customer->id;
            $orders = Order::where('customer_id', $id)->get();
            return view('home', ['orders' => $orders])->with('message', 'Your orders');
        }

        return view('home')->with('message', 'No orders');
    }

}
