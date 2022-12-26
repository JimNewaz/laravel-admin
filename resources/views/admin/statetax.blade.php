@extends('admin.layout.datatable')

@section('pagetitle')
Admin - State Tax
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Add New StateTax</h4>
                </div>
                <form action="{{ route('admin.storestatetax') }}" method="POST">
                    @csrf

                    @method('GET')
                    <div class="card-body">                        

                        <div class="form-group row">
                            <label for="state" class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                                <input type="text" name="state" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="percentage" class="col-sm-3 col-form-label">Percentage</label>
                            <div class="col-sm-9">
                                <input type="number" name="percentage" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add Tax</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>All State Taxes</h4>
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
                                    <th>#</th>                                
                                    <th>State</th>
                                    <th>Tax</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($tax as $c => $cou)

                                <tr>
                                    <td>{{ ++$c }} </td>
                                    
                                    <td>{{ $cou -> state}}</td>


                                    <td>
                                        {{ $cou -> percentage}}%
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
