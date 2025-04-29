@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Plane
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Edit Plane</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- right column -->
         <div class="col-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
               <div class="box-header with-border">
                  <!-- <h3 class="box-title">Horizontal Form</h3> -->
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               {!! Form::model($plane, ['method'=>'PATCH', 'action'=> ['AdminPlaneController@update', $plane->id],'files'=>true,'class'=>'form-horizontal', 'name'=>'editplaneform']) !!}
               @csrf
               <div class="box-body">
                  <div class="form-group">
                     <label for="pname" class="col-sm-2 control-label">Name<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="text" name="pname" class="form-control form-control-rounded" id="pname" placeholder="Enter plane Name" onkeypress='return (event.charCode != 32)' value="{{$plane->pname}}" required>
                        @if($errors->has('pname'))
                        <div class="error text-danger">{{ $errors->first('pname') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="days" class="col-sm-2 control-label">Days<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="number" name="days" class="form-control form-control-rounded" id="days" placeholder="Enter days" value="{{$plane->days}}" required>
                        @if($errors->has('days'))
                        <div class="error text-danger">{{ $errors->first('days') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="is_active" class="col-sm-2 control-label">Status</label>
                     <div class="col-sm-4">
                        <select name="is_active" id="is_active" class="form-control" style="width:100%" required>
                           <option value="0" {{ $plane->is_active == 0 ? 'selected' : '' }}>Active</option>
                           <option value="1" {{ $plane->is_active == 1 ? 'selected' : '' }}>De-active</option>
                        </select>
                        @if($errors->has('is_active'))
                        <div class="error text-danger">{{ $errors->first('is_active') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-3 col-sm-2 control-label">
                        {!! Form::submit('update', ['class'=>'btn btn-success text-white mt-1']) !!}
                     </div>
                  </div>
               </div>
               {!! Form::close() !!}
            </div>
            <!-- /.box -->
         </div>
         <!--/.col (right) -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
@endsection

@section('script')
<script>
   $(function() {

      $("form[name='editplaneform']").validate({
         rules: {
            pname: {
               required: true,
            },
            days: {
               required: true,
            },
         },
         submitHandler: function(form) {
            form.submit();
         }
      });
   });
</script>
@endsection