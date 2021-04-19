@extends('layouts.master')
@section('title','Ayarlar')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-custom card-stretch ">
            <div class="card-header">
                <h3 class="card-title">Ayar İşlemleri</h3>
            </div>
            <form class="form" action="{{ route('back.setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
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
                                <input class="form-control form-control-solid" id="site_title" name="site_title" type="text" value="{{old('site_title') ?? $setting->site_title}}">>
                            </div>
                            <div class="form-group">
                                <label><strong>Açıklama:</strong></label>
                                <textarea class="form-control" id="desc" name="desc" >{{old('site_desc') ?? $setting->site_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label><strong>E-mail:</strong></label>
                                <input class="form-control form-control-solid" type="email" id="site_email" name="site_email"  placeholder="info@gmail.com" value="{{old('site_email') ?? $setting->site_email}}">
                            </div>
                            <div class="form-group">
                                <label for="">Aktif Logo</label>
                               @if($setting->site_logo!="" && \Illuminate\Support\Facades\File::exists('storage/'.$setting->site_logo))
                                    <img width="150" height="150" src="" alt="{{ $setting->site_title }}">
                                @else
                                    <img width="150" height="150" src="" alt="{{ $setting->site_title }}">
                                @endif
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputFile">Site Logo</label>
                                <input type="file" id="exampleInputFile" name="site_logo" class="form-control">
                               
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