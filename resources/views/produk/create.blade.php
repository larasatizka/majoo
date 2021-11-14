@extends('layouts.default')
@section('title', __( 'Tambah Produk' ))
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        	<div class="card">
                <div class="header">
                    <h2>
                        Tambah Produk
                    </h2>
                    <ul class="header-dropdown m-r--5">
                    </ul>
                </div>
                <div class="body">
                	@include('layouts.partials.notification')
                    <form id="upload_form" method="POST" enctype="multipart/form-data" action="{{ URL::to('/do-add-produk') }}">
                    	@csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nama Produk</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Kategori</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control" name="id_kategori" required="">
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach($data AS $kt)
                                                <option value="{{ $kt->id_kategori }}">{{ $kt->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Foto Produk</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" class="form-control" placeholder="Foto Produk" name="foto_produk" required="" id="file1" onchange="uploadFile()">
                                    </div>
                                    <br>
                                    <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                                    <h6 id="status"></h6>
                                    <p id="loaded_n_total"></p>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Harga</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" placeholder="Harga" name="harga" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label>Deskripsi</label>
                        <br><br>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea id="default" placeholder="Deskripsi" name="deskripsi" required=""></textarea>
                            </div>
                        </div>
                        
                        <br>
                        <button type="submit" class="btn btn-primary waves-effect">
                        	<i class="material-icons">save</i> 
	                        <span>SIMPAN</span>
	                    </button>
                    </form>
                </div>
            </div>
    	</div>
    </div>
</div>
@endsection
@section('javascript')
    <script type="text/javascript">
        tinymce.init({
            selector: "#default",
            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            }
        });

        function _(el) {
          return document.getElementById(el);
        }

        function uploadFile() {
          var file = _("file1").files[0];
          // alert(file.name+" | "+file.size+" | "+file.type);
          var formdata = new FormData();
          formdata.append("file1", file);
          var ajax = new XMLHttpRequest();
          ajax.upload.addEventListener("progress", progressHandler, false);
          ajax.addEventListener("load", completeHandler, false);
          ajax.addEventListener("error", errorHandler, false);
          ajax.addEventListener("abort", abortHandler, false);
          ajax.open("POST", "tambah-produk"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
          //use file_upload_parser.php from above url
          ajax.send(formdata);
        }

        function progressHandler(event) {
          _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
          var percent = (event.loaded / event.total) * 100;
          _("progressBar").value = Math.round(percent);
          _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
        }

        function completeHandler(event) {
          _("status").innerHTML = event.target.responseText;
          _("progressBar").value = 0; //wil clear progress bar after successful upload
        }

        function errorHandler(event) {
          _("status").innerHTML = "Upload Failed";
        }

        function abortHandler(event) {
          _("status").innerHTML = "Upload Aborted";
        }
        
    </script>
@endsection