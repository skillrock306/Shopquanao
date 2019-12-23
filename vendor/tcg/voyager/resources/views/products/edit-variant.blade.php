<div class="page-content container-fluid">
    <form class="form-edit-add" role="form"
          action="{{ $variantId ? route('voyager.post_variant') : route('voyager.post_variant_product') }}"
          method="POST" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
        @if ($variantId)
            <input type="hidden" name="variantId" value="{{$variantId}}">
        @else
            <input type="hidden" name="id" value="{{$id}}">
        @endif

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
                    @if(!empty($productVariant))
                        <div class="form-group">
                            <label for="code">{{ __('voyager::product.code') }}</label>
                            <input type="text" disabled="" 
                                    class="form-control" id="code" name="code" placeholder="{{ __('voyager::product.code') }}"
                                   value="{{ $productVariant ? $productVariant->code : '' }}">
                        </div>
                    @endif
                        <div class="form-group">
                            <label for="properties_size">{{ __('voyager::product.properties_size') }}</label>
                            <select class="form-control" @if(!empty($productVariant))
                                                        {
                                                            disabled=""; 
                                                        }
                                                        @endif 
                            name="size">
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}" {{ ($variantSizeData && $variantSizeData->property_id == $size->id) ? 'selected="selected' : '' }}>
                                        {{ $size->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="properties_color">{{ __('voyager::product.properties_color') }}</label>
                            <select  @if(!empty($productVariant))
                            {
                                disabled=""; 
                            }
                            @endif  class="form-control"name="color">
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}" {{ ($variantColorData && $variantColorData->property_id == $color->id) ? 'selected="selected' : '' }}>
                                        {{ $color->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                         
                        <div class="form-group">
                            <label for="stock">{{ __('voyager::product.stock') }}</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="{{ __('voyager::product.stock') }}"
                                   value="{{ $productVariant ? $productVariant->stock : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="price">{{ __('voyager::product.price') }}</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="{{ __('voyager::product.price') }}"
                                   value="{{ $productVariant ? $productVariant->price : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="discount">{{ __('voyager::product.discount') }}</label>
                            <input type="text" class="form-control" id="discount" name="discount" placeholder="{{ __('voyager::product.discount') }}"
                                   value="{{ $productVariant ? $productVariant->discount : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="status">{{ __('voyager::product.status') }}</label><br>
                            <div class="col-sm-4">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="status-hide" value="INACTIVE" {{ ($productVariant && $productVariant->status == 'INACTIVE') ? 'checked="checked"' : '' }}> Ẩn
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="status-show" value="ACTIVE" {{ ($productVariant && $productVariant->status == 'ACTIVE') ? 'checked="checked"' : '' }}> Hiện
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div><br>
                    </div>
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary pull-left save">
            {{ __('voyager::product.save') }}
        </button>&nbsp;&nbsp;&nbsp;
        @if ($productVariant)
            <a class="btn btn-danger" href="/admin/edit-product-variant/{{$productVariant->product_id}}">{{ __('voyager::product.exit') }}</a>
        @else
            <a class="btn btn-danger" href="/admin/edit-product/{{$id}}">{{ __('voyager::product.exit') }}</a>
        @endif
    </form>
</div>
