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
                            {{-- <a class="btn btn-warning"href="{{route('appointment.toggleStatus',['appointment_id'=>$appointment->id])}}">{{$appointment->status?"ACCEPTED":"PENDING"}}</a> --}}
                     <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$appointment->id}}">
    {{$appointment->status?"ACCEPTED":"NOT ACCEPTED"}}
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Appontment{{$appointment->id}} status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <form method="post" action="{{route('appointment.toggleStatus',['appointment_id'=>$appointment->id])}}">
                @csrf
            
                <div class="form-group">
                    <select name="status" required class="form-control" aria-label="Default select example">
                        <option selected value="">Change status</option>
                        <option value="Accept">Accept</option>
                        <option value="Reject">Reject</option>
                      </select>
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
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