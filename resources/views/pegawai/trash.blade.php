@extends('main')

@section('title', 'Trash Data Pegawai')
    

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
                    <li><a href="#">Data Pegawai</a></li>
                    <li><a href="#">Data</a></li>
                    <li class="active">Trash</li>
                    {{-- <li class="active"><i class="fa fa-dashboard"></i></li> --}}
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
                    <strong>Data Pegawai Terhapus</strong>
                </div>
            <div class="pull-right">
                <a href="{{ url('datapegawai/delete') }}" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Delete All
                </a>

                <a href="{{ url('datapegawai/restore') }}" class="btn btn-info btn-sm">
                    <i class="fa fa-undo"></i> Restore All
                </a>

                <a href="{{ url('datapegawai') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-chevron-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr align="center">
                        <th>No.</th>
                        <th>Nama Pegawai</th>
                        <th>NIP</th>
                        <th>NRP</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No. Hp</th>
                        <th>Pangkat</th>
                        <th>Golongan</th>
                        <th>Jabatan</th>
                        <th>Unit/Bagian</th>
                        <th>TMT</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($datapegawai->count() > 0)
                        @foreach ($datapegawai as $item)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $item->nama_pegawai }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->nrp }}</td>
                                <td>{{ $item->tempatlahir }}</td>
                                <td>{{ $item->tgllahir }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->hp }}</td>
                                <td>{{ $item->pangkat }}</td>
                                <td>{{ $item->golongan }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->bagian }}</td> 
                                <td>{{ $item->tmt }}</td> 
                                <td class="text-center">
                                    <a href="{{ url('datapegawai/restore/' .$item->id) }}" class="btn btn-info btn-sm">
                                        Restore  
                                    </a>

                                    <a href="{{ url('datapegawai/delete/' .$item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Permanen?')">
                                        Delete Permanently 
                                    </a>
                                </td>               
                            </tr>
                        
                        @endforeach
                    @else
                        <tr>
                            <td colspan="13" class="text-center">Data Kosong</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection