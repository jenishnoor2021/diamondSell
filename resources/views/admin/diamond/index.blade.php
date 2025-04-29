@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Diamond List
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Diamond</li>
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
                     <a href="{{route('admin.diamond.create')}}" class="bg-primary text-white text-decoration-none" style="padding:12px 12px;margin-left:20px"><i class="fa fa-plus editable" style="font-size:15px;">&nbsp;ADD</i></a>
                  </div>
                  <div class="col-md-3">
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="overflow-x:auto;margin-top:15px">
                  @if(count($diamonds)>0)
                  <table id="diamondtable" class="table table-bordered table-striped">
                     <thead class="bg-primary">
                        <tr>
                           <th>Action</th>
                           <th>Party Name</th>
                           <th>Mobile</th>
                           <th>Dimond Name</th>
                           <th>Status</th>
                           <th>Amount</th>
                           <th>Sell Date</th>
                           <th>Plane Name</th>
                           <th>Due Date</th>
                           <th>Payment Type</th>
                           <th>Payment Date</th>
                           <th>Weight</th>
                           <th>Shap</th>
                           <th>Purity</th>
                           <th>Color</th>
                           <th>Description</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($diamonds as $diamond)
                        <tr>
                           <td>
                              <a href="{{route('admin.diamond.edit', $diamond->id)}}"><i class="fa fa-edit" style="color:white;font-size:15px;background-color:#0275d8;padding:8px;border-radius:200px;"></i></a>
                              <a href="{{route('admin.diamond.destroy', $diamond->id)}}" onclick="return confirm('Sure ! You want to delete this ?');"><i class="fa fa-trash" style="color:white;font-size:15px;background-color:red;padding:8px;border-radius:200px;"></i></a>
                           </td>
                           <td>{{$diamond->parties->fname}}</td>
                           <td>{{$diamond->mobile}}</td>
                           <td>{{$diamond->dimond_name}}</td>
                           <td class="text-bold {{$diamond->status == 'Done' ? 'text-success' : 'text-danger'}}">{{$diamond->status}}</td>
                           <td>{{$diamond->amount}}</td>
                           <td>{{ $diamond->created_at->format('d-m-Y') }}</td>
                           <td>{{$diamond->planes->pname}}</td>
                           <td>{{ \Carbon\Carbon::parse($diamond->due_date)->format('d-m-Y') }}</td>
                           <td>{{$diamond->payment_type}}</td>
                           <td>{{ \Carbon\Carbon::parse($diamond->payment_date)->format('d-m-Y') }}</td>
                           <td>{{$diamond->weight}}</td>
                           <td>{{$diamond->shape}}</td>
                           <td>{{$diamond->purity}}</td>
                           <td>{{$diamond->color}}</td>
                           <td>@if(strlen($diamond->description) > 40)
                              {!!substr($diamond->description,0,40)!!}
                              <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                              <span class="read-more-content"> {{substr($diamond->description,40,strlen($diamond->description))}}
                                 <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                              @else
                              {{$diamond->description}}
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