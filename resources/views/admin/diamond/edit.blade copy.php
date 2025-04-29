@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Diamond
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Edit Diamond</li>
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
               {!! Form::model($diamond, ['method'=>'PATCH', 'action'=> ['AdminDiamondController@update', $diamond->id],'files'=>true,'class'=>'form-horizontal', 'name'=>'editdiamondform']) !!}
               @csrf
               <div class="box-body">
                  <div class="form-group">
                     <label for="parties_id" class="col-sm-2 control-label">Party<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <select name="parties_id" id="parties_id" class="form-control" style="width:100%" required>
                           <option value="">Select Party</option>
                           @foreach ($partys as $party)
                           <option value="{{$party->id}}" {{ $party->id == $diamond->parties_id ? 'selected' : '' }}>{{$party->fname}}</option>
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
                        <input type="number" name="mobile" class="form-control form-control-rounded" id="mobile" placeholder="Enter mobile" value="{{ $diamond->mobile }}" required>
                        @if($errors->has('mobile'))
                        <div class="error text-danger">{{ $errors->first('mobile') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="description" class="col-sm-2 control-label">Description</label>
                     <div class="col-sm-4">
                        <textarea type="text" name="description" class="form-control form-control-rounded" id="description" placeholder="Enter description">{{ $diamond->description }}</textarea>
                        @if($errors->has('description'))
                        <div class="error text-danger">{{ $errors->first('description') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="dimond_name" class="col-sm-2 control-label">Stone Id<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="dimond_name" id="dimond_name" placeholder="Enter dimond name" value="{{ $diamond->dimond_name }}" required>
                        @if($errors->has('dimond_name'))
                        <div class="error text-danger">{{ $errors->first('dimond_name') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="weight" class="col-sm-2 control-label">Weight<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="number" class="form-control" name="weight" id="weight" placeholder="Enter weight" value="{{ $diamond->weight }}">
                        @if($errors->has('weight'))
                        <div class="error text-danger">{{ $errors->first('weight') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="shape" class="col-sm-2 control-label">Shape</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="shape" id="shape" placeholder="Enter shape" value="{{ $diamond->shape }}">
                        @if($errors->has('shape'))
                        <div class="error text-danger">{{ $errors->first('shape') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="amount" class="col-sm-2 control-label">Amount<span class="text-danger">*</span></label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter amount" value="{{ $diamond->amount }}">
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
                           <option value="{{$plane->id}}" {{ $plane->id == $diamond->planes_id ? 'selected' : '' }}>{{$plane->pname}}</option>
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
                        <input type="date" class="form-control" name="due_date" id="due_date" placeholder="Enter due date" value="{{$diamond->due_date}}">
                        @if($errors->has('due_date'))
                        <div class="error text-danger">{{ $errors->first('due_date') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="payment_type" class="col-sm-2 control-label">Payment Type</label>
                     <div class="col-sm-4">
                        <select name="payment_type" id="payment_type" class="form-control" style="width:100%">
                           <option value="">Select payment type</option>
                           <option value="cash" {{ $diamond->payment_type == 'cash' ? 'selectd' : '' }}>Cash</option>
                           <option value="online" {{ $diamond->payment_type == 'online' ? 'selectd' : '' }}>Online</option>
                           <option value="check" {{ $diamond->payment_type == 'check' ? 'selectd' : '' }}>Check</option>
                        </select>
                        @if($errors->has('payment_type'))
                        <div class="error text-danger">{{ $errors->first('payment_type') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="status" class="col-sm-2 control-label">Status</label>
                     <div class="col-sm-4">
                        <select name="status" id="status" class="form-control" style="width:100%">
                           <option value="Pending" {{ $diamond->status == 'Pending' ? 'selectd' : '' }}>Pending</option>
                           <option value="Done" {{ $diamond->status == 'Done' ? 'selectd' : '' }}>Done</option>
                        </select>
                        @if($errors->has('status'))
                        <div class="error text-danger">{{ $errors->first('status') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="payment_date" class="col-sm-2 control-label">Payment Date</label>
                     <div class="col-sm-4">
                        <input type="date" class="form-control" name="payment_date" id="payment_date" placeholder="Enter payment date" value="{{$diamond->payment_date }}">
                        @if($errors->has('payment_date'))
                        <div class="error text-danger">{{ $errors->first('payment_date') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="remark" class="col-sm-2 control-label">Payment Remark</label>
                     <div class="col-sm-4">
                        <textarea type="text" name="remark" class="form-control form-control-rounded" id="remark" placeholder="Enter payment Remark">{{ $diamond->remark }}</textarea>
                        @if($errors->has('remark'))
                        <div class="error text-danger">{{ $errors->first('remark') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-3 col-sm-2 control-label">
                        {!! Form::submit('Update', ['class'=>'btn btn-success text-white mt-1']) !!}
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
      $("form[name='editdiamondform']").validate({
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

   document.getElementById('status').addEventListener('change', function() {
      // Get the selected status
      var selectedStatus = this.value;

      // If the status is 'Done', set the payment_date to today's date
      if (selectedStatus === 'Done') {
         var today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
         document.getElementById('payment_date').value = today;
      } else {
         document.getElementById('payment_date').value = ''; // Clear the payment date if not 'Done'
      }
   });
</script>
@endsection