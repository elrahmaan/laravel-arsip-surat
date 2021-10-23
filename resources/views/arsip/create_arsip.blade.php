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
        <!-- <div class="card">
            <div class="box-body" style="padding-bottom:50px">
                
                <form class="text-left border border-light p-5" enctype="multipart/form-data" action="" method="POST" style="padding-bottom: 50px;">
                <div class="mb-4">
                    <a>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</a><br><a>Catatan: </a><br><a><ul><li>Gunakan file berformat PDF</li></ul>
                </div>
                @csrf
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <div class="input-group mb-4">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                            </span>
                            <input type="text" class="form-control form-control-capitalize " placeholder="Kode Barang" value="" name="product_code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <div class="input-group mb-4">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                            </span>
                            <input type="text" class="form-control form-control-capitalize " placeholder="Nama Barang" value="" name="product_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kategori Barang</label>
                        <div class="input-group mb-4">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                            </span>
                            <select name="product_category" class="select2 form-control" id="categoryInput">
                                
                                    <option value=""></option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <div class="input-group mb-4">
                            <span class="input-group-prepend">
                                <label class="input-group-text">IDR</label>
                            </span>
                            <input type="number" class="form-control form-control-capitalize " placeholder="ex: 100000" value="" name="product_price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gambar barang</label>
                        <img class="img-preview img-fluid mb-3 col-sm-3">
                        <div class="input-group mb-4">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-upload"></i></label>
                            </span>
                            <input type="file" class="form-control form-control-capitalize" id="image" name="product_image" style="padding:4px;" onchange="previewImage()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Stok Barang</label>
                        <div class="input-group mb-4">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                            </span>
                            <input type="number" class="form-control form-control-capitalize " placeholder="ex: 15" value="" name="product_stock">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Barang</label>
                        <textarea name="product_desc" class="form-control html-editor" rows="3"></textarea>
                    </div>
                    
                    <div class="footer-buttons">
                    <a class="fixedButtonRefresh" href="">
                        <button data-toggle="tooltip" data-placement="top" title="" type="button"
                            class="btn btn-icon btn-secondary " data-original-title="Back">
                            <i class="ik ik-arrow-left"></i>
                        </button>
                    </a>
                    <a class="fixedButtonAdd" href="">
                        <button data-toggle="tooltip" type="submit" data-placement="top" title="" href=""
                            class="btn btn-icon btn-info" data-original-title="Tambah">
                            <i class="ik ik-save"></i>
                        </button>
                    </a>
                    </div>
                </form>
            </div>
        </div> -->
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
