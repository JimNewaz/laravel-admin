<h2>State@extends('admin.datatable.template')

@section('pagetitle')
Admin - Add Ticket
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Create Country</h4>
                </div>
                <form action="{{ route('admin.storeticket') }}" method="POST" >
                    @csrf

                    @method('GET')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" placeholder="">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="subtitle" class="col-sm-3 col-form-label">Sub Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="">
                            </div>
                        </div> 

                        

                        <div class="form-group row">
                            <label for="categorystatus" class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="department">
                                @foreach ($departments as $dept)
                                    <option value="{{ $dept -> department_name }}"> {{ $dept -> department_name }}</option>                                    
                                @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="priority" class="col-sm-3 col-form-label">Priority</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="priority">
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                    <option value="urgent">Urgent</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="" cols="30" rows="30"></textarea>                                
                            </div>
                        </div> 

                            
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create Ticket</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
</h2>