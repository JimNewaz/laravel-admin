@extends('admin.layout.datatable')

@section('pagetitle')
Admin - All Users
@endsection

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Users</h4>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- {{ $i = 1 }} -->
                                @foreach ($users as $r => $user)

                                <tr>
                                    <td>
                                        {{ ++$r }}
                                    </td>
                                    <td>{{ $user -> name }}</td>
                                    <td>{{ $user -> email }}</td>
                                    
                                    <td>
                                        <a href="#" data-toggle="modal"
                                            data-target="{{ '#Edit' . $user->id . 'CategoryModal' }}"
                                            class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>




                                <div class="modal fade" id="{{ 'Edit' . $user->id . 'CategoryModal'  }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $user->id }}

                                                <form action="{{ route('admin.updatecategory', $user->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <!-- <input type="hidden" name="_method" value="put"> -->
                                                    @method('GET')
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="categoryname"
                                                                class="col-sm-3 col-form-label">Category Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="categoryname" name="category_name"
                                                                    placeholder="Name" value="{{ $user -> name }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="categoryimage"
                                                                class="col-sm-3 col-form-label">Image</label>
                                                            <div class="col-sm-9">
                                                                <input type="file" class="form-control"
                                                                    name="category_image">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="categorystatus"
                                                                class="col-sm-3 col-form-label">Status</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="status">
                                                                    <option value="active">Publish</option>
                                                                    <option value="inactive">Draft</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Create
                                                            Category</button>
                                                    </div>
                                                </form>


                                            </div>
                                            <div class="modal-footer bg-whitesmoke br">
                                                <button type="button" class="btn btn-primary">Save</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



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
