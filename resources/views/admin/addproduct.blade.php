@extends('admin.layout.editor')

@section('pagetitle')
Admin - Add Product
@endsection

@section('content')

<style>
    .bootstrap-tagsinput {
        background-color: #fff;
        border: 1px solid #e4e6fc;
        display: inline-block;
        padding: 4px 6px;
        color: #555;
        vertical-align: middle;
        border-radius: 4px;
        max-width: 100%;
        line-height: 22px;
        cursor: text;
        width: 100%
    }

    .bootstrap-tagsinput input {
        border: none;
        box-shadow: none;
        outline: none;
        background-color: transparent;
        padding: 0 6px;
        margin: 0;
        width: auto;
        max-width: inherit;
    }

    .bootstrap-tagsinput.form-control input::-moz-placeholder {
        color: #777;
        opacity: 1;
    }

    .bootstrap-tagsinput.form-control input:-ms-input-placeholder {
        color: #777;
    }

    .bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
        color: #777;
    }

    .bootstrap-tagsinput input:focus {
        border: none;
        box-shadow: none;
    }

    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: white;
    }

    .bootstrap-tagsinput .tag [data-role="remove"] {
        margin-left: 8px;
        cursor: pointer;
    }

    .bootstrap-tagsinput .tag [data-role="remove"]:after {
        content: "x";
        padding: 0px 2px;
    }

    .bootstrap-tagsinput .tag [data-role="remove"]:hover {
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    }


    .upload__inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .upload__btn {
        display: inline-block;
        font-weight: 600;
        color: #fff;
        text-align: center;
        min-width: 116px;
        padding: 5px;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid;
        background-color: #6777ef;
        color: white !important;
        border-radius: 10px;
        line-height: 26px;
        font-size: 14px;
    }

    .upload__btn:hover {

        transition: all 0.3s ease;
    }

    .upload__btn-box {
        margin-bottom: 10px;
    }

    .upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .upload__img-box {
        width: 175px;
        padding: 0 10px;
        margin-bottom: 12px;
    }

    .upload__img-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;
    }

    .upload__img-close:after {
        content: "✖";
        font-size: 14px;
        color: white;
    }

    .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding-bottom: 100%;
    }

</style>

<div class="container">
    <form action="{{ route('admin.addproduct') }}" method="POST">

        @csrf

        @method('GET')
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Name</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Slug</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" class="form-control" name="slug">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Summary</label>
                            <div class="col-sm-12 col-md-8">
                                <textarea name="summary" class="form-control" id="" cols="50" rows="10"></textarea>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Description</label>
                            <div class="col-sm-12 col-md-8">
                                <textarea class="summernote" class="form-control" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Tags</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" value="" name="tags" data-role="tagsinput" placeholder="Add tags" />
                            </div>
                        </div>


                    </div>
                </div>


                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Galley Image</h4>
                    </div>
                    <div class="card-body">

                        <div class="upload__box">
                            <div class="upload__btn-box">
                                <label class="upload__btn">
                                    <span>Upload images</span>
                                    <input type="file" multiple="" data-max_length="7" class="upload__inputfile"
                                        id="upload">
                                </label>
                                <small>Upto 8 images</small>
                            </div>

                            <div class="upload__img-wrap"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Stock Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-left col-12 ">Product SKU</label>
                            <div class="col-sm-12 ">
                                <input type="text" class="form-control" name="sku">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-left col-12 3">Item in Stock</label>
                            <div class="col-sm-12 ">
                                <input type="number" class="form-control" name="stock">
                            </div>
                        </div>

                    </div>
                </div>



                <div class="card">
                    <div class="card-header">
                        <h4>More Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label class="col-form-label text-md-left">Regular Price</label>
                                <input type="number" class="form-control" name="regular">
                            </div>


                            <div class="col-sm-12 col-md-6">
                                <label class="col-form-label text-md-left">Sale Price</label>
                                <input type="number" class="form-control" name="sale">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="form-label">Size</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="size" value="small" class="selectgroup-input-radio" checked>
                                    <span class="selectgroup-button">S</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="size" value="medium" class="selectgroup-input-radio">
                                    <span class="selectgroup-button">M</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="size" value="large" class="selectgroup-input-radio">
                                    <span class="selectgroup-button">L</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="size" value="extralarge" class="selectgroup-input-radio">
                                    <span class="selectgroup-button">XL</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label text-md-left">Pick a Color</label>
                            <input type="color" id="favcolor" name="color" value="#ff0000" class="form-control">
                        </div>

                        
                        <div class="form-group ">
                            <label for="category" class=" col-form-label">Select Category</label>
                            <div class="">
                                <select class="form-control" name="category">
                                    @foreach ($category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Select Sub Category</label>
                            <select class="form-control selectric" name="subcategory" multiple="">
                                @foreach ($subcategory as $scat)
                                    <option value="{{ $scat->id }}">{{ $scat->sub_category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>Primary Image</label>
                            <img id="img-preview" class="mb-4"
                                src="https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png"
                                width="" style="width:100%" />

                            <div class="custom-file">
                                <input type="file" name="primaryimage" class="custom-file-input" id="customFile" onchange="readURL(this)">
                                <label class="custom-file-label" for="customFile">Choose File</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Badge</label>
                            <select class="form-control selectric" multiple="">
                                <option value="onsale">On Sale</option>
                                <option value="featured">Featured</option>
                                <option value="outofstock">Out of Stock</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control selectric" name="status">
                                <option value="inactive">Draft</option>
                                <option value="active">Publish</option>                                
                            </select>
                        </div>

                        <br>
                        <div class="form-group mb-4">

                            <button class="btn btn-success btn-lg w-100">Upload Product</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>




<script>
    //Change this to your no-image file
    let noimage =
        "https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png";

    function readURL(input) {
        console.log(input.files);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#img-preview").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            $("#img-preview").attr("src", noimage);
        }
    }

</script>

@endsection
