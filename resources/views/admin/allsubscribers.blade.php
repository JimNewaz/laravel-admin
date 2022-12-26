@extends('admin.layout.datatable')

@section('pagetitle')
Admin - All Subscribers
@endsection

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Subscribers</h4>
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
                                    <th>Email</th>
                                    <th>Action</th>
                                    <th>Send Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- {{ $i = 1 }} -->
                                @foreach ($subscriber as $s => $sub)

                                <tr>
                                    
                                    <td>{{ ++$s }}</td>
                                    <td>{{ $sub -> email}}</td>


                                    <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    <td><a href="#" class="btn btn-success">Send Email</a></td>
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
