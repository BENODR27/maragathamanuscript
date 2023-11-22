@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="font-weight-bold text-primary">APPOINTMENTS</h6> 
        <div>
           <a class="btn btn-success" href="{{route('appointment.browse',['filter'=>'pending'])}}">PENDING</a>
           <a class="btn btn-primary" href="{{route('appointment.browse',['filter'=>'accepted'])}}">ACCEPTED</a>
        <a class="btn btn-warning" href="{{route('appointment.browse',['filter'=>'all'])}}">ALL</a>
        </div>
    </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>Id</th>
                         <th>Name</th>
                         <th>Mode</th>
                         <th>DATE & TIME</th>
                         <th>Status</th>
                         <th>Action</th>
                      
                     </tr>
                 </thead>
                 <tbody>
                    @if(count($appointments)>0)
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{$appointment->id}}</td>
                        <td>{{$appointment->author_name}}</td>
                        <td>{{$appointment->mode}}</td>
                        <td>{{$appointment->dateandtime}}</td>
                        <td> 
                            <a class="btn btn-warning"href="{{route('appointment.toggleStatus',['appointment_id'=>$appointment->id])}}">{{$appointment->status?"ACCEPTED":"PENDING"}}</a>
                        </td>
                        <td>
                            <a class="btn btn-success"href="{{route('appointment.view',['appointment_id'=>$appointment->id])}}">VIEW</a>
                        </td>
                      
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center">
                            NO APPOINTMENTS FOUND
                        </td>
                        
                    </tr>
                    @endif
                    
                    
                 </tbody>
             </table>
         </div>
     </div>
 </div>


</div>
<!-- /.container-fluid -->
@endsection