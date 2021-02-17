@extends('main')

@section('title', 'Detail Data Izin Cuti Sakit')
    

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            {{-- <div class="page-title">
                <h1>Data</h1>
            </div> --}}
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Data Izin Cuti Sakit</a></li>
                    {{-- <li><a href="#">Data</a></li> --}}
                    <li class="active">Detail</li>
                </ol>
            </div>
        </div>
    </div>  
</div>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Detail Data Izin Cuti Sakit</strong>
                </div>
            <div class="pull-right">
                <a href="{{ url('izinsakit') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width:30%">Tanggal Surat</th>
                                <td>{{ $izinsakit->tglsurat }}</td>
                            </tr>
                            <tr>
                                <th>No. Surat</th>
                                <td>{{ $izinsakit->no_surat }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pegawai</th>
                                <td>{{ $izinsakit->pegawaiskt->nama_pegawai }}</td>
                            </tr>
                            <tr>
                                <th>NIP</th>
                                <td>{{ $izinsakit->pegawaiskt->nip }}</td>
                            </tr>
                            <tr>
                                <th>Kategori Sakit</th>
                                <td>{{ $izinsakit->kategori }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Sakit</th>
                                <td>{{ $izinsakit->jenis_sakit }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Mulai</th>
                                <td>{{ $izinsakit->tglmulai }}</td>
                            </tr>
                            <tr>
                                <th>Tempat</th>
                                <td>{{ $izinsakit->tempat }}</td>
                            </tr>
                            {{-- <tr>
                                <th>Surat Dokter</th>
                                <td>{{ $izinsakit->surat_dokter }}</td>
                            </tr> --}}
                             {{-- <tr>
                                <th>File</th>
                                <td>{{ $izinsakit->file }}</td>
                            </tr> --}}
                            <tr>
                                <th>Created at</th>
                                <td>{{ $izinsakit->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Updated at</th>
                                <td>{{ $izinsakit->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
         
        </div>
    </div>
</div>
@endsection