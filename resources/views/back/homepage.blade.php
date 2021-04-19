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
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" >
                        <!--begin::Trigger Modal-->
                        <a href="" class="btn btn-light-primary font-weight-bold"><i class="ki ki-plus "></i>EKLE</a>
                        <!--end::Trigger Modal-->
                        <!--begin::Modal Content-->
                       
                    </div>
                </div>
            </div>
            <div class="card-body">
         
                <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="myTable" aria-describedby="kt_datatable_info" role="grid" style="width: 1231px;">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Record ID: activate to sort column descending" style="width: 56px;"># ID</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" >Başlık</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Ship City: activate to sort column ascending" >Müşteri</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Ship Address: activate to sort column ascending" >Tarih</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 105px;">İŞLEMLER</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="odd">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
                                            <h5 class="modal-title" id="exampleModalLabel"> | Yemeğini düzenleyin.</h5>
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
                        <form method="POST" action="" class="form" enctype="multipart/form-data">
                            @csrf
                         
                            <div class="form-group">
                                <label><strong>Yemek İsmi:</strong></label>
                                <input type="text" name="name" class="form-control"  placeholder="Yemeğin Adı...">
                            </div>
                            <div class="form-group">
                                <label><strong>Yemek İçeriği:</strong></label>
                                <input type="text" name="content" class="form-control"  placeholder="Yemeğin İçeriği...">
                            </div>
                            <div class="form-group">
                                <label><strong>Yemek Görseli:</strong></label>
                                <input type="file"  class="form-control" name="image" accept="image/*">
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
    $(document).ready( function () {
        $('#myTable').DataTable({
            columns: [
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
    
