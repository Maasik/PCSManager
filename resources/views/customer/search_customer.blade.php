@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="input-group">

                <input type="text" class="form-control" name="search" id="search" 
                       onkeydown="if (event.keyCode == 13)document.getElementById('btnSearch').click()" 
                       placeholder="Searching by name, phone or address">
                <span class="input-group-btn"> 
                    <button class="btn btn-default" type="submin" id='btnSearch' onclick="m()">click</button>
                </span>
                <script> 
                function m(){
                    var src = document.getElementById("search").value;
                    if (src === null || src === "") {
                        alert('Input something');
                    }
                    else{
                        window.location.href = "/customer/search/" + src;
                    }
                    
                }
                </script>
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div>
    <div class="row" style="margin-top: 80px;">
        <div class="col-md-offset-2 col-md-8"> <!-- MESSAGE SECTION -->
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12">
            <div class="list-group">
                <a href="#" class="list-group-item disabled">
                    <h3> List of customers </h3>
                </a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Registration date</th>
                            <th>Order</th>
                            <th>Remove</th>
                        </tr>
                    </thead>


                    @foreach($customers as $customer)



                    <tbody>

                    <td>{{ $customer->id }}</td>
                    <td><a href="customer/{{$customer->id}}/edit" class="btn btn-default">{{ $customer->name }}</a></td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->created_at }}</td>

                    <td> <a href="/order/create/{{$customer->id}}"><span class="btn btn-default glyphicon glyphicon-list-alt" ></span></a></td>  



                    <td>
                        <form method="post" action="{{ url('/customer', $customer->id) }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger remove" >
                                <span class="glyphicon glyphicon-remove"></span> 
                            </button>
                        </form>
                    </td>

                    </tbody>  

                    @endforeach


                </table>

            </div>
        </div>
    </div>
</div>
@endsection
