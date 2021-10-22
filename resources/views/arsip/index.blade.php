@extends('master.app')

@section('cssStyle')
@endsection

@section('jsStyle')
<script src="/style/js/datatables.js"></script>
@endsection

@section('iconHeader')
<i class="ik ik-box bg-blue"></i>
@endsection

@section('titleHeader')
Product
@endsection

@section('subtitleHeader')
Halaman Data Barang
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Arsip</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
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
                            
                            <tr>
                                <td>2020/PD3/TU/001</td>
                                <td>Pengumuman</td>
                                <td>Nota Dinas WFH</td>
                                <td>2021-06-21 17:23</td>
                                
                                <td align="center">
                                    <a href="#" class="btn btn-danger">Hapus</a>
                                    <a href="#" class="btn btn-warning" style="background-color:#ffc107; border:none;">Unduh</a>
                                    <a href="#" class="btn btn-primary">Lihat >></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection