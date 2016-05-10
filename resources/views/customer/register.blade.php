@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-offset-2 col-md-8"><!-- MESSAGE SECTION -->
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">{{isset($customer->name)? 'Edit '. $customer->name:'new customer registration'}}</div>
                <div class="panel-body">          <!--TODO: update customer info -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer') }}{{isset($customer->id)?'/'.$customer->id:''}}">
                        {!! csrf_field() !!}
                        @if(isset($customer))
                        <input type="hidden" name="_method" value="PUT">
                        @endif
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ isset($customer)? $customer->name:''  }}">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ isset($customer)? $customer->email:''  }}">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{ isset($customer)? $customer->address:''  }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{ isset($customer)? $customer->phone:''  }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Text</label>

                            <div class="col-md-6">
                                <textarea rows="7" class="form-control" name="text">{{ isset($customer)? $customer->text:''  }}</textarea>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>{{isset($customer)?'Update':'Register'}}
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
