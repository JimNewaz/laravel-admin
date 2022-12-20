@extends('admin.layout.template')

@section('pagetitle')
Admin - Add Subscriber
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Add New Subscriber</h4>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('admin.storesubscriber') }}" method="POST">
                    @csrf

                    @method('GET')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Enter Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                            </div>
                        </div>                   
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Add Subscriber</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
