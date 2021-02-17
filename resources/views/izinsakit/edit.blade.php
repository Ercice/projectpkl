@extends('main')

@section('title', 'Edit Data Izin Cuti Sakit')
    

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
                    <li><a href="#">Data Izin Cuti Sakit</a></li>
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
                    <strong>Edit Data Izin Cuti Sakit</strong>
                </div>
            <div class="pull-right">
                <a href="{{ url('izinsakit') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
           
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('izinsakit/'.$izinsakit->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        
                        <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" name="tglsurat" class="form-control @error('tglsurat') 
                            is-invalid @enderror" value="{{ old('tglsurat', $izinsakit->tglsurat) }}">
                            @error('tglsurat')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>No. Surat</label>
                            <input type="double" name="no_surat" class="form-control @error('no_surat') 
                            is-invalid @enderror" value="{{ old('no_surat', $izinsakit->no_surat) }}">
                            @error('no_surat')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>NIP</label>
                            <select name="pegawaiskt_id" class="form-control @error('pegawaiskt_id') 
                            is-invalid @enderror">
                                <option value="">:: Pilih ::</option>
                                @foreach ($pegawais as $item)
                                    <option value="{{ $item->id }}" {{ old('pegawaiskt_id', $izinsakit->pegawaiskt_id) == $item->id ? 'selected' : null }}>{{ $item->nip}}</option>  
                                @endforeach                                
                            </select>
                            @error('pegawaiskt_id')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <select name="pegawaiskt_id" class="form-control @error('pegawaiskt_id') 
                            is-invalid @enderror">
                                <option value="">:: Pilih Nama Pegawai ::</option>
                                @foreach ($pegawais as $item)
                                    <option value="{{ $item->id }}" {{ old('pegawaiskt_id', $izinsakit->pegawaiskt_id) == $item->id ? 'selected' : null }}>{{ $item->nama_pegawai}}</option>  
                                @endforeach                                
                            </select>
                            @error('pegawaiskt_id')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control @error('kategori') 
                            is-invalid @enderror">
                                <option value="">:: Pilih Kategori Sakit ::</option>
                                {{-- @foreach ($pegawais as $item) --}}
                                <option value="Sakit Biasa"{{( old('kategori') == 'Sakit Biasa') ? 'selected' : null }}}>Sakit Biasa</option>  
                                    <option value="Sakit Parah"{{( old('kategori') == 'Sakit Parah') ? 'selected' : null }}}>Sakit Parah</option>  
                                    <option value="Kecelakaan"{{( old('kategori') == 'Kecelakaan') ? 'selected' : null }}}>Kecelakaan</option>  
                                {{-- @endforeach                                 --}}
                            </select>
                            @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jenis Sakit</label>
                            <input type="text" name="jenis_sakit" class="form-control @error('jenis_sakit') 
                            is-invalid @enderror" value="{{ old('jenis_sakit', $izinsakit->jenis_sakit) }}">
                            @error('jenis_sakit')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>                        

                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tglmulai" class="form-control @error('tglmulai') 
                            is-invalid @enderror" value="{{ old('tglmulai', $izinsakit->tglmulai) }}">
                            @error('tglmulai')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tempat</label>
                            <input type="text" name="tempat" class="form-control @error('tempat') 
                            is-invalid @enderror" value="{{ old('tempat', $izinsakit->tempat) }}">
                            @error('tempat')
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