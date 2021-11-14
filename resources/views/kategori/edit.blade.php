<form method="POST" action="{{ URL::to('/do-update-kategori') }}">
    @csrf
    <input type="hidden" class="form-control" name="id_kategori" required="" value="{{ $data->id_kategori }}">
    <label>Nama Kategori</label>
    <div class="form-group">
        <div class="form-line">
            <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" required="" value="{{ $data->nama_kategori }}">
        </div>
    </div>
    <br>
</form>