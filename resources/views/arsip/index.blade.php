@extends('layouts.app')

@section('cssStyle')
@endsection

@section('jsStyle')
<script src="/style/js/datatables.js"></script>
@endsection

@section('iconHeader')
<i class="ik ik-star bg-blue"></i>
@endsection

@section('titleHeader')
Arsip Surat
@endsection

@section('subtitleHeader')
Data Arsip Surat
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Arsip Surat</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                    <!-- <h3>Arsip Surat</h3> -->
                    <div class="mb-4">
                    <a>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</a><br><a>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</a><br>
                    </div>
                    <table id="multi-colum-dt"
                        class="table table-striped table-bordered nowrap dataTables_wrapper dt-bootstrap4 data-table">
                        
                        <thead>
                            <tr>
                                <th>Nomor Surat</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Waktu Pengarsipan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            
                        @foreach($arsips as $arsip)
                            <tr>
                                <td>{{$arsip->nomor}}</td>
                                <td>{{$arsip->category->nama}}</td>
                                <td>{{$arsip->judul}}</td>
                                <td>{{$arsip->created_at}}</td>
                                
                                <td align="center">
                                    <a href="/arsip/{{$arsip->id}}/delete"><button type="button" class="btn btn-danger" data-id="{{$arsip->id}}">Hapus</button></a>
                                    <a href="#" class="btn btn-warning" style="background-color:#ffc107; border:none;">Unduh</a>
                                    <a href="/arsip/{{$arsip->id}}/show" class="btn btn-primary">Lihat >></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('arsip.create')}}"><button type="button" class="btn btn-dark">Arsipkan Surat</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection