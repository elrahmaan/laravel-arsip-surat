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
                                    <a href="#" class="btn btn-danger delete" data-id="{{$arsip->id}}" data-nomor="{{$arsip->nomor}}">Hapus</a>
                                    <a href="/arsip/{{$arsip->id}}/download" class="btn btn-warning" style="background-color:#ffc107; border:none;">Unduh</a>
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

<script type="text/javascript">
    $('.delete').click(function() {
        var arsip_id = $(this).attr('data-id');
        var nomor = $(this).attr('data-nomor');

        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus arsip surat ini ?',
            text: "Nomor surat: " + nomor,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'Arsip surat berhasil dihapus'
                })
                window.location = "/arsip/" + arsip_id + "/delete"
            }
        })
    })
</script>

@endsection