@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">APPOINTMENT-ID-{{$appointment->id}}</h6> 
     </div>
     <div class="card-body">       
          <ul class="list-group pt-3">
            <a href="#" class="list-group-item list-group-item-action active">
DETAILS              </a>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                AUTHOR NAME
                <span class="badge badge-primary badge-pill p-2">{{$appointment->author_name}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                VIEW USER
                <span class="badge badge-primary badge-pill p-2 "> <a class="btn text-white"href="{{route('user.view',['user_id'=>$appointment->user_id])}}">VIEW</a></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                APPOINTMENT FOR
                <span class="badge badge-primary badge-pill p-2">{{$appointment->for}}</span>
              </li>
           
              <li class="list-group-item d-flex justify-content-between align-items-center">
                MODE
                <span class="badge badge-primary badge-pill p-2">{{$appointment->mode}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                DATE AND TIME
                <span class="badge badge-primary badge-pill p-2">{{$appointment->dateandtime}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                STATUS
                <span class="badge badge-primary badge-pill p-2">        
                 <a class="btn text-white"href="{{route('appointment.toggleStatus',['appointment_id'=>$appointment->id])}}">{{$appointment->status?"ACCEPTED":"PENDING"}}</a>
                </span>
              </li>
           
             
            
          </ul>
        
     </div>
 </div>


</div>
<!-- /.container-fluid -->
@endsection