@extends('admin.layout.datatable')

@section('pagetitle')
Admin - All Campaigns
@endsection

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header ">
                    <h4>All General Campaigns</h4>
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
                                    <th>Campaign Name</th>
                                    <th>Campaign Subtitle</th>
                                    <th>Campaign Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- {{ $i = 1 }} -->
                                @foreach ($generalcampaign as $camp => $campaign)

                                <tr>
                                    <td>
                                        {{ ++$camp }}
                                    </td>
                                    <td>{{ $campaign->campaign_name }}</td>
                                    <td>{{ $campaign->campaign_subtitle }}</td>
                                    <td>
                                        <img src="{{ asset('storage/campaign/'.$campaign -> campaign_image) }}" alt=""
                                            title="" width="40" height="40">
                                    </td>

                                    <td>                                        
                                        @if ($campaign -> status == 'active')
                                        <div class="badge badge-success badge-shadow">Active</div>
                                        @else 
                                        <div class="badge badge-danger badge-shadow">Inactive</div>
                                        @endif
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


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header ">
                    <h4>All Product Campaigns</h4>
                </div>

                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message')}}
                </div>

                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                            <thead>
                                <tr>
                                    <th class="">
                                        #
                                    </th>
                                    <th>Campaign Name</th>
                                    <th>Campaign Subtitle</th>
                                    <th>Campaign Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- {{ $i = 1 }} -->
                                @foreach ($generalcampaign as $camp => $campaign)

                                <tr>
                                    <td>
                                        {{ ++$camp }}
                                    </td>
                                    <td>{{ $campaign->campaign_name }}</td>
                                    <td>{{ $campaign->campaign_subtitle }}</td>
                                    <td>
                                        <img src="{{ asset('storage/campaign/'.$campaign -> campaign_image) }}" alt=""
                                            title="" width="40" height="40">
                                    </td>

                                    <td>                                        
                                        @if ($campaign -> status == 'active')
                                        <div class="badge badge-success badge-shadow">Active</div>
                                        @else 
                                        <div class="badge badge-danger badge-shadow">Inactive</div>
                                        @endif
                                    </td>
                                    <td>
                                    <a href="#" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a> 
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
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
