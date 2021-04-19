@extends('layouts.master')
@section('title','Ürün')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Ürün Listesi</span>
                </h3>
            
            </div>
            <div class="card-body">
         
                <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="myTable" aria-describedby="kt_datatable_info" role="grid" style="width: 1231px;">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Record ID: activate to sort column descending" ># ID</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" >Ürün Adı</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">İŞLEMLER</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="odd">
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td nowrap="nowrap">
                                    <a href="" class="btn btn-sm btn-clean btn-icon" title="Edit details" data-toggle="modal" data-target="#exampleModal-{{$product->id}}">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <a href="{{route('product.destroy',$product->id)}}" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                        <i class="la la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{$product->product_name}} | Firmasını Düzenleyin.</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label><strong>Firma Adı:</strong></label>
                                                    <input class="form-control form-control-solid" name="product_name" type="text" value="{{ $product->product_name }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button  class="btn btn-primary font-weight-bold" name="upload" type="submit">Güncelle</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> 
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom card-stretch ">
            <div class="card-header">
                <h3 class="card-title">Ürün İşlemleri</h3>
            </div>
            <form class="form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-md-center">
                    <div class="col-md-10">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li><b>{{ $error }}</b></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label><strong>Ürün Adı:</strong></label>
                                <input class="form-control form-control-solid" name="product_name" type="text">
                            </div>
                     
                        </div>
                        <div class="card-footer d-flex justify-content-lg-end">
                            <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                            <button type="reset" class="btn btn-secondary">İptal Et</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('footer')
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            columns: [
                null,
                null,
                { orderable: false }
            ],
            "language": {
                "lengthMenu": "_MENU_ sayfa başına adet",
                "zeroRecords": "Kayıt bulunamadı!",
                "info": "_PAGE_ sayfasındasın.",
                "infoEmpty": "Kayıt Bulunamadı!",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search":         "Arama:",
                "paginate": {
                    "first":      "İlk",
                    "last":       "Son",
                    "next":       "Sonraki",
                    "previous":   "Önceki"
                }
            },
            responsive: true

        });
    } );
</script>
@endsection