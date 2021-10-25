@extends('layouts.app')

@section('cssStyle')
@endsection

@section('jsStyle')
@endsection

@section('iconHeader')
<i class="ik ik-info bg-blue"></i>
@endsection

@section('titleHeader')
About
@endsection

@section('subtitleHeader')
Profil Mahasiswa
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">About</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                    <!-- <h3>Arsip Surat</h3> -->
                    <div class="form-group row d-flex">
                        <div class="col-sm-3">
                            <img style="" src="/img/abdul-rahman-saleh.JPG" alt="" width="150">
                        </div>
                        <div class="col-md-9">
                            <h3>Aplikasi ini dibuat oleh:</h3>
                            <div class="row align-items-center mb-1">
                                <div class="col-sm-2 text-left">
                                    <a><span class="align-middle" style="font-size: 14px;">Nama</span></a>
                                </div>
                                <div class=" text-right">
                                    <a  style="font-size: 14px;">: &ensp;<strong>Abdul Rahman Saleh</strong></a>
                                </div>
                            </div>
                            <div class="row align-items-center mb-1">
                                <div class="col-sm-2 text-left">
                                    <a><span class="align-middle" style="font-size: 14px;">NIM</span></a>
                                </div>
                                <div class=" text-right">
                                    <a  style="font-size: 14px;">: &ensp;<strong>1931710038</strong></a>
                                </div>
                            </div>
                            <div class="row align-items-center mb-1">
                                <div class="col-sm-2 text-left">
                                    <a><span class="align-middle" style="font-size: 14px;">Tanggal</span></a>
                                </div>
                                <div class=" text-right">
                                    <a  style="font-size: 14px;">: &ensp;<strong>22 - 25 Oktober 2021</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.delete').click(function() {
        var arsip_id = $(this).attr('data-id');
        
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus arsip surat ini?',
            text: "Want to delete username " + arsip_id + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
            confirmButtonText: 'Batal'
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
        });
    });
</script>
@endsection
@section('script')


@endsection