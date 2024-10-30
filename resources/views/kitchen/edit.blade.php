@extends('layouts.master')

@section('content')
    <section class="content mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit delicious dish</h3>
                            <a style="float:right" href="/dish" class="btn btn-secondary">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <form action="/dish/{{ $dish->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="dish_name" class="form-control"
                                        value="{{ old('dish_name', $dish->dish_name) }}" type="text"
                                        placeholder="Enter dish name...">
                                    @error('dish_name')
                                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $dish->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="dish_image">
                                    <img src="{{ url('/images/' . $dish->dish_image) }}">
                                    @error('dish_image')
                                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <button class="btn btn-info text-light" type="submit">Update</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="plugins/jquery/jquery.min.js"></script>
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
