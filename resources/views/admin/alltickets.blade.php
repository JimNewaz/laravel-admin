@extends('admin.layout.datatable')

@section('pagetitle')
Admin - All Tickets
@endsection

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                  <div class="card-header">
                    <h4>All Tickets</h4>
                  </div>

                  @if (session()->has('message'))
                    <div class="alert alert-success">
                      {{ session()->get('message')}}
                    </div>

                  @endif

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="">
                              #
                            </th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Department</th>
                            <th>Description</th>                          
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>        
                                             
                          @foreach ($ticket as $tic => $tickets)                      
                
                            <tr>
                              <td>
                                {{ ++$tic }}
                              </td>
                              <td>{{ $tickets -> title }}</td>
                              <td>{{ $tickets -> subtitle }}</td>
                              <td>{{ $tickets -> department }}</td>
                              <td>{{ $tickets -> description }}</td>
                              <td>

                                @if ($tickets -> priority == 'high')
                                    <div class="badge badge-info badge-shadow">High</div>
                                    @elseif($tickets -> priority == 'medium') 
                                    <div class="badge badge-warning badge-shadow">Medium</div>
                                    @elseif($tickets -> priority == 'low') 
                                    <div class="badge badge-primary badge-shadow">Low</div>
                                    @else 
                                    <div class="badge badge-danger badge-shadow">Urgent</div>
                                @endif

                              </td>
                              <td>
                                @if ($tickets -> status == 'open')
                                <div class="badge badge-success badge-shadow">Open</div>
                                @else 
                                <div class="badge badge-danger badge-shadow">Close</div>
                                @endif
                              </td>
                              <td><a href="#" class="btn btn-primary">Detail</a></td>
                            </tr>

                          

                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
        </div>       
    </div>
</div>



@endsection
