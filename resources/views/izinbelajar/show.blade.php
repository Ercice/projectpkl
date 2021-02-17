@extends('main')

@section('title', 'Detail Data Izin Belajar/Kuliah')
    

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
                    <li><a href="#">Data Izin Belajar/Kuliah</a></li>
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
                    <strong>Detail Data Izin Belajar/Kuliah</strong>
                </div>
            <div class="pull-right">
                <a href="{{ url('izinbelajar') }}" class="btn btn-secondary btn-sm">
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
                                <td>{{ $izinbelajar->tglsurat }}</td>
                            </tr>
                            <tr>
                                <th>No. Surat</th>
                                <td>{{ $izinbelajar->no_surat }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pegawai</th>
                                <td>{{ $izinbelajar->pegawaibk->nama_pegawai }}</td>
                            </tr>
                            <tr>
                                <th>NIP</th>
                                <td>{{ $izinbelajar->pegawaibk->nip }}</td>
                            </tr>
                            <tr>
                                <th>Nama Kampus</th>
                                <td>{{ $izinbelajar->nama_kampus }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>{{ $izinbelajar->kota }}</td>
                            </tr>
                            <tr>
                                <th>Cabang</th>
                                <td>{{ $izinbelajar->cabang }}</td>
                            </tr>
                            <tr>
                                <th>Fakultas</th>
                                <td>{{ $izinbelajar->fakultas }}</td>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <td>{{ $izinbelajar->program_studi }}</td>
                            </tr>
                            <tr>
                                <th>Created at</th>
                                <td>{{ $izinbelajar->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Updated at</th>
                                <td>{{ $izinbelajar->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
         
        </div>
    </div>
</div>
@endsection