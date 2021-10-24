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
Arsip Surat >> Unggah
@endsection

@section('subtitleHeader')
Unggah Arsip Surat
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Arsip Surat</a></li>
<li class="breadcrumb-item active" aria-current="page">Unggah</li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12" style="">
        <div class="card">
            <div class="card-body">
            
                <form class="text-left p-3" action="{{route('arsip.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <a>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</a><br>
                        <a>Catatan: </a><br>
                        <ul><li><a>Gunakan file berformat PDF</a></li></ul>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-lg-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-8 col-lg-6">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-edit"></i></label>
                                </span>
                                <input type="text" class="form-control" name="nomor" placeholder="Nomor Surat">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-4 col-lg-2 col-form-label">Kategori</label>
                        <div class="col-sm-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-edit"></i></label>
                                </span>
                                <select name="category_id" class="form-control" id="categoryInput">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->nama}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-lg-2 col-form-label">Judul</label>
                        <div class="col-sm-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-edit"></i></label>
                                </span>
                                <input type="text" class="form-control" name="judul" placeholder="Judul">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-lg-2 col-form-label">File Surat</label>
                        <div class="col-sm-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-edit"></i></label>
                                </span>
                                <input type="file" class="form-control" name="file_surat" style="padding:4px;">
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{route('arsip.index')}}"><button class="btn btn-light" type="button"> << Kembali</button></a>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
