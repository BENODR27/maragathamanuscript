@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">USERS</h6> 
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>Id</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Status</th>
                         <th>Action</th>
                      
                     </tr>
                 </thead>
                 <tbody>
                    @if(count($users)>0)
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a onclick="return confirm('Are you sure you want to change status?');" class="btn btn-{{($user->account_status==1)?"success":"danger"}}"href="{{route('user.status.toggle',['user_id'=>$user->id])}}">{{($user->account_status==1)?"ACTIVE":"INACTIVE"}}</a></td>
                        <td>
                            <a class="btn btn-success"href="{{route('user.edit',['user_id'=>$user->id])}}">EDIT</a>
                            <a class="btn btn-warning"href="{{route('user.view',['user_id'=>$user->id])}}">VIEW</a>
                            <a onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-danger"href="{{route('user.delete',['user_id'=>$user->id])}}">DELETE</a>
                        </td>
                      
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="text-center">
                            NO USERS FOUND
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