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
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Brand</th>
                            <th>Image</th>
                                              
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              1
                            </td>
                            <td>Category Phone</td>
                            
                            <td>
                              <img alt="image" src="" width="35">
                            </td>
                            
                            
                            <td><a href="#" class="btn btn-primary">Detail</a></td>
                          </tr>
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
        </div>       
    </div>
</div>



@endsection
