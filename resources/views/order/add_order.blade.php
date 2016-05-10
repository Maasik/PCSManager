@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-offset-2 col-md-8"><!-- MESSAGE SECTION -->
        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{isset($order->name)? 'Edit '. $order->name:'Add new order'}}
                </div>
                <div class="panel-body">          <!--TODO: update order info -->
                    <form class="form-group" role="form" method="POST" action="{{ url('/order') }}{{isset($order->id)?'/'.$order->id:''}}">
                        {!! csrf_field() !!}
                        @if(isset($order))
                        <input type="hidden" name="_method" value="PUT">
                        @endif
                        <div class="row" id="order-box">
                            <div class="col-md-offset-1 col-md-5">
                                <div class="row">
                                    <div class="form-group " >
                                        <label class="col-md-12 control-label">Customer name's</label>
                                        <div class="col-md-9">                                            <!--isset($customer)?$customer->name:$order->customer_id -->
                                            <input type="text" class="form-control" name="" value="{{ isset($order)? \App\Customer::find($order->customer_id)->name:$customer->name }} " readonly>
                                        </div> 
                                        <div class="col-md-2">
                                            <input type="text" class="form-control " name="customer_id" value="{{ isset($order)? $order->customer_id:$customer->id  }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" col-md-5">
                                <div class="form-group">
                                    <label class="col-md-12 control-label">PC Serial number</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="pc_serial" value="{{ isset($order)? $order->pc_serial:''  }}">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row" id="order-box">
                            <div class="col-md-offset-1 col-md-5">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Description</label>
                                        <div class="col-md-11">
                                            <textarea type="text" rows="5" class="form-control" name="customer_description">{{ isset($order)? $order->customer_description:''  }}</textarea> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Description iteme</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control" name="description_iteme">{{ isset($order)? $order->description_iteme:''  }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="order-box">
                            <div class="col-md-offset-1 col-md-5">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Issues</label>
                                        <div class="col-md-11">
                                            <textarea type="text" rows="5" class="form-control" name="ascertained_issues">{{ isset($order)? $order->ascertained_issues:''  }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Note</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control" name="note">{{ isset($order)? $order->note:''  }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="order-box">
                            <div class="col-md-offset-1 col-md-5">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-11 control-label">Decision</label>
                                        <div class="col-md-11">
                                            <textarea rows="5" class="form-control" name="decision">{{ isset($order)? $order->decision:''  }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Date of created</label>
                                    <div class="col-md-6">
                                        <input type="datetime" class="form-control" value='{{ isset($order)? $order->created_at:''  }}'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Date last updated</label>
                                    <div class="col-md-6">
                                        <input type="datetime" class="form-control" name="" value="{{ isset($order)? $order->updated_at:''  }}">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-group" id="order-box">
                            <div class="col-md-6 col-md-offset-5">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-tag"></i>{{isset($order)?'Update':'Add new order'}}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
