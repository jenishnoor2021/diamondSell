@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Plane List
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Plane</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  @if (session('success'))
                  <div class="alert text-white pl-3 pt-2 pb-2" style="background-color:green">
                     {{ session('success') }}
                  </div>
                  @endif
               </div>
               <div class="row">
                  <div class="col-md-9">
                     <a href="{{route('admin.plane.create')}}" class="bg-primary text-white text-decoration-none" style="padding:12px 12px;margin-left:20px"><i class="fa fa-plus editable" style="font-size:15px;">&nbsp;ADD</i></a>
                  </div>
                  <div class="col-md-3">
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="overflow-x:auto;margin-top:15px">
                  @if(count($planes)>0)
                  <table id="planetable" class="table table-bordered table-striped">
                     <thead class="bg-primary">
                        <tr>
                           <th>Action</th>
                           <th>Name</th>
                           <th>Days</th>
                           <th>Active/De-active</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($planes as $plane)
                        <tr>
                           <td>
                              <a href="{{route('admin.plane.edit', $plane->id)}}"><i class="fa fa-edit" style="color:white;font-size:15px;background-color:#0275d8;padding:8px;border-radius:200px;"></i></a>
                              <a href="{{route('admin.plane.destroy', $plane->id)}}" onclick="return confirm('Sure ! You want to delete this ?');"><i class="fa fa-trash" style="color:white;font-size:15px;background-color:red;padding:8px;border-radius:200px;"></i></a>
                           </td>
                           <td>{{$plane->pname}}</td>
                           <td>{{$plane->days}}</td>
                           <td>
                              @if($plane->is_active == 1)
                              <a href="/admin/plane/active/{{$plane->id}}" class="btn btn-success">Active</a>
                              @else
                              <a href="/admin/plane/active/{{$plane->id}}" class="btn btn-danger">De-active</a>
                              @endif
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  @endif

               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
@endsection