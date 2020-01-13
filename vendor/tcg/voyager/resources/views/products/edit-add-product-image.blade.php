@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($id) ? 'edit' : 'add')))

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        Edit Product Image
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
              action="{{ route('voyager.post_image_product') }}"
              method="POST" enctype="multipart/form-data" autocomplete="off">
              <input type="hidden" value="{{ $id }}" name="id">
            <!-- PUT Method if we are editing -->
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                    {{-- <div class="panel"> --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="properties_size">{{ __('voyager::product.properties_color') }}</label>
                                <select class="form-control"name="color">
                                    @foreach($colors as $color)
                                        <option value="{{ $color->id }}">
                                            {{ $color->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">{{ __('voyager::product.image') }}</label>
                                <input type="file" class="form-control" id="image" name="image" placeholder="{{ __('voyager::product.image') }}"
                                       value="{{ old('image', $dataTypeContent->image ?? '') }}">
                            </div>
                            
                            <br>
                        </div>
                       <!------Table list image-->
                        <div class="page-content container-fluid">
                            @include('voyager::alerts')
                            <div class="row">
                                <div class="col-md-12">

                                    <table class="table table-striped database-tables">
                                        <thead>
                                            <tr>
                                                <th>{{ __('voyager::product.properties_color') }}</th>
                                                <th>{{ __('voyager::product.image') }}</th>
                                            </tr>
                                        </thead>

                                        @if(!empty($imageData))
                                            @foreach($imageData as $data)
                                                @if(!empty($data['images']))
                                                <tr>
                                                    <td>
                                                        <h3>
                                                        {{$data['name']}}
                                                        </h3>
                                                    </td>
                                                
                                                    <td id="images">
                                                    @foreach($data['images'] as $image)
                                                        <img src="{{url('storage/products/'.$image->name)}}" width="300px" height="300px" alt="">
                                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" 
                                                         data-id="{{ $image->product_id,$image->property_id,$image->ordering }}" 
                                                         data-token="{{ csrf_token() }}" href="/admin/delete-product-images/{{$image->id}}" 
                                                         class="btn btn-danger btn-social-outline deleteImage">
                                                        X</a>
                                                        <input type="radio" onclick="setDefault(this);" class="form-check-input"   
                                                                data-property-id="{{ $image->property_id }}" data-token="{{ csrf_token() }}" data-product-id="{{ $image->product_id }}" data-image-id="{{ $image->id }}"
                                                                @if ($image->is_default == 1) checked="" @endif
                                                                >
                                                    @endforeach
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary pull-left save">
                {{ __('voyager::product.save') }}
            </button>&nbsp;&nbsp;&nbsp;
            <a href="/admin/edit-product/{{$id}}" class="btn btn-danger exit">
                {{ __('voyager::product.exit') }}
            </a>
        </form>
    </div>
@stop
