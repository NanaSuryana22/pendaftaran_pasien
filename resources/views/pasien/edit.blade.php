@extends('template_admin.master')
@section('title', "Data Pasien")
@section('pasien', 'active')
@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Pasien</h3>
            <p class="text-subtitle text-muted">Tambah Data Pasien.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pasien.index') }}">Pasien</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Pasien</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Input Data Pasien</h4>
        </div>
        <div class="card-body">
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" action="{{ route('pasien.update', $pasien->id) }}" method="post">
                                        {{ csrf_field() }} {{method_field('PUT')}}
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="id">ID Pasien</label>
                                                    <input type="text" id="id" class="form-control @error('id') is-invalid @enderror"
                                                        placeholder="ID akan terisi otomatis" name="id" value="{{ $pasien->id }}" required disabled>
                                                    @if($errors->has('id'))
                                                      <span class="invalid-feedback" role="alert">
                                                        <strong>{{$errors->first('id') }}</strong>
                                                      </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama Pasien</label>
                                                    <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror"
                                                        placeholder="Silahkan Isi Nama Pasien.." name="nama" value="{{ $pasien->nama }}" required>
                                                    @if($errors->has('nama'))
                                                      <span class="invalid-feedback" role="alert">
                                                        <strong>{{$errors->first('nama') }}</strong>
                                                      </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                  <label for="alamat">Alamat</label>
                                                  <textarea name="alamat" id="alamat" class="form-control">{{ $pasien->alamat }}</textarea>
                                                  @if($errors->has('alamat'))
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{$errors->first('alamat') }}</strong>
                                                    </span>
                                                  @endif
                                                </div>
                                                <div class="form-group">
                                                  <div class="col-sm-6">
                                                    <label for="rt">RT</label>
                                                    <input type="text" id="rt" class="form-control @error('rt') is-invalid @enderror"
                                                        placeholder="ex : 02.." name="rt" value="{{ $pasien->rt }}" required>
                                                    @if($errors->has('rt'))
                                                      <span class="invalid-feedback" role="alert">
                                                        <strong>{{$errors->first('rt') }}</strong>
                                                      </span>
                                                    @endif
                                                  </div>
                                                  <div class="col-sm-6">
                                                    <label for="rw">RW</label>
                                                    <input type="text" id="rw" class="form-control @error('rw') is-invalid @enderror"
                                                        placeholder="ex : 02.." name="rw" value="{{ $pasien->rw }}" required>
                                                    @if($errors->has('rw'))
                                                      <span class="invalid-feedback" role="alert">
                                                        <strong>{{$errors->first('rw') }}</strong>
                                                      </span>
                                                    @endif
                                                  </div>
                                                </div>
                                              <div class="form-group">
                                                <label for="kelurahan_id">Kelurahan</label>
                                                <select name="kelurahan_id" id="kelurahan_id" class="form-control @error('rw') is-invalid @enderror" required>
                                                  <option value="{{ $pasien->kelurahan_id }}">{{ $pasien->kelurahan->nama_kelurahan }} Terpilih</option>
                                                  @foreach ($kelurahan as $m)
                                                      <option value="{{ $m->id }}" {{ ( $m->id == "$pasien->kelurahan_id") ? 'selected' : '' }}>{{$m->nama_kelurahan}}</option>
                                                  @endforeach
                                                </select>
                                                @if($errors->has('kelurahan_id'))
                                                  <span class="invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('kelurahan_id') }}</strong>
                                                  </span>
                                                @endif
                                              </div>
                                              <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"  name="tanggal_lahir" required
                                                 placeholder="Masukkan tanggal lahir pasien..." value="{{ $pasien->tanggal_lahir }}">
                                                @if($errors->has('tanggal_lahir'))
                                                 <span class="invalid-feedback" role="alert">
                                                   <strong>{{$errors->first('tanggal_lahir') }}</strong>
                                                 </span>
                                                @endif
                                              </div>
                                              <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('rw') is-invalid @enderror" required>
                                                  @if ($pasien->jenis_kelamin == 'Laki-laki')
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                  @else
                                                    <option value="Perempuan">Perempuan</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                  @endif
                                                </select>
                                                @if($errors->has('jenis_kelamin'))
                                                  <span class="invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('jenis_kelamin') }}</strong>
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