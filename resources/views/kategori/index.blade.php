@extends('layouts.default')
@section('title', __( 'Jenis Kategori' ))
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Daftar Jenis Kategori
                <ul class="header-dropdown m-r--5">
                	<a id="add-kategori" class="btn btn-success">Tambah Kategori</a>
                </ul>
            </div>
            <div class="body">
            	@include('layouts.partials.notification')
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-exportable dataTable">
                        <thead>
                            <tr>
                            	<th style="width: 10px;">No</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($data AS $key => $value)
                        		<tr>
                        			<td>{{ $loop->iteration }}</td>
                        			<td>{{ $value->nama_kategori }}</td>
                        			<td>
                        				<a data-value="{{ $value->id_kategori }}" class="btn btn-primary edit-kategori">Edit</a>
	                        			<a href="{{ URL::to('delete-kategori/'.$value->id_kategori) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
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

<div class="modal fade" id="addkategori-modal" tabindex="-1" role="dialog" aria-labelledby="addkategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="addkategoriModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ URL::to('/do-add-kategori') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="kategori"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editkategori-modal" tabindex="-1" role="dialog" aria-labelledby="editkategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="editkategoriModalLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ URL::to('/do-update-kategori') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="kategoriedit"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    $('#add-kategori').on('click', function(){
            $.ajax({
                    url: "{{ URL::to('tambah-kategori') }}",
                    type: 'GET',
                    dataType: 'HTML',
                })
                .done(function(e) {
                    $("#addkategori-modal").modal('show');
                    $("#kategori").html(e);
                })
     });

    $('.edit-kategori').on('click', function(){
        var id_kategori = $(this).data("value");
            $.ajax({
                    url: "{{ URL::to('edit-kategori') }}",
                    type: 'GET',
                    dataType: 'HTML',
                    data: {id_kategori: id_kategori},
                })
                .done(function(e) {
                    $("#editkategori-modal").modal('show');
                    $("#kategoriedit").html(e);
                })
     });
</script>
@endsection