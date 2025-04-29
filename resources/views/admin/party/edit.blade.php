@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Party
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Edit Party</li>
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
               {!! Form::model($party, ['method'=>'PATCH', 'action'=> ['AdminPartyController@update', $party->id],'files'=>true,'class'=>'form-horizontal', 'name'=>'editpartyform']) !!}
               @csrf
               <div class="box-body">
                  <div class="form-group">
                     <label for="fname" class="col-sm-2 control-label">Name<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="text" name="fname" class="form-control form-control-rounded" id="fname" placeholder="Enter Party Name" onkeypress='return (event.charCode != 32)' value="{{$party->fname}}" required>
                        @if($errors->has('fname'))
                        <div class="error text-danger">{{ $errors->first('fname') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="party_code" class="col-sm-2 control-label">Party Code<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="text" name="party_code" class="form-control form-control-rounded" id="party_code" placeholder="Enter party code" value="{{$party->party_code}}" required>
                        @if($errors->has('party_code'))
                        <div class="error text-danger">{{ $errors->first('party_code') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="mobile" class="col-sm-2 control-label">Mobile no<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile" value="{{$party->mobile}}" required>
                        @if($errors->has('mobile'))
                        <div class="error text-danger">{{ $errors->first('mobile') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="address" class="col-sm-2 control-label">Address</label>
                     <div class="col-sm-4">
                        <textarea type="text" name="address" class="form-control form-control-rounded" id="address" placeholder="Enter Address">{{ $party->address }}</textarea>
                        @if($errors->has('address'))
                        <div class="error text-danger">{{ $errors->first('address') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="aadhar_no" class="col-sm-2 control-label">Aadhar no</label>
                     <div class="col-sm-4">
                        <input type="number" class="form-control" name="aadhar_no" id="aadhar_no" placeholder="Enter aadhar no" value="{{$party->aadhar_no}}">
                        @if($errors->has('aadhar_no'))
                        <div class="error text-danger">{{ $errors->first('aadhar_no') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="is_active" class="col-sm-2 control-label">Status</label>
                     <div class="col-sm-4">
                        <select name="is_active" id="is_active" class="form-control" style="width:100%" required>
                           <option value="0" {{ $party->is_active == 0 ? 'selected' : '' }}>Active</option>
                           <option value="1" {{ $party->is_active == 1 ? 'selected' : '' }}>De-active</option>
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

      $("form[name='editpartyform']").validate({
         rules: {
            fname: {
               required: true,
            },
            mobile: {
               required: true,
            },
            party_code: {
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