@extends('admin.layout.datatable')

@section('pagetitle')
Admin - All Products
@endsection

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                  <div class="card-header">
                    <h4>All Products</h4>
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
                            <th>Name</th>
                            <th>Category</th>                            
                            <th>Price</th>
                            
                            <th>Image</th>
                            <th>Status</th>                          
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- {{ $i = 1 }} -->
                          @foreach ($products as $pro => $product)                      
                
                            <tr>
                              <td>
                                {{ ++$pro }}
                              </td>
                              <td>{{ $product -> name }}</td>
                              <td>{{ $product -> category }}</td>
                              <td>{{ $product -> regular_price}}</td>
                              
                              <td>                                
                                <img src="{{ asset('storage/products/'.$product -> primaryimage) }}" alt="" title="" width="100" height="100">
                              </td>
                              
                              <td>
                                @if ($product -> status == 'active')
                                <div class="badge badge-success badge-shadow">Active</div>
                                @else 
                                <div class="badge badge-danger badge-shadow">Inactive</div>
                                @endif
                              </td>
                              <td>
                                <a href="#" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a> 
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
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
