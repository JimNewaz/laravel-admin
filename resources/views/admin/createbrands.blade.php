@extends('admin.layout.template')

@section('pagetitle')
Admin - Create Brands 
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Create Brands</h4>
                </div>
                <form action="" method="POST">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="categoryname" class="col-sm-3 col-form-label">Brand Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="categoryname" placeholder="Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoryimage" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control">
                            </div>
                        </div>

                       
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create Brand</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
