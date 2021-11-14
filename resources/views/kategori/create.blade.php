<form method="POST" action="{{ URL::to('/do-add-kategori') }}">
    @csrf
    <label>Nama Kategori</label>
    <div class="form-group">
        <div class="form-line">
            <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" required="">
        </div>
    </div>
    <br>
</form>