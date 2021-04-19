@extends('layouts.master')
@section('title','Firma')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Firma Listesi</span>
                </h3>

            </div>
            <div class="card-body">

                <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="myTable" aria-describedby="kt_datatable_info" role="grid" style="width: 1231px;">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Record ID: activate to sort column descending" ># ID</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" >Firma Adı</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">İŞLEMLER</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr class="odd">
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->company_name }}</td>
                                <td nowrap="nowrap">
                                    <a href="" class="btn btn-sm btn-clean btn-icon" title="Edit details" data-toggle="modal" data-target="#exampleModal-{{$company->id}}">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <a href="{{route('company.destroy',$company->id)}}" class="btn btn-sm btn-clean btn-icon delete-confirm" title="Delete">
                                        <i class="la la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal-{{$company->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="{{ route('company.update',$company->id) }}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{$company->company_name}} | Firmasını Düzenleyin.</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label><strong>Firma Adı:</strong></label>
                                                    <input class="form-control form-control-solid" name="company_name" type="text" value="{{ $company->company_name }}">
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
    <div class="col-md-4">
        <div class="card card-custom card-stretch ">
            <div class="card-header">
                <h3 class="card-title">Firma İşlemleri</h3>
            </div>
            <form  method="post" class="form" action="{{ route('company.store') }}" enctype="multipart/form-data">
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
                                <label><strong>Firma Adı:</strong></label>
                                <input class="form-control form-control-solid" name="company_name"  type="text">
                            </div>

                        </div>
                        <div class="text-center mb-5">
                            <button type="submit" class="btn btn-success mr-2">Ekle</button>
                            <button type="reset" class="btn btn-danger">İptal Et</button>
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
<script>
    $('.delete-confirm').click(function (e) {
        e.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Silmek için emin misin?',
            text: "Bu öğeyi silmek istediğine emin misin?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText: 'Hayır, Silme!',
            reverseButtons: true
        }).then(function (result) {
            if (result.value) {
                Swal.fire(
                    'Silindi!',
                    'İlgili içerik başarıyla silindi!',
                    'success'
                )
                window.location.href = url;
                 //result.dismiss can be 'cancel', 'overlay',
                //'close', and 'timer'
            } else if (result.dismiss === 'cancel') {
                Swal.fire(
                    'İptal edildi!',
                    'Silme işlemi iptal edildi!',
                    'warning'
                )
            }
        });
    });
</script>
@endsection
