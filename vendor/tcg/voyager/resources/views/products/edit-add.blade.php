@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($id) ? 'edit' : 'add')))

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(isset($id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
              action="@if (!empty($id)) {{ route('voyager.post_edit_product') }}
                        @else {{ route('voyager.add_product') }} @endif"
              method="POST" enctype="multipart/form-data" autocomplete="off">
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
                        @if (Session::has('message'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ session('message') }}</li>
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="code">{{ __('voyager::product.code') }}</label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="{{ __('voyager::product.code') }}"
                                       @if(!empty($id)) ? disabled : '' @endif 
                                       value="{{ old('code', $product->code ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('voyager::product.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('voyager::product.name') }}"
                                       value="{{ old('name', $product->name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('voyager::product.category') }}</label>
                                <select class="form-control" name="category[]" multiple>
                                  @foreach(Voyager::model('Category')::all() as $category)
                                    <option value="{{ $category->id }}"
                                        @if(!empty($categories))
                                            @foreach($categories as $cat)
                                                @if(isset($cat->category_id) && $cat->category_id == $category->id) 
                                                    selected="selected" 
                                                    @endif
                                            @endforeach
                                        @endif> 
                                        {{ $category->name }}
                                    </option>
                                  @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('voyager::product.description') }}</label>
                                <textarea class="form-control simplemde" name="description" id="description">{{ old('description', $product->description ?? '') }}</textarea>

                            </div>
                            
                            <div class="form-group">
                                <label for="status">{{ __('voyager::product.status') }}</label><br>
                                <div class="col-sm-4">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="status-hide" value="1" 
                                    @if(!empty($product) && $product->status == 'ACTIVE') 
                                        checked="checked"
                                    @endif
                                    > Enabled
                                  <i class="input-helper"></i></label>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="status-show" value="0"  
                                    @if(!empty($product) && $product->status == 'INACTIVE')
                                        checked="checked"
                                    @endif
                                    > Disabled
                                  <i class="input-helper"></i></label>
                                </div>
                              </div>
                            </div><br>


                            @can('editRoles', $dataTypeContent)
                                <div class="form-group">
                                    <label for="default_role">{{ __('voyager::profile.role_default') }}</label>
                                    @php
                                        $dataTypeRows = $dataType->{(isset($id) ? 'editRows' : 'addRows' )};

                                        $row     = $dataTypeRows->where('field', 'product_belongsto_role_relationship')->first();
                                        $options = $row->details;
                                    @endphp
                                    @include('voyager::formfields.relationship')
                                </div>
                                <div class="form-group">
                                    <label for="additional_roles">{{ __('voyager::profile.roles_additional') }}</label>
                                    @php
                                        $row     = $dataTypeRows->where('field', 'product_belongstomany_role_relationship')->first();
                                        $options = $row->details;
                                    @endphp
                                    @include('voyager::formfields.relationship')
                                </div>
                            @endcan                 
                        </div>
                    </div>
                </div>

            </div>
    
            <button class="btn btn-primary pull-left save" type="submit">{{ __('voyager::product.save') }}</button>

            @if (!empty($id))
            <a href="/admin/edit-product-variant/{{ $id }}" class="btn btn-secondary">
                {{ __('voyager::product.properties') }}
            </a>
            <a href="/admin/edit-product-images/{{ $id }}" class="btn btn-success">
                {{ __('voyager::product.images') }}
            </a>
            @endif
            <a class="btn btn-danger" href="/admin/products">
                {{ __('voyager::product.exit') }}
            </a>
            @if (!empty($id))
            <input type="hidden" name="id" value="{{ $id }}">
            @endif
        </form>

    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
        });
    </script>
@stop
