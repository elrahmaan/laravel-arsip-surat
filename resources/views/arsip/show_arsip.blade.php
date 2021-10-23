@extends('layouts.app')

@section('cssStyle')
<!-- <link rel="stylesheet" href="/style/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css"> -->
@endsection

@section('jsStyle')
<!-- <link rel="stylesheet" href="/style/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css"> -->
@endsection

@section('iconHeader')
<i class="ik ik-star bg-blue"></i>
@endsection

@section('titleHeader')
Arsip Surat >> Lihat
@endsection

@section('subtitleHeader')
Lihat Arsip Surat
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Arsip Surat</a></li>
<li class="breadcrumb-item active" aria-current="page">Lihat</li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12" style="">
        <div class="card">
            <div class="card-body p-5">
                    <div class="mb-4">
                        <div class="row align-items-center mb-1">
                            <div class="col-sm-2 text-left">
                                <a><span class="align-middle" style="font-size: 14px;">Nomor</span></a>
                            </div>
                            <div class=" text-right">
                                <a  style="font-size: 14px;">: &ensp;<strong>{{$arsip->nomor}}</strong></a>
                            </div>
                        </div>
                        <div class="row align-items-center mb-1">
                            <div class="col-sm-2 text-left">
                                <a><span class="align-middle" style="font-size: 14px;">Kategori</span></a>
                            </div>
                            <div class=" text-right">
                                <a  style="font-size: 14px;">: &ensp;<strong>{{$arsip->category->nama}}</strong></a>
                            </div>
                        </div>
                        <div class="row align-items-center mb-1">
                            <div class="col-sm-2 text-left">
                                <a><span class="align-middle" style="font-size: 14px;">Judul</span></a>
                            </div>
                            <div class=" text-right">
                                <a  style="font-size: 14px;">: &ensp;<strong>{{$arsip->judul}}</strong></a>
                            </div>
                        </div>
                        <div class="row align-items-center mb-1">
                            <div class="col-sm-2 text-left">
                                <a><span class="align-middle" style="font-size: 14px;">Waktu Unggah</span></a>
                            </div>
                            <div class=" text-right">
                                <a  style="font-size: 14px;">: &ensp;<strong>{{$arsip->created_at}}</strong></a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="mb-4">
                    <embed src="{{asset($arsip->file_surat)}}" type="application/pdf" width="100%" height="500px" />
                    </div>
                    <a href="{{route('arsip.index')}}"><button type="button" class="btn btn-light"><strong><< Kembali</strong></button></a>
                    <button type="submit" class="btn btn-dark ml-3">Unduh</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
