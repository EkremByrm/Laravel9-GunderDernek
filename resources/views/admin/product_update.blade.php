@extends("layouts.admin")
@section('title','Admin Content')
@section("js")
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
@endsection
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ route("adminhome")}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Ana Sayfa</a>
                <a href="{{ route("admin_product")}}" class="current">İçerikler</a> </div>
            <h1>İçerik Düzenleme</h1>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" action="{{ route('admin_product_update',['id'=>$data->id]) }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label">Kategori</label>
                                    <div class="controls">
                                        <select name="category_id">
                                            @foreach($category_list as $rs)
                                                @if($rs->id == $data->category_id)
                                                    <option selected value="{{ $rs->id }}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                                @else
                                                    <option  value="{{ $rs->id }}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Başlık</label>
                                    <div class="controls">
                                        <input value="{{$data->title}}" required type="text" name="title" class="span11" placeholder="Başlık" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Keywords</label>
                                    <div class="controls">
                                        <input value="{{$data->keywords}}" type="text" name="keywords" class="span11" placeholder="Keywords" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <input value="{{$data->description}}" type="text" name="description" class="span11" placeholder="Description"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Detay</label>
                                    <div class="controls">
                                    <textarea  class="span11"name="detail" >
                                        {{ $data->detail }}
                                    </textarea>
                                        <script>
                                            CKEDITOR.replace( 'detail' );
                                        </script>

                                    </div>
                                </div>
                                <div class="control-group" >
                                    <label class="control-label">Durum</label>
                                    <div class="controls">
                                        <select name="status" >
                                            <option value="True">True</option>
                                            @if($data->status=="False")
                                                <option selected value="False">False</option>
                                            @else
                                                <option value="False">False</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Resim</label>
                                    <div class="controls">
                                        <input  name="image" type="file" />
                                    </div>
                                    @if($data->image)
                                        <div class="controls">
                                        <img width="150px" style="margin:10px;" src="{{ Storage::url($data->image) }}" alt="">
                                        </div>
                                    @endif
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Slug</label>
                                    <div class="controls">
                                        <input value="{{$data->slug}}" type="text" name="slug" class="span11" placeholder="Slug" />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">İçeriği Güncelle</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
@section("css_end")
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/colorpicker.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/datepicker.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/uniform.css" />
    <link rel="stylesheet" href="{{ asset("assets/admin")}}/css/select2.css" />
@endsection
@section("js_end")

    <script src="{{ asset("assets/admin")}}/js/bootstrap-colorpicker.js"></script>
    <script src="{{ asset("assets/admin")}}/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.toggle.buttons.js"></script>
    <script src="{{ asset("assets/admin")}}/js/masked.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.uniform.js"></script>
    <script src="{{ asset("assets/admin")}}/js/select2.min.js"></script>
    <script src="{{ asset("assets/admin")}}/js/matrix.js"></script>
    <script src="{{ asset("assets/admin")}}/js/matrix.form_common.js"></script>
    <script src="{{ asset("assets/admin")}}/js/wysihtml5-0.3.0.js"></script>
    <script src="{{ asset("assets/admin")}}/js/jquery.peity.min.js"></script>
    <script src="{{ asset("assets/admin")}}/js/bootstrap-wysihtml5.js"></script>

@endsection
