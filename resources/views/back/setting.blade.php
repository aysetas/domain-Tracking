@extends('layouts.master')
@section('title','Ayarlar')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-custom card-stretch ">
            <div class="card-header">
                <h3 class="card-title">Ayar İşlemleri</h3>
            </div>
            <form class="form" action="{{ route('back.setting.update',$setting->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="row justify-content-md-center">
                    <div class="col-md-7">
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
                                <label><strong>Site başlık:</strong></label>
                                <input class="form-control form-control-solid" id="site_title" name="site_title" type="text" value="{{old('site_title') ?? $setting->site_title}}">
                            </div>
                            <div class="form-group">
                                <label><strong>Açıklama:</strong></label>
                                <textarea class="form-control"  name="site_desc" >{{$setting->site_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label><strong>E-mail:</strong></label>
                                <input class="form-control form-control-solid" type="email" id="site_email" name="site_email"  placeholder="info@gmail.com" value="{{old('site_email') ?? $setting->site_email}}">
                            </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Site Logo</label>
                                    <input type="file" id="exampleInputFile" name="site_logo" class="form-control" accept="image/*">
                                </div>
                                <label><strong>Resimler:</strong></label>
                                @if (!$setting->site_logo)
                                    <span class="form-text text-muted">Bu Rehber ile ilgili resim bulunamadı. Yeni bir resim ekleyin!</span>
                                @endif
                                <div class="col-lg-3">
                                    <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url({{$setting->getFirstMediaUrl('document')}})">
                                        <div class="image-input-wrapper"></div>

                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                        </span>
                                    </div>
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
