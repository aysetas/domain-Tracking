@extends('layouts.master')
@section('title','Ayarlar')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-custom card-stretch ">
            <div class="card-header">
                <h3 class="card-title">Ayar İşlemleri</h3>
            </div>
            <form class="form" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-md-center">
                    <div class="col-md-7">
                        <div class="card-body">
                            {{--  
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li><b>{{ $error }}</b></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            --}}
                            <div class="form-group">
                                <label><strong>Site başlık:</strong></label>
                                <input class="form-control form-control-solid" id="site_title" name="site_title" type="text">
                            </div>
                            <div class="form-group">
                                <label><strong>Açıklama:</strong></label>
                                <textarea class="form-control" id="desc" name="desc" ></textarea>
                            </div>
                            <div class="form-group">
                                <label><strong>E-mail:</strong></label>
                                <input class="form-control form-control-solid" type="email" id="site_email" name="site_email"  placeholder="info@gmail.com" >
                            </div>
                            <div class="form-group">
                                <label for="site_logo"><b>Site Logo:</b></label><br>
                                <input type="file"  class="form-control"name="site_logo">
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-lg-end">
                            <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
                            <button type="reset" class="btn btn-secondary">İptal Et</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection