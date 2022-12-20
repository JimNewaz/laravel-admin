@extends('admin.layout.template')

@section('pagetitle')
Admin - Create Campaign
@endsection

@section('content')

<style>
    .btn1 {
        padding: 20px;
        margin-bottom: 20px
    }

    .custom-btn {
        height: 80px;
        width: 200px;
        font-size: 16px;
    }

</style>




<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="text-center">Please Select One</h4>
                </div>



                <div class="row justify-content-center">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <div class="btn1 text-center">
                            <button class="btn btn-primary custom-btn" id="product" onclick="func1()">Product
                                Campaign</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="btn1 text-center">
                            <button class="btn btn-success custom-btn" id="campaign" onclick="func2()">General
                                Campaign</button>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>


            </div>
        </div>
    </div>

    <!-- Product Campaign -->
    <div class="row" id="createcampaign" style="display:none">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header text-center">
                    <h4 class="text-center">Create Product Campaign </h4>
                </div>

                <form action="{{ route('admin.storecampaign') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('GET')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputAddress">Select Product</label>
                            <select class="js-example-basic-single form-control" name="state" style="width:100%">
                                <option value="AL">Alabama</option>                       
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Original Price</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Campaign Price</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">No of available units</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">No. of Units for Sale</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">                              
                                <label for="startDate">Start Date</label>
                                <input id="startDate" class="form-control" type="date" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="End Date">End Date</label>
                                <input id="endDate" class="form-control" type="date" />
                            </div>                            
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create Campaign</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <!-- General Campaign -->
    <div class="row" id="generalcampaign" style="display:none">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header text-center">
                    <h4 class="text-center">Create General Campaign </h4>
                </div>

                <form action="{{ route('admin.storecampaign') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('GET')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="campaign_name" class="col-sm-3 col-form-label">Campaign Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="campaign_name" name="campaign_name"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="campaign_subtitle" class="col-sm-3 col-form-label">Campaign Subtitile</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="campaign_subtitle" name="campaign_subtitle"
                                    placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="campaign_image" class="col-sm-3 col-form-label">Campaign Image</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="campaign_image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="campaign_status" class="col-sm-3 col-form-label">Campaign Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status">
                                    <option value="active">Publish</option>
                                    <option value="inactive">Draft</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create Campaign</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

</div>



<script>
    function func1() {

        var general = document.getElementById('generalcampaign');
        general.style.display = "none";

        var decide = document.getElementById('createcampaign');

        if (decide.style.display === "none") {
            decide.style.display = "block";
        } else {
            decide.style.display = "none";
        }
    }

    function func2() {
        var decide = document.getElementById('createcampaign');

        decide.style.display = "none";

        var general = document.getElementById('generalcampaign');



        if (general.style.display === "none") {
            general.style.display = "block";
        } else {
            general.style.display = "none";
        }
    }

</script>

@endsection
