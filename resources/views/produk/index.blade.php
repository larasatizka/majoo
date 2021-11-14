@extends('layouts.default')
@section('title', __( 'Produk' ))
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Daftar Produk
                <ul class="header-dropdown m-r--5">
                	<a href="{{ URL::to('/tambah-produk') }}" class="btn btn-success">Tambah Produk</a>
                </ul>
            </div>
            <div class="body">
            	@include('layouts.partials.notification')
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-exportable dataTable">
                        <thead>
                            <tr>
                            	<th style="width: 10px;">No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Foto Produk</th>
                                <th>Harga Produk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($data AS $key => $value)
                        		<tr>
                        			<td>{{ $loop->iteration }}</td>
                        			<td>{{ $value->nama_produk }}</td>
                                    <td>{{ $value->nama_kategori }}</td>
                                    <td><img src="{{ asset('asset') }}/{{ $value->foto_produk }}" style="width: 100px; height: 100px;"> </td>
                                    <td>Rp. {{ number_format($value->harga, 2) }}</td>
                        			<td>
                        				<a href="{{ URL::to('edit-produk/'.$value->id_produk) }}" class="btn btn-primary">Edit/Detail</a>
	                        			<a href="{{ URL::to('delete-produk/'.$value->id_produk) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
                        			</td>
                        		</tr>
                        	@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection