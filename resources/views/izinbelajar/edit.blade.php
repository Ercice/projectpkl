@extends('main')

@section('title', 'Edit Data Izin Belajar/Kuliah')
    

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            {{-- <div class="page-title">
                <h1>Data Izin Cuti</h1>
            </div> --}}
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Data Izin Belajar/Kuliah</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
    </div>  
</div>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Edit Data Izin Belajar/Kuliah</strong>
                </div>
            <div class="pull-right">
                <a href="{{ url('izinbelajar') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
           
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('izinbelajar/'.$izinbelajar->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        
                        <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" name="tglsurat" class="form-control @error('tglsurat') 
                            is-invalid @enderror" value="{{ old('tglsurat', $izinbelajar->tglsurat) }}">
                            @error('tglsurat')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>No. Surat</label>
                            <input type="double" name="no_surat" class="form-control @error('no_surat') 
                            is-invalid @enderror" value="{{ old('no_surat', $izinbelajar->no_surat) }}">
                            @error('no_surat')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <select name="pegawaibk_id" class="form-control @error('pegawaibk_id') 
                            is-invalid @enderror">
                                <option value="">:: Pilih Nama Pegawai ::</option>
                                @foreach ($pegawais as $item)
                                    <option value="{{ $item->id }}" {{ old('pegawaibk_id', $izinbelajar->pegawaibk_id) == $item->id ? 'selected' : null }}>{{ $item->nama_pegawai}}</option>  
                                @endforeach                                
                            </select>
                            @error('pegawaibk_id')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>NIP</label>
                            <select name="pegawaibk_id" class="form-control @error('pegawaibk_id') 
                            is-invalid @enderror">
                                <option value="">:: Pilih ::</option>
                                @foreach ($pegawais as $item)
                                    <option value="{{ $item->id }}" {{ old('pegawaibk_id', $izinbelajar->pegawaibk_id) == $item->id ? 'selected' : null }}>{{ $item->nip}}</option>  
                                @endforeach                                
                            </select>
                            @error('pegawaibk_id')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama Kampus</label>
                            <input type="text" name="nama_kampus" class="form-control @error('nama_kampus') 
                            is-invalid @enderror" value="{{ old('nama_kampus', $izinbelajar->nama_kampus) }}">
                            @error('nama_kampus')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kota</label>
                            <input type="text" name="kota" class="form-control @error('kota') 
                            is-invalid @enderror" value="{{ old('kota', $izinbelajar->kota) }}">
                            @error('kota')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Cabang</label>
                            <input type="text" name="cabang" class="form-control @error('cabang') 
                            is-invalid @enderror" value="{{ old('cabang', $izinbelajar->cabang) }}">
                            @error('cabang')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Fakultas</label>
                            <input type="text" name="fakultas" class="form-control @error('fakultas') 
                            is-invalid @enderror" value="{{ old('fakultas', $izinbelajar->fakultas) }}">
                            @error('fakultas')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gelar</label>
                            <input type="text" name="gelar" class="form-control @error('gelar') 
                            is-invalid @enderror" value="{{ old('gelar', $izinbelajar->gelar) }}">
                            @error('gelar')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Program Studi</label>
                            <input type="text" name="program_studi" class="form-control @error('program_studi') 
                            is-invalid @enderror" value="{{ old('program_studi', $izinbelajar->program_studi) }}">
                            @error('program_studi')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-success"> Save</button>
                    </form>
                </div>
            </div>

        </div>
        
    </div>
</div>
@endsection