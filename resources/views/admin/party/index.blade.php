@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Party List
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Party</li>
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
                     <a href="{{route('admin.party.create')}}" class="bg-primary text-white text-decoration-none" style="padding:12px 12px;margin-left:20px"><i class="fa fa-plus editable" style="font-size:15px;">&nbsp;ADD</i></a>
                  </div>
                  <div class="col-md-3">
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="overflow-x:auto;margin-top:15px">
                  @if(count($partys)>0)
                  <table id="partytable" class="table table-bordered table-striped">
                     <thead class="bg-primary">
                        <tr>
                           <th>Action</th>
                           <th>Party id</th>
                           <th>Name</th>
                           <th>Party code</th>
                           <th>Address</th>
                           <th>Mobile no</th>
                           <th>Aadhar no</th>
                           <th>Active/De-active</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($partys as $party)
                        <tr>
                           <td>
                              <a href="{{route('admin.party.edit', $party->id)}}"><i class="fa fa-edit" style="color:white;font-size:15px;background-color:#0275d8;padding:8px;border-radius:200px;"></i></a>
                              <a href="{{route('admin.party.destroy', $party->id)}}" onclick="return confirm('Sure ! You want to delete this ?');"><i class="fa fa-trash" style="color:white;font-size:15px;background-color:red;padding:8px;border-radius:200px;"></i></a>
                           </td>
                           <td>{{$party->id}}</td>
                           <td>{{$party->fname}}</td>
                           <td>{{$party->party_code}}</td>
                           <td>@if(strlen($party->address) > 40)
                              {!!substr($party->address,0,40)!!}
                              <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                              <span class="read-more-content"> {{substr($party->address,40,strlen($party->address))}}
                                 <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                              @else
                              {{$party->address}}
                              @endif
                           </td>
                           <td>{{$party->mobile}}</td>
                           <td>{{$party->aadhar_no}}</td>
                           <td>
                              @if($party->is_active == 1)
                              <a href="/admin/party/active/{{$party->id}}" class="btn btn-success">Active</a>
                              @else
                              <a href="/admin/party/active/{{$party->id}}" class="btn btn-danger">De-active</a>
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