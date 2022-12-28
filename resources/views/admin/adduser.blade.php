@extends('admin.layout.datatable')

@section('pagetitle')
Admin - All Admins
@endsection

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Admins</h4>
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
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- {{ $i = 1 }} -->
                                @foreach ($role as $r => $rol)

                                <tr>
                                    <td>
                                        {{ ++$r }}
                                    </td>
                                    <td>{{ $rol -> name }}</td>
                                    <td>{{ $rol -> email }}</td>
                                    <td>
                                        
                                    </td>

                                    <td>
                                       
                                    </td>
                                    <td>
                                        <a href="#" data-toggle="modal"
                                            data-target="{{ '#Edit' . $rol->id . 'CategoryModal' }}"
                                            class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>




                                <div class="modal fade" id="{{ 'Edit' . $rol->id . 'CategoryModal'  }}"
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
                                                {{ $rol->id }}

                                                <form action="{{ route('admin.updatecategory', $rol->id) }}" method="POST"
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
                                                                    placeholder="Name" value="{{ $rol -> name }}">
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
