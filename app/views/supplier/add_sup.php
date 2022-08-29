<div class="container-sm mt-5 shadow p-6" style="width: 70vw;">
    <form class="row g-3" action="<?php echo BASE_URL;?>/supplier/add_supplier" method="POST">
        <div class="col-md-6">
            <label for="nama_sup" class="form-label">Nama Supplier</label>
            <input type="text" class="form-control" id="nama_sup" required name="nama_supplier">
        </div>
        <div class="col-md-6">
            <label for="owner_sup" class="form-label">Owner Supplier</label>
            <input type="text" class="form-control" required name="owner_supplier" id="owner">
        </div>
        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" required name="email" id="email" placeholder="example@gmail.com">
        </div>
        <div class="col-12">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" required name="alamat" id="alamat"
                placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-md-6">
            <label for="no_telp" class="form-label">No. Telp</label>
            <input type="text" class="form-control" required name="no_telp" id="no_telp">
        </div>

        <div class="col-12 mb-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-secondary" href="<?php echo BASE_URL;?>/supplier/index">Kembali</a>
        </div>
    </form>
</div>