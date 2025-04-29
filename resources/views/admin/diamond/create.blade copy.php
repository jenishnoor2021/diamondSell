@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Diamond
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Add Diamond</li>
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
               {!! Form::open(['method'=>'POST', 'action'=> 'AdminDiamondController@store','files'=>true,'class'=>'form-horizontal','name'=>'adddiamondsform']) !!}
               @csrf
               <div class="box-body">
                  <div class="form-group">
                     <label for="parties_id" class="col-sm-2 control-label">Party<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <select name="parties_id" id="parties_id" class="form-control" style="width:100%" required>
                           <option value="">Select Party</option>
                           @foreach ($partys as $party)
                           <option value="{{$party->id}}" data-mobile="{{$party->mobile}}">{{$party->fname}}</option>
                           @endforeach
                        </select>
                        @if($errors->has('parties_id'))
                        <div class="error text-danger">{{ $errors->first('parties_id') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="party_code" class="col-sm-2 control-label">Mobile<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="number" name="mobile" class="form-control form-control-rounded" id="mobile" placeholder="Enter mobile" value="{{ old('mobile') }}" required>
                        @if($errors->has('mobile'))
                        <div class="error text-danger">{{ $errors->first('mobile') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="description" class="col-sm-2 control-label">Description</label>
                     <div class="col-sm-4">
                        <textarea type="text" name="description" class="form-control form-control-rounded" id="description" placeholder="Enter description">{{ old('description') }}</textarea>
                        @if($errors->has('description'))
                        <div class="error text-danger">{{ $errors->first('description') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="dimond_name" class="col-sm-2 control-label">Stone Id<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="dimond_name" id="dimond_name" placeholder="Enter dimond name" required>
                        @if($errors->has('dimond_name'))
                        <div class="error text-danger">{{ $errors->first('dimond_name') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="weight" class="col-sm-2 control-label">Weight<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="number" class="form-control" name="weight" id="weight" placeholder="Enter weight">
                        @if($errors->has('weight'))
                        <div class="error text-danger">{{ $errors->first('weight') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="shape" class="col-sm-2 control-label">Shape</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="shape" id="shape" placeholder="Enter shape">
                        @if($errors->has('shape'))
                        <div class="error text-danger">{{ $errors->first('shape') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="amount" class="col-sm-2 control-label">Amount<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter amount">
                        @if($errors->has('amount'))
                        <div class="error text-danger">{{ $errors->first('amount') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="planes_id" class="col-sm-2 control-label">Plane<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <select name="planes_id" id="planes_id" class="form-control" style="width:100%" required>
                           <option value="">Select Plane</option>
                           @foreach ($planes as $plane)
                           <option value="{{$plane->id}}" data-created="{{ date('Y-m-d') }}" data-days="{{$plane->days}}">{{$plane->pname}}</option>
                           @endforeach
                        </select>
                        @if($errors->has('planes_id'))
                        <div class="error text-danger">{{ $errors->first('planes_id') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="due_date" class="col-sm-2 control-label">Due date<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="date" class="form-control" name="due_date" id="due_date" placeholder="Enter due date">
                        @if($errors->has('due_date'))
                        <div class="error text-danger">{{ $errors->first('due_date') }}</div>
                        @endif
                     </div>
                  </div>
                  <!-- <div class="form-group">
                     <label for="status" class="col-sm-2 control-label">Status</label>
                     <div class="col-sm-4">
                        <select name="status" id="status" class="form-control" style="width:100%" required>
                           <option value="Pending">Pending</option>
                           <option value="Done">Done</option>
                        </select>
                        @if($errors->has('status'))
                        <div class="error text-danger">{{ $errors->first('status') }}</div>
                        @endif
                     </div>
                  </div> -->
                  <div class="form-group">
                     <div class="col-md-3 col-sm-2 control-label">
                        {!! Form::submit('Add', ['class'=>'btn btn-success text-white mt-1']) !!}
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
<script
   script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script>
   $(function() {
      $("form[name='adddiamondsform']").validate({
         rules: {
            parties_id: {
               required: true,
            },
            mobile: {
               required: true,
            },
            dimond_name: {
               required: true,
            },
            amount: {
               required: true,
            },
            planes_id: {
               required: true,
            },
            due_date: {
               required: true,
            },
         },
         submitHandler: function(form) {
            form.submit();
         }
      });
   });

   document.getElementById('parties_id').addEventListener('change', function() {
      // Get the selected option
      var selectedOption = this.options[this.selectedIndex];

      // Get the data-mobile attribute value
      var mobileNumber = selectedOption.getAttribute('data-mobile');

      // Set the value of the mobile input field
      document.getElementById('mobile').value = mobileNumber || '';
   });

   document.getElementById('planes_id').addEventListener('change', function() {
      // Get the selected option
      var selectedOption = this.options[this.selectedIndex];

      // Get the data-created and data-days attributes
      var createdDate = selectedOption.getAttribute('data-created');
      var daysToAdd = parseInt(selectedOption.getAttribute('data-days'), 10);

      if (createdDate && !isNaN(daysToAdd)) {
         // Parse the createdDate as a JavaScript Date object
         var date = new Date(createdDate);

         // Add the specified number of days
         date.setDate(date.getDate() + daysToAdd);

         // Format the new due date in 'YYYY-MM-DD' format
         var dueDate = date.toISOString().split('T')[0];

         // Set the value of the due_date input field
         document.getElementById('due_date').value = dueDate;
      }
   });
</script>
@endsection