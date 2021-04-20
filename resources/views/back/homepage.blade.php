@extends('layouts.master')
@section('title','Anasayfa')
@section('content')
<div class="row" >
    <div class="col-md-8">
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Domain Listesi</span>
                </h3>
            </div>
            <div class="card-body">

                <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="myTable" aria-describedby="kt_datatable_info" role="grid" style="width: 1231px;">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Record ID: activate to sort column descending" style="width: 56px;"># ID</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" >Ürün</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Ship City: activate to sort column ascending" >Müşteri</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Ship City: activate to sort column ascending" >Firma</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Ship City: activate to sort column ascending" >Fiyat</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Ship Address: activate to sort column ascending" >Tarih</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 105px;">İŞLEMLER</th>
                    </tr>
                    </thead>
                    <tbody>
                         @foreach($domains as $domain)
                        <tr class="odd">
                            <td>{{$domain->id}}</td>

                            <td>{{$domain->product->product_name}}</td>
                            <td>{{$domain->customer->full_name}}</td>
                            <td>{{$domain->company->company_name}}</td>
                            <td>{{$domain->price}}₺</td>
                            <td><span class="label label-danger label-pill label-inline mr-2">{{$domain->DaysLeft}}</span></td>

                            <td nowrap="nowrap">
                                <a href="" class="btn btn-sm btn-clean btn-icon" title="Edit details" data-toggle="modal" data-target="#exampleModal-" >
                                    <i class="la la-edit"></i>
                                </a>
                                <a href="" class="btn btn-sm btn-clean btn-icon delete-confirm" title="Delete">
                                    <i class="la la-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal-" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> {{$domain->id}}| Domain düzenleyin.</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label><strong>Yemek İsmi:</strong></label>
                                                <input type="text" name="name" class="form-control"  value="">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Yemek İçeriği:</strong></label>
                                                <input type="text" name="content" class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Yeni Yemek Görseli:</strong></label>
                                                <input type="file"  class="form-control" name="image" accept="image/*">
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
                <!--end: Datatable-->
            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col col-lg-4">
        <!--begin::List Widget 9-->
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label text-uppercase">Domain Ekle</h3>
                </div>
            </div>
            <div class="card-body mt-5">
                <div class="row justify-content-md">
                    <div class="col-md-12 ">
                        <form method="POST" action="{{route('domain.store')}}" class="form" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li><b>{{ $error }}</b></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group ">
                                <label><strong>Ürün Adı:</strong></label>
                                <select class="form-control form-control-solid" name="product_id">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" @if(old('product_id')===$product->id) selected @endif>{{$product->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ">
                                <label><strong>Müşteri Adı:</strong></label>
                                <select class="form-control form-control-solid" name="customer_id">
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" @if(old('$customer_id')===$customer->id) selected @endif>{{$customer->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ">
                                <label><strong>Firma Adı:</strong></label>
                                <select class="form-control form-control-solid" name="company_id">
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" @if(old('company_id')===$company->id) selected @endif>{{$company->company_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label><strong>Fiyatı:</strong></label>
                                <input type="text" name="price" class="form-control form-control-solid" >
                            </div>
                            <div class="form-group">
                                <label><strong>Başlangıç Tarihi:</strong></label>
                                <div class="input-group input-group-solid date" id="kt_datetimepicker_2" data-target-input="nearest">
                                    <input type="text" class="form-control form-control-solid datetimepicker-input" placeholder="Başlangıç Tarihi seçin." data-target="#kt_datetimepicker_2" name="started_at" value="{{old('started_at')}}"/>
                                    <div class="input-group-append" data-target="#kt_datetimepicker_2" data-toggle="datetimepicker">
                                    <span class="input-group-text">
                                     <i class="ki ki-calendar"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label ><strong>Bitiş Tarihi:</strong></label>
                                <div class="input-group input-group-solid date" id="kt_datetimepicker_3" data-target-input="nearest">
                                    <input type="text" class="form-control form-control-solid datetimepicker-input" placeholder="Bitiş Tarihi seçin." data-target="#kt_datetimepicker_3" name="finished_at" value="{{old('finished_at')}}"/>
                                    <div class="input-group-append" data-target="#kt_datetimepicker_3" data-toggle="datetimepicker">
                                    <span class="input-group-text">
                                     <i class="ki ki-calendar"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-5">
                                <button type="submit" class="btn btn-success mr-2">Ekle</button>
                                <button type="reset" class="btn btn-danger">İptal Et</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    $('#kt_datetimepicker_2').datetimepicker({
        format: 'L'
    });
    $('#kt_datetimepicker_3').datetimepicker({
        format: 'L'
    });
</script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            columns: [
                null,
                null,
                null,
                null,
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

