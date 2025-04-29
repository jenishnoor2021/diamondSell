@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header" style="display: flex; align-items: center;">
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
      <div class="box box-info">
         <div class="box-body">

            {!! Form::model($diamond, ['method'=>'PATCH', 'action'=> ['AdminDiamondController@update', $diamond->id],'files'=>true,'class'=>'form-horizontal', 'name'=>'editdiamondform']) !!}
            @csrf
            <div class="row">
               <!-- right column -->
               <div class="col-md-6">
                  <!-- Horizontal Form -->

                  <div class="form-group">
                     <label for="parties_id" class="col-sm-3 control-label">Party<span class="text-danger">*</span></label>
                     <div class="col-sm-7">
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
                     <label for="party_code" class="col-sm-3 control-label">Mobile<span class="text-danger">*</span></label>
                     <div class="col-sm-7">
                        <input type="number" name="mobile" class="form-control form-control-rounded" id="mobile" placeholder="Enter mobile" value="{{ $diamond->mobile }}" required>
                        @if($errors->has('mobile'))
                        <div class="error text-danger">{{ $errors->first('mobile') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="dimond_name" class="col-sm-3 control-label">Stone Id<span class="text-danger">*</span></label>
                     <div class="col-sm-7">
                        <input type="text" class="form-control" name="dimond_name" id="dimond_name" placeholder="Enter dimond name" value="{{ $diamond->dimond_name }}" required>
                        @if($errors->has('dimond_name'))
                        <div class="error text-danger">{{ $errors->first('dimond_name') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="weight" class="col-sm-3 control-label">Weight<span class="text-danger">*</span></label>
                     <div class="col-sm-7">
                        <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter weight" value="{{ $diamond->weight }}">
                        @if($errors->has('weight'))
                        <div class="error text-danger">{{ $errors->first('weight') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="shape" class="col-sm-3 control-label">Shape</label>
                     <div class="col-sm-7">
                        <select name="shape" id="shape" class="form-control" style="width:100%">
                           <option value="RB" {{ $diamond->shape == 'RB' ? 'selected' : '' }}>RB</option>
                           <option value="Oval" {{ $diamond->shape == 'Oval' ? 'selected' : '' }}>Oval</option>
                           <option value="Pear" {{ $diamond->shape == 'Pear' ? 'selected' : '' }}>Pear</option>
                           <option value="Princess" {{ $diamond->shape == 'Princess' ? 'selected' : '' }}>Princess</option>
                           <option value="Radiant" {{ $diamond->shape == 'Radiant' ? 'selected' : '' }}>Radiant</option>
                           <option value="Heart" {{ $diamond->shape == 'Heart' ? 'selected' : '' }}>Heart</option>
                           <option value="EM" {{ $diamond->shape == 'EM' ? 'selected' : '' }}>EM</option>
                           <option value="Cushion" {{ $diamond->shape == 'Cushion' ? 'selected' : '' }}>Cushion</option>
                        </select>
                        @if($errors->has('shape'))
                        <div class="error text-danger">{{ $errors->first('shape') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="purity" class="col-sm-3 control-label">Purity</label>
                     <div class="col-sm-7">
                        <select name="purity" id="purity" class="form-control" style="width:100%">
                           <option value="IF" {{ $diamond->purity == 'RB' ? 'selected' : '' }}>IF</option>
                           <option value="VVS1" {{ $diamond->purity == 'VVS1' ? 'selected' : '' }}>VVS1</option>
                           <option value="VVS2" {{ $diamond->purity == 'VVS2' ? 'selected' : '' }}>VVS2</option>
                           <option value="VS1" {{ $diamond->purity == 'VS1' ? 'selected' : '' }}>VS1</option>
                           <option value="VS2" {{ $diamond->purity == 'VS2' ? 'selected' : '' }}>VS2</option>
                           <option value="SI1" {{ $diamond->purity == 'SI1' ? 'selected' : '' }}>SI1</option>
                           <option value="SI2" {{ $diamond->purity == 'SI2' ? 'selected' : '' }}>SI2</option>
                           <option value="I1" {{ $diamond->purity == 'I1' ? 'selected' : '' }}>I1</option>
                           <option value="I2" {{ $diamond->purity == 'I2' ? 'selected' : '' }}>I2</option>
                        </select>
                        @if($errors->has('purity'))
                        <div class="error text-danger">{{ $errors->first('purity') }}</div>
                        @endif
                     </div>
                  </div>
               </div>
               <!--/.col (right) -->

               <!-- left column -->
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="color" class="col-sm-3 control-label">Color</label>
                     <div class="col-sm-7">
                        <select name="color" id="color" class="form-control" style="width:100%">
                           <option value="D" {{ $diamond->color == 'D' ? 'selected' : '' }}>D</option>
                           <option value="E" {{ $diamond->color == 'E' ? 'selected' : '' }}>E</option>
                           <option value="F" {{ $diamond->color == 'F' ? 'selected' : '' }}>F</option>
                           <option value="G" {{ $diamond->color == 'G' ? 'selected' : '' }}>G</option>
                           <option value="H" {{ $diamond->color == 'H' ? 'selected' : '' }}>H</option>
                           <option value="I" {{ $diamond->color == 'I' ? 'selected' : '' }}>I</option>
                           <option value="J" {{ $diamond->color == 'J' ? 'selected' : '' }}>J</option>
                           <option value="K" {{ $diamond->color == 'K' ? 'selected' : '' }}>K</option>
                           <option value="L" {{ $diamond->color == 'L' ? 'selected' : '' }}>L</option>
                           <option value="M" {{ $diamond->color == 'M' ? 'selected' : '' }}>M</option>
                           <option value="N" {{ $diamond->color == 'N' ? 'selected' : '' }}>N</option>
                        </select>
                        @if($errors->has('color'))
                        <div class="error text-danger">{{ $errors->first('color') }}</div>
                        @endif
                     </div>
                  </div>
                  <!-- Horizontal Form -->
                  <div class="form-group">
                     <label for="amount" class="col-sm-3 control-label">Amount<span class="text-danger">*</span></label>
                     <div class="col-sm-7">
                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter amount" value="{{ $diamond->amount }}">
                        @if($errors->has('amount'))
                        <div class="error text-danger">{{ $errors->first('amount') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="planes_id" class="col-sm-3 control-label">Plane<span class="text-danger">*</span></label>
                     <div class="col-sm-7">
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
                     <label for="due_date" class="col-sm-3 control-label">Due date<span class="text-danger">*</span></label>
                     <div class="col-sm-7">
                        <input type="date" class="form-control" name="due_date" id="due_date" placeholder="Enter due date" value="{{$diamond->due_date}}">
                        @if($errors->has('due_date'))
                        <div class="error text-danger">{{ $errors->first('due_date') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="description" class="col-sm-3 control-label">Description</label>
                     <div class="col-sm-7">
                        <textarea type="text" name="description" class="form-control form-control-rounded" id="description" placeholder="Enter description">{{ $diamond->description }}</textarea>
                        @if($errors->has('description'))
                        <div class="error text-danger">{{ $errors->first('description') }}</div>
                        @endif
                     </div>
                  </div>
               </div>
               <!--/.col (left) -->
            </div>

            <hr style="border:1px solid #000">
            <h3 class="text-primary text-bold" style="margin-left:10px">Payment</h3>
            <hr style="border:1px solid #000">

            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="payment_type" class="col-sm-3 control-label">Payment Type</label>
                     <div class="col-sm-7">
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
                     <label for="status" class="col-sm-3 control-label">Status</label>
                     <div class="col-sm-7">
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
                     <label for="payment_date" class="col-sm-3 control-label">Payment Date</label>
                     <div class="col-sm-7">
                        <input type="date" class="form-control" name="payment_date" id="payment_date" placeholder="Enter payment date" value="{{$diamond->payment_date }}">
                        @if($errors->has('payment_date'))
                        <div class="error text-danger">{{ $errors->first('payment_date') }}</div>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="remark" class="col-sm-3 control-label">Payment Remark</label>
                     <div class="col-sm-7">
                        <textarea type="text" name="remark" class="form-control form-control-rounded" id="remark" placeholder="Enter payment Remark">{{ $diamond->remark }}</textarea>
                        @if($errors->has('remark'))
                        <div class="error text-danger">{{ $errors->first('remark') }}</div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-6 control-label">
                  {!! Form::submit('Update', ['class'=>'btn btn-success text-white mt-1','style'=>'width:150px']) !!}
               </div>
            </div>
            <!-- /.row -->
            {!! Form::close() !!}

         </div>
      </div>

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

   document.getElementById('weight').addEventListener('input', function(e) {
      // Remove any invalid characters except numbers and a single dot
      e.target.value = e.target.value.replace(/[^0-9.]/g, '');

      // Allow only one dot
      if ((e.target.value.match(/\./g) || []).length > 1) {
         e.target.value = e.target.value.substring(0, e.target.value.length - 1);
      }
   });

   document.getElementById('amount').addEventListener('input', function(e) {
      // Remove any invalid characters except numbers and a single dot
      e.target.value = e.target.value.replace(/[^0-9.]/g, '');

      // Allow only one dot
      if ((e.target.value.match(/\./g) || []).length > 1) {
         e.target.value = e.target.value.substring(0, e.target.value.length - 1);
      }
   });
</script>
@endsection