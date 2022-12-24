@extends('admin.layout.datatable')

@section('pagetitle')
Admin - All Coupons
@endsection

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                  <div class="card-header">
                    <h4>All Coupons</h4>
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
                            
                            <th>Coupon Title</th>
                            <th>Coupon Code</th>
                            <th>Discount On</th>
                            <th>Specific</th>
                            <th>Discount</th>  
                            <th>Coupon Type</th>    
                                               
                            <th>Expire Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          @foreach($coupons as $coupon)                      
                
                            <tr>
                              
                              <td>{{ $coupon -> title }}</td>
                              <td>{{ $coupon -> code }}</td>
                              <td>{{ $coupon -> discounton }}</td>
                              <td>{{ $coupon -> specificc }}</td>
                              <td>{{ $coupon -> discount }}%</td>
                              <td>{{ $coupon -> type }}</td>
                              <td>{{ $coupon -> exdate }}</td>                             
                              
                              <td>
                                @if ($coupon  -> status == 'active')
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
