@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($id) ? 'edit' : 'add')))

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        Edit Variant
    </h1>
@stop

@section('content')
    @include('voyager::products/edit-variant')
    @if (empty($variantId))
    <div class="row col-md-12">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="dataTable" class="table table-hover dataTable no-footer" role="grid" aria-describedby="dataTable_info">
                                    <thead>
                                        <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                Code
                                            : activate to sort column ascending" style="width: 125.139px;">
                                                Code
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                Name
                                            : activate to sort column ascending" style="width: 137.361px;">
                                                Stock
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                Description
                                            : activate to sort column ascending" style="width: 219.583px;">
                                                Pricce
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                Description
                                            : activate to sort column ascending" style="width: 219.583px;">
                                                Discount
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                Status
                                            : activate to sort column ascending" style="width: 140.694px;">
                                                Status
                                            </th>
                                            <th class="actions text-right sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 159.583px;">Actions</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                                @foreach($variants->all() as $var)
                                                <tr>
                                                    <td>{{ $var->code }}</td>
                                                    <td>{{ $var->stock }}</td>
                                                    <td>{{ $var->price}}</td>
                                                    <td>{{ $var->discount}}</td>
                                                    <td>{{ $var->status}}</td>
                                                    <td>
                                                        <a class="btn btn-success" href="/admin/edit-variant/{{ $var->id }}">Edit<a>
                                                        <a class="btn btn-danger" href="#">Delete<a>
                                                    </td>
                                                </a>
                                                @endforeach
                                        </tr></tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@stop
