@extends('layouts.master')

@section('content')
<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <h3 class="card-title">Show Dishes Table</h3>
    <a href="{{route('dish.create')}}" class="btn btn-success" style="float: right">Create</a>
    </div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
            <th>No</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Category</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish)
                <tr>
                    <td>{{$dish->id}}</td>
                    <td><img src="{{asset('/uploads/'.$dish->image)}}" alt="" width="100px" height="80px"></td>
                    <td>{{$dish->name}}</td>
                    <td>{{$dish->category->name}}</td>
                    <td>
                        <div class="form-row">
                            <a href="dish/{{$dish->id}}/edit" class="btn btn-outline-primary btn-sm" style="height:30px;margin-right:10px">Edit</a>
                            <form action="dish/{{$dish->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete it?')"> Delete</button>

                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    </div>

    </div>

    </div>

    </div>

    </section>
@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "pageLength":15,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
