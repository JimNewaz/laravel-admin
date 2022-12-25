@extends('admin.layout.template')

@section('pagetitle')
Admin - Add Coupon
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Create Coupon</h4>
                </div>
                <form action="{{ route('admin.storecoupon') }}" method="POST" >
                    @csrf

                    @method('GET')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Coupon Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" placeholder="">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="code" class="col-sm-3 col-form-label">Coupon Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="code" name="code" placeholder="">
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="priority" class="col-sm-3 col-form-label">Discount on</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="dis" name="discounton" onchange="showDiv()">
                                    <option value="products">All Products</option>
                                    <option value="sproducts">Specific Product</option>
                                    <option value="category">Category</option>        
                                    <option value="subcategory">Sub Category</option>            
                                </select>
                            </div>
                        </div>                      

                        <script>
                            function showDiv(){                                
                                var e = document.getElementById("dis").value;
                                console.log(e);

                                if(e == 'products'){
                                    document.getElementById('products').style.display = 'none';
                                    document.getElementById('category').style.display = 'none';
                                    document.getElementById('subcategory').style.display = 'none';
                                }

                                if(e == 'sproducts'){
                                    document.getElementById('products').style.display = 'block';
                                    document.getElementById('category').style.display = 'none';
                                    document.getElementById('subcategory').style.display = 'none';
                                }
                                if(e == 'category'){
                                    document.getElementById('category').style.display = 'block';
                                    document.getElementById('products').style.display = 'none';
                                    document.getElementById('subcategory').style.display = 'none';
                                }
                                if(e == 'subcategory'){
                                    document.getElementById('subcategory').style.display = 'block';
                                    document.getElementById('category').style.display = 'none';
                                    document.getElementById('products').style.display = 'none';
                                }
                                
                            }
                        </script>

                        <!-- Categories -->
                        <div id="category" style="display:none">
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="category">
                                        @foreach ($category as $cat)
                                        <option value="{{ $cat -> category_name }}">{{ $cat -> category_name }}</option>   
                                        @endforeach                                                 
                                    </select>
                                </div>
                            </div> 
                        </div>

                        <!-- Sub Categories -->

                        <div id="subcategory" style="display:none">
                            <div class="form-group row">
                                <label for="subcategory" class="col-sm-3 col-form-label">Sub Category</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="subcategory">
                                        @foreach ($subcategory as $scat)
                                            <option value="{{ $scat -> sub_category_name }}">{{ $scat -> sub_category_name }}</option>   
                                        @endforeach                                             
                                    </select>
                                </div>
                            </div> 
                        </div>
                        
                        <!-- Products -->

                        <div id="products" style="display:none">
                            <div class="form-group row">
                                <label for="product" class="col-sm-3 col-form-label">Products</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="product">
                                        <option value="product">All Products</option>                                                
                                    </select>
                                </div>
                            </div> 
                        </div>

                        

                        <div class="form-group row">
                            <label for="priority" class="col-sm-3 col-form-label">Coupon Type</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="type">
                                    <option value="percentage">Percentage</option>
                                    <option value="fixed">Fixed Price</option>                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="discount" class="col-sm-3 col-form-label">Discount</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="discount" name="discount" placeholder="">
                            </div>
                        </div>                         

                        <div class="form-group row">
                            <label for="exdate" class="col-sm-3 col-form-label">Expire Date</label>
                            <div class="col-sm-9">
                                <input id="exdate" name="exdate" class="form-control" type="date" />
                            </div>                            
                        </div>
                        

                        <div class="form-group row">
                            <label for="priority" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>                                   
                                </select>
                            </div>
                        </div>                       
                            
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create Coupon</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
