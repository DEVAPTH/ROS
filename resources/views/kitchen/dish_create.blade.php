@extends('layouts.master')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Dish Created Form</h5>
              {{-- <a href="" class="btn btn-success btn-sn float-right">Create</a> --}}
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
               <form action="create" method="POST" enctype="multipart/form-data">
                @csrf
                   <div class="form-group">
                       <label for="name" class="control-label">Name</label>
                       <input type="text" name="name" class="form-control" placeholder="Enter you name">
                   </div>
                   <div class="form-group">
                    <label for="name" class="control-label">Categories</label>
                    <select name="category" id="" class="form-control">
                        @foreach ($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="control-label">Photo Upload</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Send</button>
               </form>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
