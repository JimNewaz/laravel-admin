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
                    <h4>All Categories</h4>
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
                            <th>Category</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Status</th>                          
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- {{ $i = 1 }} -->
                          @foreach ($categories as $cat => $category)                      
                
                            <tr>
                              <td>
                                {{ ++$cat }}
                              </td>
                              <td>{{ $category -> category_name }}</td>
                              <td>{{ $category -> slug }}</td>
                              <td>                                
                                <img src="{{ asset('storage/category/'.$category -> category_image) }}" alt="" title="" width="40" height="40">
                              </td>
                              
                              <td>
                                @if ($category -> status == 'active')
                                <div class="badge badge-success badge-shadow">Active</div>
                                @else 
                                <div class="badge badge-danger badge-shadow">Inactive</div>
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
