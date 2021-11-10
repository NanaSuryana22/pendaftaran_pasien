@extends('template_admin.master')
@section('title', "Data Kelurahan")
@section('kelurahan', 'active')
@section('content')
<div class="page-title">
  <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Kelurahan</h3>
          <p class="text-subtitle text-muted">Koleksi Data Kelurahan.</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item active"><a href="{{ route('kelurahan.index') }}">Kelurahan</a></li>
              </ol>
          </nav>
      </div>
  </div>
</div>
<section class="section">
  <div class="card">
    <div class="card-header">
      <div class="col-lg-12">
        @include('template_admin.notice')
      </div>
      <h4 class="card-title">Tabel Data Kelurahan</h4>
      <a href="{{ route('kelurahan.create') }}" class="btn btn-sm btn-info">Tambah Data Kelurahan</a>
    </div>
    <div class="card-body">
      <div>
				<section id="no-more-tables">
					<table class="table table-bordered table-striped table-condensed cf">
						<thead class="cf">
							<tr>
								<th class="th-font">Nomor</th>
								<th class="th-font">Nama Kelurahan</th>
								<th class="th-font">Nama Kecamatan</th>
								<th class="th-font">Nama Kota</th>
								<th class="th-font">Tanggal Dibuat</th>
								<th class="th-font">Tanggal Diubah</th>
								<th class="th-font">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($datas as $no => $data)
								<tr>
									<td class="th-font" data-title="Nomor">{{ ++$no + ($datas->currentPage()-1) * $datas->perPage() }}</td>
									<td class="th-font" data-title="Nama Kelurahan">{{ $data->nama_kelurahan }}</td>
									<td class="th-font" data-title="Nama Kecamatan">{{ $data->nama_kecamatan }}</td>
									<td class="th-font" data-title="Nama Kota">{{ $data->nama_kota }}</td>
									<td class="th-font" data-title="Tanggal Dibuat">
										{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>
									<td class="th-font" data-title="Tanggal Diubah">
										{{ Carbon\Carbon::parse($data->updated_at)->format('d-m-Y') }}</td>
									<td class="th-font" data-title="Aksi">
										<form action="{{ route('kelurahan.destroy', $data->id) }}" method="post">
											{{--  <a class="btn btn-sm btn-primary"
												href="{{ route('kelurahan.show',$data->id) }}" title="Lihat Detail">
												<i class="fa fa-eye"></i>
											</a>  --}}
											<a class="btn btn-sm btn-warning"
												href="{{ route('kelurahan.edit',$data->id) }}" title="Ubah Data">
												<i class="fa fa-pencil"></i>
											</a>
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-sm btn-danger" type="submit"
												onclick="return confirm('Yakin ingin menghapus data kelurahan ini ?')">
												<i class="fa fa-trash" title="Hapus Data"></i>
											</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $datas->links() }}
				</section>
			</div>			
    </div>
  </div>
</section>
@endsection
