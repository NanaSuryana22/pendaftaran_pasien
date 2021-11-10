@extends('template_admin.master')
@section('title', "Data Kelurahan")
@section('kelurahan', 'active')
@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Kelurahan</h3>
            <p class="text-subtitle text-muted">Edit Data Kelurahan.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('kelurahan.index') }}">Kelurahan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Kelurahan</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Edit Data Kelurahan</h4>
        </div>
        <div class="card-body">
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" action="{{ route('kelurahan.update', $kelurahan->id) }}" method="post">
                                        {{ csrf_field() }} {{method_field('PUT')}}
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="nama_kelurahan">Nama Kelurahan</label>
                                                    <input type="text" id="nama_kelurahan" class="form-control @error('nama_kelurahan') is-invalid @enderror"
                                                        placeholder="Silahkan Isi Nama Kelurahan.." name="nama_kelurahan" value="{{ $kelurahan->nama_kelurahan }}" required>
                                                    @if($errors->has('nama_kelurahan'))
                                                      <span class="invalid-feedback" role="alert">
                                                        <strong>{{$errors->first('nama_kelurahan') }}</strong>
                                                      </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                  <label for="nama_kecamatan">Nama Kecamatan</label>
                                                  <input type="text" id="nama_kecamatan" class="form-control @error('nama_kecamatan') is-invalid @enderror"
                                                      placeholder="Silahkan Isi Nama Kecamatan.." name="nama_kecamatan" value="{{ $kelurahan->nama_kecamatan }}" required>
                                                  @if($errors->has('nama_kecamatan'))
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{$errors->first('nama_kecamatan') }}</strong>
                                                    </span>
                                                  @endif
                                              </div>
                                              <div class="form-group">
                                                <label for="nama_kota">Nama Kota</label>
                                                <input type="text" id="nama_kota" class="form-control @error('nama_kota') is-invalid @enderror"
                                                    placeholder="Silahkan Isi Nama Kota.." name="nama_kota" value="{{ $kelurahan->nama_kota }}" required>
                                                @if($errors->has('nama_kota'))
                                                  <span class="invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('nama_kota') }}</strong>
                                                  </span>
                                                @endif
                                            </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1 mb-1 pull-left">Simpan</button>
                                                <button type="reset" class="btn btn-warning me-1 mb-1 pull-left">Reset</button>
                                                <a class="btn btn-info me-1 mb-1 pull-right" href="{{ url()->previous() }}">Kembali</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection