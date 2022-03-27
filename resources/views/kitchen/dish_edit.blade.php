@extends('layouts.master')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Dish Updated Form</h5>
              {{-- <a href="" class="btn btn-success btn-sn float-right">Create</a> --}}
            </div>
            <div class="card-body">
               <form action="{{route('dish.update',$dishes->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                   <div class="form-group">
                       <label for="name" class="control-label">Name</label>
                       <input value="{{$dishes->name}}" type="text" name="name" class="form-control" placeholder="Enter you name">
                   </div>
                   <div class="form-group">
                    <label for="name" class="control-label">Categories</label>
                    <select name="category" id="" class="form-control">
                        @foreach ($categories as $cat)
                        <option value="{{$cat->id}}" {{$cat->id ==$dishes->category_id ? 'select':''}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="control-label">Photo Upload</label>
                    <input type="file" name="image" class="form-control"><br>
                    <img src="{{asset('uploads/'.$dishes->image)}}" alt="" width="100px" height="100px">
                </div>

                <button type="submit" class="btn btn-success">Update</button>
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
