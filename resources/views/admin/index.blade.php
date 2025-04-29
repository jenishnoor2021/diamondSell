@extends('layouts.admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h5><u>Today - {{ \Carbon\Carbon::parse(today())->format('d-m-Y') }}</u></h5>
            <p><span style="font-size:20px;font-size:bold;">Cash &nbsp;&nbsp;&nbsp;: </span><span style="font-size:20px;"><?= number_format($todayCash, 2); ?></span></p>
            <p><span style="font-size:20px;font-size:bold;">Online : </span><span style="font-size:20px;"><?= number_format($todayOnline, 2); ?></span></p>
            <p><span style="font-size:20px;font-size:bold;">Check &nbsp;: </span><span style="font-size:20px;"><?= number_format($todayCheck, 2); ?></span></p>
            <hr>
            <p><span style="font-size:20px;font-size:bold;">Total : </span><span style="font-size:20px;"><?= number_format($todayTotal, 2); ?></span></p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$totaldiamond}}</h3>

            <p>Total Diamond - <span class="text-bold" style="font-size:22px;"><?= number_format($total, 2); ?></span></p>
          </div>
          <div class="icon">
            <i class="fa fa-check-square-o"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$pendingdiamond}}</h3>

            <p>Pending Diamond - <span class="text-bold" style="font-size:22px;"><?= number_format($pending, 2); ?></span></p>
          </div>
          <div class="icon">
            <i class="fa fa-arrow-circle-right"></i>
          </div>
          <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$donediamond}}</h3>

            <p>Completed Diamond - <span class="text-bold" style="font-size:22px;"><?= number_format($done, 2); ?></span></p>
          </div>
          <div class="icon">
            <i class="fa fa-arrow-circle-right"></i>
          </div>
          <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->

    </div>
    <!-- /.row -->

    <!-- /.row -->
    <hr style="border:1px solid #000">
    <h3 class="text-primary text-bold">Today Due Date</h3>
    <hr style="border:1px solid #000">
    @if(count($todaylists)>0)
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          @if(Session::get('user')['name'] != 'user')
          <th>Action</th>
          @endif
          <th>Party Name</th>
          <th>Mobile</th>
          <th>Dimond Name</th>
          <th>Status</th>
          <th>Amount</th>
          <th>Sell Date</th>
          <th>Due Date</th>
          <th>Weight</th>
          <th>Shap</th>
          <th>Purity</th>
          <th>Color</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        @foreach($todaylists as $todaylist)
        <tr>
          @if(Session::get('user')['name'] != 'user')
          <td>
            <a href="{{route('admin.diamond.edit', $todaylist->id)}}"><i class="fa fa-edit" style="color:white;font-size:15px;background-color:#0275d8;padding:8px;border-radius:200px;"></i></a>
          </td>
          @endif
          <td>{{$todaylist->parties->fname}}</td>
          <td>{{$todaylist->mobile}}</td>
          <td>{{$todaylist->dimond_name}}</td>
          <td class="text-danger text-bold">{{$todaylist->status}}</td>
          <td>{{$todaylist->amount}}</td>
          <td>{{ \Carbon\Carbon::parse($todaylist->created_at)->format('d-m-Y') }}</td>
          <td>{{ \Carbon\Carbon::parse($todaylist->due_date)->format('d-m-Y') }}</td>
          <td>{{$todaylist->weight}}</td>
          <td>{{$todaylist->shape}}</td>
          <td>{{$todaylist->purity}}</td>
          <td>{{$todaylist->color}}</td>
          <td>@if(strlen($todaylist->description) > 40)
            {!!substr($todaylist->description,0,40)!!}
            <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
            <span class="read-more-content"> {{substr($todaylist->description,40,strlen($todaylist->description))}}
              <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
            @else
            {{$todaylist->description}}
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif

    <!-- /.row -->
    <hr style="border:1px solid #000">
    <h3 class="text-primary text-bold">Old Due Date</h3>
    <hr style="border:1px solid #000">
    @if(count($outdatedlists)>0)
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          @if(Session::get('user')['name'] != 'user')
          <th>Action</th>
          @endif
          <th>Party Name</th>
          <th>Mobile</th>
          <th>Dimond Name</th>
          <th>Status</th>
          <th>Amount</th>
          <th>Sell Date</th>
          <th>Due Date</th>
          <th>Weight</th>
          <th>Shap</th>
          <th>Purity</th>
          <th>Color</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        @foreach($outdatedlists as $outdatedlist)
        <tr>
          @if(Session::get('user')['name'] != 'user')
          <td>
            <a href="{{route('admin.diamond.edit', $outdatedlist->id)}}"><i class="fa fa-edit" style="color:white;font-size:15px;background-color:#0275d8;padding:8px;border-radius:200px;"></i></a>
          </td>
          @endif
          <td>{{$outdatedlist->parties->fname}}</td>
          <td>{{$outdatedlist->mobile}}</td>
          <td>{{$outdatedlist->dimond_name}}</td>
          <td class="text-danger text-bold">{{$outdatedlist->status}}</td>
          <td>{{$outdatedlist->amount}}</td>
          <td>{{ \Carbon\Carbon::parse($outdatedlist->created_at)->format('d-m-Y') }}</td>
          <td>{{ \Carbon\Carbon::parse($outdatedlist->due_date)->format('d-m-Y') }}</td>
          <td>{{$outdatedlist->weight}}</td>
          <td>{{$outdatedlist->shape}}</td>
          <td>{{$outdatedlist->purity}}</td>
          <td>{{$outdatedlist->color}}</td>
          <td>@if(strlen($outdatedlist->description) > 40)
            {!!substr($outdatedlist->description,0,40)!!}
            <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
            <span class="read-more-content"> {{substr($outdatedlist->description,40,strlen($outdatedlist->description))}}
              <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
            @else
            {{$outdatedlist->description}}
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif

    <hr style="border:1px solid #000">
    <h3 class="text-primary text-bold">Tommrow Due Date</h3>
    <hr style="border:1px solid #000">
    @if(count($tomorrowlists)>0)
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          @if(Session::get('user')['name'] != 'user')
          <th>Action</th>
          @endif
          <th>Party Name</th>
          <th>Mobile</th>
          <th>Dimond Name</th>
          <th>Status</th>
          <th>Amount</th>
          <th>Sell Date</th>
          <th>Due Date</th>
          <th>Weight</th>
          <th>Shap</th>
          <th>Purity</th>
          <th>Color</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tomorrowlists as $tomorrowlist)
        <tr>
          @if(Session::get('user')['name'] != 'user')
          <td>
            <a href="{{route('admin.diamond.edit', $tomorrowlist->id)}}"><i class="fa fa-edit" style="color:white;font-size:15px;background-color:#0275d8;padding:8px;border-radius:200px;"></i></a>
          </td>
          @endif
          <td>{{$tomorrowlist->parties->fname}}</td>
          <td>{{$tomorrowlist->mobile}}</td>
          <td>{{$tomorrowlist->dimond_name}}</td>
          <td class="text-danger text-bold">{{$tomorrowlist->status}}</td>
          <td>{{$tomorrowlist->amount}}</td>
          <td>{{ \Carbon\Carbon::parse($tomorrowlist->created_at)->format('d-m-Y') }}</td>
          <td>{{ \Carbon\Carbon::parse($tomorrowlist->due_date)->format('d-m-Y') }}</td>
          <td>{{$tomorrowlist->weight}}</td>
          <td>{{$tomorrowlist->shape}}</td>
          <td>{{$tomorrowlist->purity}}</td>
          <td>{{$tomorrowlist->color}}</td>
          <td>@if(strlen($tomorrowlist->description) > 40)
            {!!substr($tomorrowlist->description,0,40)!!}
            <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
            <span class="read-more-content"> {{substr($tomorrowlist->description,40,strlen($tomorrowlist->description))}}
              <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
            @else
            {{$tomorrowlist->description}}
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif

  </section>
  <!-- /.content -->
</div>

@endsection