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
    @if (empty($orderId))
    <form role="form" method="POST" action="{{ route('voyager.post-order-status') }}">
    {{ csrf_field() }}
        <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
               <tr>
                 <td width="15%">
                   Tình trạng đơn hàng
                 </td>
                 <td width="30%">
                    <select name="status" class="form-control" id="">
                        <option value="0"
                        @if($orders->status == 0) 
                        {
                            selected="selected";
                        }
                        @endif 
                        >Tạo mới</option>
                        <option value="1" 
                        @if($orders->status == 1) 
                        {
                            selected="selected";
                        }
                        @endif
                        >Đang chờ xử lý</option>
                        <option value="2"
                        @if($orders->status == 2) 
                        {
                            selected="selected";
                        }
                        @endif
                        >Hoàn tất</option>
                        <option value="3"
                        @if($orders->status == 3) 
                        {
                            selected="selected";
                        }
                        @endif
                        >Đang vận chuyển</option>
                    </select>
                 </td>
                 <td>
                     <input class="btn-btn-primary" data-token="{{ csrf_token() }}" name="submit" value="Cập nhật" type="submit">
                     <input name="id" type="hidden" value="{{ $orders->id }}">
                 </td>
               </tr>
              </tbody>
            </table>
        </div>
    </form>
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
                                                Anh
                                            : activate to sort column ascending" style="width: 125.139px;">
                                                Ảnh
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                Name
                                            : activate to sort column ascending" style="width: 137.361px;">
                                                Tên sản phẩm
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                Price
                                            : activate to sort column ascending" style="width: 219.583px;">
                                                Giá
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                Quantity
                                            : activate to sort column ascending" style="width: 219.583px;">
                                                Số lượng
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                Total
                                            : activate to sort column ascending" style="width: 140.694px;">
                                                Tổng
                                            </th>
                                            
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                                @foreach($OrderDetail->all() as $od)
                                                <tr>
                                                    <td class="py-1"><img src="{{url('storage/products/'.$od->imgname)}}" alt="IMG" width="100px"></td>
                                                    <td><strong style="font-weight: bold;">{{ $od->name }}</strong><br>
                                                        {{ $od->code }}</td>
                                                    <td>@if($od->price < $od->discount)
                                                        {{ $od->discount}}
                                                        @else
                                                        {{ $od->discount}}
                                                        @endif
                                                    </td>
                                                    <td>{{ $od->quantity}}</td>
                                                    <td>{{ $od->total}}</td>
                                                   
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
    <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="15%">
                <strong>Tổng thanh toán đơn hàng</strong> 
              </th>
            </tr>
          </thead>
          <tbody>
           <tr>
             <td>
               Tổng tiền
             </td>
             <td>
              {{ $orders->total }}
             </td>
           </tr>
          </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="15%">
                <strong>Thông tin khách hàng</strong> 
              </th>
            </tr>
          </thead>
          <tbody>
           <tr>
             <td>
               Tên
             </td>
             <td>{{ $orderShipping->name }}</td>
           </tr>
           <tr>
             <td>
               Số điện thoại
             </td>
             <td>{{ $orderShipping->phone_number}}</td>
           </tr>
           <tr>
             <td>
               Email
             </td>
             <td>{{ $orderShipping->email }}</td>
           </tr>
           <tr>
             <td>
               Địa chỉ giao hàng
             </td>
             <td>{{ $orderShipping->customer_address }}</td>
           </tr>
          </tbody>
        </table>
    </div>
    @endif
@stop
<script>
    $(".deleteVariant").click(function(){
        var id = $(this).data("product_id");
        var token = $(this).data("token");
        $.ajax(
        {
            url: "admin/delete-variants/"+id,
            type: 'POST',
            dataType: "JSON",
            data: {
                "product_id": id,
                "_method": 'DELETE',
                "_token": token,
            },
            success: function ()
            {
                console.log("it Work");
            }
        });

        console.log("It failed");
    });
</script>