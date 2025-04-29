@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Report
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Report</li>
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
          <div class="row pl-4 pr-4">
            <div class="col-md-12">
              <form action="{{ route('admin.report.index') }}" method="GET">
                @csrf
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="party_id">Party Name</label>
                      <select name="party_id" id="party_id" class="custom-select form-control form-control-rounded" required>
                        <option value="">Select party</option>
                        <option value="All" {{ request()->party_id == 'All' ? 'selected' : '' }}>ALL</option>
                        @foreach($partyLists as $partyList)
                        <option value="{{$partyList->id}}" {{ request()->party_id == $partyList->id ? 'selected' : '' }}>{{$partyList->fname}}&nbsp;&nbsp;{{$partyList->lname}}</option>
                        @endforeach
                      </select>
                      @if($errors->has('party_id'))
                      <div class="error text-danger">{{ $errors->first('party_id') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Status:</label>
                      <div>
                        <label>
                          <input type="checkbox" name="status[]" value="Pending" {{ in_array('Pending', (array) request()->status) ? 'checked' : '' }}>
                          Pending
                        </label>
                        <br>
                        <label>
                          <input type="checkbox" name="status[]" value="Done" {{ in_array('Done', (array) request()->status) ? 'checked' : '' }}>
                          Completed
                        </label>
                      </div>
                      @if($errors->has('status'))
                      <div class="error text-danger">{{ $errors->first('status') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="start_date">Start Date:</label>
                      <input type="date" name="start_date" class="form-control form-control-rounded" id="start_date" value="{{ request()->start_date }}">
                      @if($errors->has('start_date'))
                      <div class="error text-danger">{{ $errors->first('start_date') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="end_date">End Date:</label>
                      <input type="date" name="end_date" class="form-control form-control-rounded" id="end_date" value="{{ request()->end_date }}">
                      @if($errors->has('end_date'))
                      <div class="error text-danger">{{ $errors->first('end_date') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary px-5">Report</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body" style="overflow-x:auto;margin-top:15px">
            @if (count($data)>0)
            <?php if ($_GET['party_id'] == 'All') { ?>
              <table id="exportTable_<?= $partys[0]['id'] ?>" class="table table-bordered table-striped partyFTable">
                <thead class="bg-primary">
                  <tr>
                    <th>Party Name</th>
                    <th>Mobile</th>
                    <th>Dimond Name</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Sell Date</th>
                    <th>Due Date</th>
                    <th>Payment Date</th>
                    <th>Payment Type</th>
                    <th>Remark</th>
                    <th>Weight</th>
                    <th>Shap</th>
                    <th>Purity</th>
                    <th>Color</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $total = 0;
                  ?>
                  @foreach ($data as $da)
                  <?php
                  $total += ((int)$da->amount);
                  ?>
                  <tr>
                    <td>{{$da->parties->fname}}</td>
                    <td>{{$da->mobile}}</td>
                    <td>{{$da->dimond_name}}</td>
                    <td class="text-bold {{$da->status == 'Done' ? 'text-success' : 'text-danger'}}">{{$da->status}}</td>
                    <td>{{$da->amount}}</td>
                    <td>{{ $da->created_at->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($da->due_date)->format('d-m-Y') }}</td>
                    <td>{{ $da->payment_date ? \Carbon\Carbon::parse($da->payment_date)->format('d-m-Y') : '' }}</td>
                    <td>{{$da->payment_type}}</td>
                    <td>{{$da->remark}}</td>
                    <td>{{$da->weight}}</td>
                    <td>{{$da->shape}}</td>
                    <td>{{$da->purity}}</td>
                    <td>{{$da->color}}</td>
                    <td>@if(strlen($da->description) > 40)
                      {!!substr($da->description,0,40)!!}
                      <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                      <span class="read-more-content"> {{substr($da->description,40,strlen($da->description))}}
                        <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                      @else
                      {{$da->description}}
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <h4 class="text-bold">Total</h4>
                    </td>
                    <td>
                      <h4 class="text-bold"><?= $total ?></h4>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
            <?php } else { ?>
              @foreach ($partys as $partyList)
              <center>
                <h4 class="text-bold" style="margin-top:20px">{{$partyList->fname}}</h4>
              </center>
              <table id="exportTable_{{$partyList->id}}" class="table table-bordered table-striped partyFTable">
                <thead class="bg-primary">
                  <tr>
                    <!-- <th>Action</th> -->
                    <th>Party Name</th>
                    <th>Mobile</th>
                    <th>Dimond Name</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Sell Date</th>
                    <th>Due Date</th>
                    <th>Payment Date</th>
                    <th>Payment Type</th>
                    <th>Remark</th>
                    <th>Weight</th>
                    <th>Shap</th>
                    <th>Purity</th>
                    <th>Color</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $total = 0;
                  ?>
                  @foreach ($data as $da)
                  @if($partyList->id == $da->parties_id)
                  <?php
                  $total += ((int)$da->amount);
                  ?>
                  <tr>
                    <!-- <td>
                    <a href="{{route('admin.diamond.edit', $da->id)}}"><i class="fa fa-edit" style="color:white;font-size:15px;background-color:#0275d8;padding:8px;border-radius:200px;"></i></a>
                  </td> -->
                    <td>{{$da->parties->fname}}</td>
                    <td>{{$da->mobile}}</td>
                    <td>{{$da->dimond_name}}</td>
                    <td class="text-bold {{$da->status == 'Done' ? 'text-success' : 'text-danger'}}">{{$da->status}}</td>
                    <td>{{$da->amount}}</td>
                    <td>{{ $da->created_at->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($da->due_date)->format('d-m-Y') }}</td>
                    <td>{{ $da->payment_date ? \Carbon\Carbon::parse($da->payment_date)->format('d-m-Y') : '' }}</td>
                    <td>{{$da->payment_type}}</td>
                    <td>{{$da->remark}}</td>
                    <td>{{$da->weight}}</td>
                    <td>{{$da->shape}}</td>
                    <td>{{$da->purity}}</td>
                    <td>{{$da->color}}</td>
                    <td>@if(strlen($da->description) > 40)
                      {!!substr($da->description,0,40)!!}
                      <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                      <span class="read-more-content"> {{substr($da->description,40,strlen($da->description))}}
                        <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                      @else
                      {{$da->description}}
                      @endif
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <h4 class="text-bold">Total</h4>
                    </td>
                    <td>
                      <h4 class="text-bold"><?= $total ?></h4>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
              @endforeach
            <?php } ?>
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

@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<script>
  $(document).ready(function() {
    @foreach($partys as $party)
    if ($("#exportTable_{{ $party->id }}").length) { // Ensure table exists
      $("#exportTable_{{ $party->id }}").DataTable({
        dom: 'Blfrtip',
        buttons: [{
            extend: 'pdf',
            title: 'Report',
            footer: true
          },
          {
            extend: 'csv',
            title: 'Report',
            footer: true
          },
          {
            extend: 'excel',
            title: 'Report',
            footer: true
          }
        ]
      });
    } else {
      console.error("Table #exportTable_{{ $party->id }} not found!");
    }
    @endforeach
  });
</script>
@endsection