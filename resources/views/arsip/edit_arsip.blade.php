@extends('layouts.app')

@section('cssStyle')
<!-- <link rel="stylesheet" href="/style/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css"> -->
@endsection

@section('jsStyle')
<!-- <link rel="stylesheet" href="/style/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css"> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('iconHeader')
<i class="ik ik-star bg-blue"></i>
@endsection

@section('titleHeader')
Arsip Surat >> Edit
@endsection

@section('subtitleHeader')
Edit Arsip Surat
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Arsip Surat</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12" style="">
        <div class="card">
            <div class="card-body">
            
                <form class="text-left p-3" action="{{route('arsip.update', $arsip->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                <input type="text" class="form-control" name="nomor" placeholder="Nomor Surat" value="{{$arsip->nomor}}">
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
                                    <option value="{{$category->id}}" {{$category->id == $arsip->category_id ? ' selected' : ' '}}>{{$category->nama}}</option>
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
                                <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{$arsip->judul}}">
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
                                <input type="hidden" class="form-control" name="old_file" style="padding:4px;" value="{{$arsip->file_surat}}">
                            </div>
                            &nbsp;&nbsp;&nbsp; <strong>{{substr($arsip->file_surat, 31, 300)}}</strong>
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
