@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$message}}
                </div>


                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Your description</th>
                                <th>Issues</th>
                                <th>description_iteme</th>
                                <th>Status</th>
                                 <th>Stassssssssssssssssssssssssssssssssssssssssssssssssssssstus</th>
                            </tr>
                        </thead>
                        @if(isset($orders))
                        @foreach($orders as $order)
                        <tbody>

                        <td>{{$order->pc_serial}}</td>
                        <td>{{$order->customer_description}}</td>
                        <td>{{$order->ascertained_issues}}</td>
                        <td>{{$order->description_iteme}}</td>
                        <td>Finished</td>

                        </tbody>
                        @endforeach
                        @endif
                    </table>



                </div>
          
        </div>
    </div>
</div>
</div>
@endsection
