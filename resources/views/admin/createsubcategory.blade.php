@extends('admin.layout.template')

@section('pagetitle')
Admin - Create Sub Category
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Create Sub Category</h4>
                </div>
                <form action="{{ route('admin.storesubcategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('GET')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="subcategoryname" class="col-sm-3 col-form-label">Sub Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="subcategory" id="subcategoryname" placeholder="Name">
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="categorystatus" class="col-sm-3 col-form-label">Select Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_name">
                                @foreach ($categories as $category)                                    
                                    <option value="{{ $category -> category_name }}"> {{ $category -> category_name }}</option>                                    
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoryimage" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="sub-category-image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categorystatus" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status">
                                    <option value="active">Publish</option>
                                    <option value="inactive">Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create Sub Category</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection