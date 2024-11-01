@extends('layouts.master')

@section('content')
    <section class="content mt-4">
        <div class="container-fluid">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Order List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dish" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Dish Name</th>
                                        <th>Table Number</th>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->dishes->dish_name }}</td>
                                            <td>{{ $order->table_id }}</td>
                                            <td>{{ $order->order_id }}</td>
                                            <td>
                                                {{ $status[$order->status] }}
                                            </td>
                                            <td>
                                                <a href="/order/{{ $order->id }}/approve"
                                                    class="btn btn-warning">Approve</a>
                                                <a href="/order/{{ $order->id }}/cancel"
                                                    class="btn btn-danger">Cancel</a>
                                                <a href="/order/{{ $order->id }}/ready" class="btn btn-success">Ready</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="/plugins/jquery/jquery.min.js"></script>
<script>
    $(function() {
        $('#dish').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "pageLength": 10,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
