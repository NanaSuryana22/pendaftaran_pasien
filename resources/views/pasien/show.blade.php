@extends('template_admin.master')
@section('title', "Data Pasien")
@section('pasien', 'active')
@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Pasien</h3>
						<a class="btn btn-primary btn-sm" href="{{ route('printPDF', $pasien->id) }}">Cetak Data Pasien</a>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('pasien.index') }}">Data Pasien</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Halaman Detail Data Pasien</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="col-lg-12">
        @include('template_admin.notice')
    </div>
</div>
<br />
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <br />
                                <dl class="row">
                                    <dt class="col-sm-2">ID Pasien</dt>
                                    <dd class="col-sm-10">{{ $pasien->id}}</dd>
                                    <div class="col-md-12">
                                        <hr />
                                    </div>
																		<dt class="col-sm-2">Nama Pasien</dt>
                                    <dd class="col-sm-10">{{ $pasien->nama}}</dd>
                                    <div class="col-md-12">
                                        <hr />
                                    </div>
																		<dt class="col-sm-2">Alamat</dt>
                                    <dd class="col-sm-10">{{ $pasien->alamat}}, RT {{ $pasien->rt }}, RW {{ $pasien->rw }}</dd>
                                    <div class="col-md-12">
                                        <hr />
                                    </div>
																		<dt class="col-sm-2">Kel/Kec, Kota</dt>
                                    <dd class="col-sm-10">Kelurahan {{ $pasien->kelurahan->nama_kelurahan}} / Kecamatan {{ $pasien->kelurahan->nama_kecamatan}}, Kota {{ $pasien->kelurahan->nama_kota}}</dd>
                                    <div class="col-md-12">
                                        <hr />
                                    </div>
																		<dt class="col-sm-2">Tanggal Lahir</dt>
                                    <dd class="col-sm-10">{{ Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</dd>
                                    <div class="col-md-12">
                                        <hr />
                                    </div>
																		<dt class="col-sm-2">Jenis Kelamin</dt>
                                    <dd class="col-sm-10">{{ $pasien->jenis_kelamin}}</dd>
                                    <div class="col-md-12">
                                        <hr />
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <br />
                        <form action="{{ route('pasien.destroy', $pasien->id) }}" method="post">
                          <a href="{{ route('pasien.edit',$pasien->id) }}"
														class="pull-left btn btn-warning btn-md btn-jarak-kebawah">
														<i class="fa fa-pencil" title="Ubah Data"></i>
													</a>
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" class="pull-left btn btn-danger btn-md btn-jarak-button-detail"
                                  onclick="return confirm('Yakin ingin menghapus data pasien Ini ?')">
                                  <i class="fa fa-trash" title="Hapus Data"></i>
                          </button>
                          <a href="{{ route('pasien.index') }}" class="pull-right btn btn-primary btn-md">
                              <i class="fa fa-mail-reply" title="Kembali"></i>
                          </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
