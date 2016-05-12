@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="form-group form-inline">

                <input type="text" style="width: 380px" class="form-control" name="search" id="search" 
                       onkeydown="if (event.keyCode === 13)
                                   document.getElementById('btnSearch').click()" 
                       placeholder="Searching by criteria...">
                <select class="btn btn-default form-control" id="keyword">
                    <option value="name">Customer name</option>
                    <option value="pc_serial">PC serial</option>
                    <option value="customer_description">Customer description</option>
                    <option value="ascertained_issues">Ascertained issues</option>
                    <option value="decision">Decision</option>
                </select>
                <button class="btn btn-default" type="submin" id='btnSearch' onclick="m()">Search</button>


                <script>
                    function m() {
                        var src = document.getElementById("search").value;
                        var e = document.getElementById("keyword");
                        var keywordValue = e.options[e.selectedIndex].value;

                        if (src === null || src === "") {
                            alert('Input something');
                        } else {
                            window.location.href = "/order/search/" + src + "/" + keywordValue;
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
                <div class="checkbox left">
                    <label class="btn btn-default">
                        <input type="checkbox" > Wait for executable
                    </label>
                    <label class="btn btn-default">
                        <input type="checkbox" > In progress
                    </label>
                    <label class="btn btn-default">
                        <input type="checkbox" > In progress
                    </label>
                </div>
                <a href="#" class="list-group-item disabled">
                    <h3> Order's list </h3>
                </a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Client name</th>
                            <th>Description</th>
                            <th>Issues</th>
                            <th>Decision</th>
                            <th>Edit</th>
                            <th>Remove</th>
                        </tr>
                    </thead>

                    @foreach($orders as $order)
                    <tbody>

                    <td>{{ $order->id }}</td>
                    <td>{{ \App\Customer::find($order->customer_id)->name }}</td>
                    <td>{{ $order->customer_description }}</td>
                    <td>{{ $order->ascertained_issues }}</td>
                    <td>{{ $order->decision }}</td>
                    <td><a href="/order/{{$order->id}}/edit" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a></td>  
                    <td>
                        <form method="post" action="{{ url('/order', $order->id) }}">
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
