@extends('admin.base')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-8 float-right">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Order List</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th> Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($orders as $order)
                        <tbody>
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->address}}</td>
                                @if ($order->status == 0)
                                    <td>
                                        <a href="{{route('order.updateStatus',$order->id)}}" class="btn btn-danger">processing</a>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{route('order.updateStatus',$order->id)}}" class="btn btn-success">Delivered</a>
                                    </td>
                                @endif
                                <td>
                                    <a href="{{route('order.show',$order->id)}}" class="btn btn-info">Details</a>
                                    <a href="{{route('order.destroy',$order->id)}}" class="btn btn-danger">Delete</a>
                                    <!-- <form action="{{route('order.destroy',$order->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form> -->
                                    
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div> 
@endsection
