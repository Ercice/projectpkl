@extends('main')

@section('title', 'Tambah Data Pegawai')
    

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
                    <li><a href="#">Pegawai</a></li>
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
                    <strong>Tambah Data Pegawai</strong>
                </div>
            <div class="pull-right">
                <a href="{{ url('datapegawai') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
           
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('datapegawai') }}" method="post" enctype="multipart/form-data">
                        {{-- @csrf --}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" name="nama_pegawai" class="form-control @error('nama_pegawai') 
                            is-invalid @enderror" value="{{ old('nama_pegawai') }}" autofocus>
                            @error('nama_pegawai')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>
   
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="double" name="nip" class="form-control @error('nip') 
                            is-invalid @enderror" value="{{ old('nip') }}">
                            @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>
 
                        <div class="form-group">
                            <label>NRP</label>
                            <input type="double" name="nrp" class="form-control @error('nrp') 
                            is-invalid @enderror" value="{{ old('nrp') }}">
                            @error('nrp')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempatlahir" class="form-control @error('tempatlahir') 
                            is-invalid @enderror" value="{{ old('tempatlahir') }}">
                            @error('tempatlahir')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>
      
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgllahir" class="form-control @error('tgllahir') 
                            is-invalid @enderror" value="{{ old('tgllahir') }}">
                            @error('tgllahir')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control @error('alamat') 
                            is-invalid @enderror" value="{{ old('alamat') }}">
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>
               

                        <div class="form-group">
                            <label>No. Hp</label>
                            <input type="double" name="hp" class="form-control @error('hp') 
                            is-invalid @enderror" value="{{ old('hp') }}">
                            @error('hp')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>
                 
                        <div class="form-group">
                            <label>Pangkat</label>
                            <input type="text" name="pangkat" class="form-control @error('pangkat') 
                            is-invalid @enderror" value="{{ old('pangkat') }}">
                            @error('pangkat')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>
         

                        <div class="form-group">
                            <label>Golongan</label>
                            <input type="text" name="golongan" class="form-control @error('golongan') 
                            is-invalid @enderror" value="{{ old('golongan') }}">
                            @error('golongan')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>
         

                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control @error('jabatan') 
                            is-invalid @enderror" value="{{ old('jabatan') }}">
                            @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>
     

                        <div class="form-group">
                            <label>Unit/Bagian</label>
                            <input type="text" name="bagian" class="form-control @error('bagian') 
                            is-invalid @enderror" value="{{ old('bagian') }}">
                            @error('bagian')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>TMT</label>
                            <input type="date" name="tmt" class="form-control @error('tmt') 
                            is-invalid @enderror" value="{{ old('tmt') }}">
                            @error('tmt')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>File Dokumen</label>
                            
                               <input type="file" name="file" class="form-control @error('file') 
                               is-invalid @enderror" id="file" value="{{ old('file') }}">
                               @error('file')
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