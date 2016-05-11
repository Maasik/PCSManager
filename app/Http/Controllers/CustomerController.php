<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class CustomerController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $customers = \App\Customer::all();
        return view('customer.search_customer', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('/customer/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        \App\Customer::create($request->all());

        return redirect('/customer')->with('message','The new customer is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
        $customer = \App\Customer::find($id);
         
        return  $customer;
        
    }
    
     public function search($search) {
         
        $customers = \App\Customer::where('name', 'like' ,'%'.$search .'%')
                ->orWhere('phone', 'like' ,'%'.$search .'%')
                ->orWhere('address', 'like' ,'%'.$search .'%')
                ->get();
 
        return view('customer.search_customer', ['customers' => $customers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        $customer = \App\Customer::find($id);
        // show the edit form and pass the nerd
        return View('customer/register')->with('customer', $customer)->with($regOrEdit = 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    $customer = \App\Customer::findOrFail($id);
   
    $customer->email = $request->get('email');
    $customer->address = $request->get('address');
    $customer->phone = $request->get('phone');
    $customer->text = $request->get('text');
    $customer->save();

   // return \Redirect::route('users.edit', [$user->id])->with('message', 'User has been updated!');
                
        return redirect('/customer')->with('message', 'Customer has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $customer = \App\Customer::find($id);

        $customer->delete();
        return redirect('/customer')->with('message', 'Customer has been Delete!');
    }

}
