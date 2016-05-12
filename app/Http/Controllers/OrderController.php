<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    public function index() {
        $orders = \App\Order::all()->sortByDesc('id');
        return view('order.search_order', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($customer_id) {
        $customer = \App\Customer::find($customer_id);

        return view('order.add_order')->with('customer', $customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        \App\Order::create($request->all());
        return redirect('/order')->with('message', 'The new order is added successfully');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return 'show order';
    }

    public function search($search, $keyword) {

        switch ($keyword) {
            case 'name':
                $customer = \App\Customer::where($keyword, 'like', '%' . $search . '%')->first();
                if ($customer !== null) {
                    $order = \App\Order::where('customer_id', 'like', $customer->id)->get();
                } else {
                    $order = nullOrEmptyString();
                }

                break;
            case 'customer_description':
                $order = \App\Order::where('customer_description', 'like', '%' . $search . '%')->get();
                break;
            case 'pc_serial':
                $order = \App\Order::where('pc_serial', 'like', '%' . $search . '%')->get();
                break;
            case 'ascertained_issues':
                $order = \App\Order::where('ascertained_issues', 'like', '%' . $search . '%')->get();
                break;
            case 'decision':
                $order = \App\Order::where('decision', 'like', '%' . $search . '%')->get();
                break;
            default:
                return 'defoult';
        }

        return view('order.search_order', ['orders' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $order = \App\Order::find($id);
        // show the edit form and pass the nerd
        return View('order/add_order')->with('order', $order)->with($regOrEdit = 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $order = \App\Order::findOrFail($id);


        $order->customer_id = $request->get('customer_id');
        $order->pc_serial = $request->get('pc_serial');
        $order->customer_description = $request->get('customer_description');
        $order->ascertained_issues = $request->get('ascertained_issues');
        $order->decision = $request->get('decision');
        $order->description_iteme = $request->get('description_iteme');
        $order->note = $request->get('note');
        $order->status = $request->get('status');
        $order->finish_order_date = $request->finish_order_date == null ||
                $request->finish_order_date == '' ? null : $request->finish_order_date;

        $order->update();


        return redirect('/order')->with('message', 'order has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $order = \App\Order::find($id);

        $order->delete();
        return redirect('/order')->with('message', 'Order has been Delete!');
    }

}
