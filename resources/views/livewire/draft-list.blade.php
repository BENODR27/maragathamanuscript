
        @foreach($works as $work)
        <div >
            <div class="col-md-12">
                <div class="card text-center mt-2">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                           
                            <li class="nav-item">
                                <a href="#home" class="nav-link titlenav" data-bs-toggle="tab">SUBMISSION ID: {{$work->id}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home">
                                <h5 class="card-title">{{$work->title}}</span> </h5>
                                <a href="{{route('draft.edit',["work_id"=>$work->id])}}" class="btn btn-primary m-2">CONTINUE</a>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        @endforeach

