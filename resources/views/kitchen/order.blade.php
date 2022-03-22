@extends('layouts.master')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-8">
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Featured</h5>
              <a href="" class="btn btn-success btn-sn float-right">Create</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Category</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                   <tbody>
                       <tr>
                           <td>1</td>
                           <td>Food</td>
                           <td>Noddle</td>
                           <td>
                               <a href="" class="btn btn-danger btn-sn">Delete</a>
                           </td>
                       </tr>
                   </tbody>
                </table>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
