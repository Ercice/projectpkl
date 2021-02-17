@extends('main')

@section('title', 'Tambah Data Izin Cuti Penting')
    

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
                    <li><a href="#">Data Izin Cuti Penting</a></li>
                    <li class="active">Add</li>
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
                    <strong>Tambah Data Izin Cuti Penting</strong>
                </div>
            <div class="pull-right">
                <a href="{{ url('izinpenting') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
           
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('izinpenting') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" name="tglsurat" class="form-control @error('tglsurat') 
                            is-invalid @enderror" value="{{ old('tglsurat') }}">
                            @error('tglsurat')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>No. Surat</label>
                            <input type="double" name="no_surat" class="form-control @error('no_surat') 
                            is-invalid @enderror" value="{{ old('no_surat') }}">
                            @error('no_surat')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <select name="pegawaiptg_id" class="form-control @error('pegawaiptg_id') 
                            is-invalid @enderror">
                                <option value="">:: Pilih Nama Pegawai ::</option>
                                @foreach ($pegawais as $item)
                                    <option value="{{ $item->id }}" {{ old('pegawaiptg_id') == $item->id ? 'selected' : null }}>{{ $item->nama_pegawai}}</option>  
                                @endforeach                                
                            </select>
                            @error('pegawaiptg_id')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>NIP</label>
                            <select name="pegawaiptg_id" class="form-control @error('pegawaiptg_id') 
                            is-invalid @enderror">
                                <option value=""></option>
                                @foreach ($pegawais as $item)
                                    <option value="{{ $item->id }}" {{ old('pegawaiptg_id') == $item->id ? 'selected' : null }}>{{ $item->nip}}</option>  
                                @endforeach                                
                            </select>
                            @error('pegawaiptg_id')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tglmulai" class="form-control @error('tglmulai') 
                            is-invalid @enderror" value="{{ old('tglmulai') }}">
                            @error('tglmulai')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tglakhir" class="form-control @error('tglakhir') 
                            is-invalid @enderror" value="{{ old('tglakhir') }}">
                            @error('tglakhir')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Selama</label>
                            <input type="text" name="selama" class="form-control @error('selama') 
                            is-invalid @enderror" value="{{ old('selama') }}">
                            @error('selama')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jenis Cuti</label>
                            <select name="jenis_cuti" class="form-control @error('jenis_cuti') 
                            is-invalid @enderror">
                                <option value="">:: Pilih Jenis Cuti ::</option>
                                @foreach ($pegawais as $item)
                                    <option value="Menikah"{{( old('jenis_cuti') == 'Menikah') ? 'selected' : null }}}>Menikah</option>  
                                    <option value="Melahirkan"{{( old('jenis_cuti') == 'Melahirkan') ? 'selected' : null }}}>Melahirkan</option>  
                                    <option value="Acara Keluarga"{{( old('jenis_cuti') == 'Acara Keluarga') ? 'selected' : null }}}>Acara Keluarga</option>  
                                    <option value="Keluarga Meninggal Dunia"{{( old('jenis_cuti') == 'Keluarga Meninggal Dunia') ? 'selected' : null }}}>Keluarga Meninggal Dunia</option>  
                                @endforeach                                
                            </select>
                            @error('jenis_cuti')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>                     
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>

        </div>
        
    </div>
</div>
@endsection