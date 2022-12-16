@extends('admin.layout.template')

@section('pagetitle')
Admin - Add Ticket
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Create Brand</h4>
                </div>
                <form action="{{ route('admin.storebrands') }}" method="POST" >
                    @csrf

                    @method('GET')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="categoryname" class="col-sm-3 col-form-label">Brand Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="categoryname" name="brand_name" placeholder="Name">
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
