@extends('admin.layout.datatable')

@section('pagetitle')
Admin - Ticket Departments
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Create Department</h4>
                </div>
                <form action="{{ route('admin.storedepartment') }}" method="POST">
                    @csrf

                    @method('GET')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="department_name" class="col-sm-3 col-form-label">Department Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="department_name" name="department_name"
                                    placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="departmenttatus" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status">
                                    <option value="active">Publish</option>
                                    <option value="inactive">Draft</option>
                                </select>
                            </div>
                        </div>



                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create Department</button>
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
                    <h4>All Departments</h4>
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
                                    <th>Department Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- {{ $i = 1 }} -->
                                @foreach ($departments as $d => $dept)

                                <tr>

                                    <td>{{ ++$d }}</td>
                                    <td>{{ $dept -> department_name}}</td>


                                    <td>
                                        @if ($dept -> status == 'active')
                                        <div class="badge badge-success badge-shadow">Active</div>
                                        @else 
                                        <div class="badge badge-danger badge-shadow">Inactive</div>
                                        @endif
                                    </td>
                                    <td><a href="#" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a> 
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
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
