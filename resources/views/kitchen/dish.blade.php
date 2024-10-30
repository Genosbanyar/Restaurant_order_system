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
                            <h3 class="card-title">Dishes</h3>
                            <a style="float:right" href="/dish/create" class="btn btn-success">Create</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dish" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Dish Name</th>
                                        <th>Category Name</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dishes as $dish)
                                        <tr>
                                            <td>{{ $dish->dish_name }}</td>
                                            <td>{{ $dish->category->name }}</td>
                                            <td>{{ $dish->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a class="btn btn-warning" href="/dish/{{ $dish->id }}/edit">Edit</a> |
                                                <form class='d-inline' action="/dish/{{ $dish->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure to remove this dish?')"
                                                        class="btn btn-danger">DELETE</button>
                                                </form>
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
