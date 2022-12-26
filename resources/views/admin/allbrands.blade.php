@extends('admin.layout.datatable')
@section('pagetitle')
Admin - All Brands 
@endsection
@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                  <div class="card-header">
                    <h4>All Brands</h4>
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
                            <th>Brand</th>
                            <th>Total Product Count</th>
                                              
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- {{ $i=1 }} -->
                          @foreach($brands as $brand => $br)
                          <tr>
                            <td>
                              {{ ++$brand }}
                            </td>
                            <td>{{ $br -> brand_name }}</td>
                            
                            <td>
                            {{ $br -> product_count }}
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
