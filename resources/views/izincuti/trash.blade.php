@extends('main')

@section('title', 'Trash Izin Cuti Tahunan')
    

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
                    <li><a href="#">Data Izin Cuti Tahunan</a></li>
                    <li><a href="#">Data</a></li>
                    <li class="active">Trash</li>
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
                    <strong>Data Izin Cuti Terhapus</strong>
                </div>
            <div class="pull-right">
                <a href="{{ url('izincuti/delete') }}" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Delete All
                </a>

                <a href="{{ url('izincuti/restore') }}" class="btn btn-info btn-sm">
                    <i class="fa fa-undo"></i> Restore All
                </a>

                <a href="{{ url('izincuti') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-chevron-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr align="center">
                        <th>No.</th>
                        <th>Tanggal Surat</th>
                        <th>No. Surat</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Selama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($izincuti->count() > 0)
                        @foreach ($izincuti as $item)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $item->tglsurat }}</td>
                                <td>{{ $item->no_surat }}</td>
                                <td>{{ $item->pegawai->nama_pegawai }}</td>
                                <td>{{ $item->pegawai->nip }}</td>
                                <td>{{ $item->tglmulai }}</td>
                                <td>{{ $item->tglakhir }}</td>
                                <td>{{ $item->selama }} Hari</td>
                                <td class="text-center">
                                    <a href="{{ url('izincuti/restore/' .$item->id) }}" class="btn btn-info btn-sm">
                                        Restore  
                                    </a>

                                    <a href="{{ url('izincuti/delete/' .$item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Permanen?')">
                                        Delete Permanently 
                                    </a>

                                </td>               
                            </tr> 
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
                        </tr>
                    @endif
                </tbody>
    
            </table>
        </div>
    </div>
</div>
@endsection