@extends('admin.layout.datatable')

@section('pagetitle')
Admin - All Sub Categories
@endsection

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                  <div class="card-header">
                    <h4>All Sub Categories</h4>
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
                            <th>
                              #
                            </th>
                            <th>Sub Category</th>
                            <th>Category</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Status</th>                          
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- {{ $i = 1 }} -->
                        @foreach ($subcategories as $subcategory)
                          <tr>
                            <td>
                              {{ $i }}
                            </td>
                            <td>{{ $subcategory->sub_category_name }}</td>
                            <td>{{ $subcategory->category_name }}</td>
                            <td>{{ $subcategory -> slug }}</td>
                            <td>
                            <img src="{{ asset('storage/sub-category/'.$subcategory -> sub_category_image) }}" alt="" title="" width="40" height="40">
                            </td>
                            
                            <td>
                              @if ($subcategory -> status == 'active')
                                <div class="badge badge-success badge-shadow">Active</div>
                                @else 
                                <div class="badge badge-danger badge-shadow">Inactive</div>
                                @endif
                            </td>
                            <td><a href="#" class="btn btn-primary">Detail</a></td>
                          </tr>     
                          {{ $i++ }}        
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