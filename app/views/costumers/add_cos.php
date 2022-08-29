<div class="container-sm mt-5 shadow p-6" style="width: 70vw;">
    <form class="row g-3" action="<?php echo BASE_URL;?>/costumers/add_costumers" method="POST">
        <div class="col-md-6">
            <label for="costumers_nama" class="form-label">Nama Costumers</label>
            <input type="text" class="form-control" id="costumers_nama" required name="costumers_nama">
        </div>
        <div class="col-md-6">
            <label for="brand_namas" class="form-label">Brand</label>
            <input type="text" class="form-control" required name="brand_nama" id="brand_nama">
        </div>
        <div class="col-12">
            <label for="costumers_email" class="form-label">Email</label>
            <input type="costumers_email" class="form-control" required name="costumers_email" id="costumers_email"
                placeholder="example@gmail.com">
        </div>
        <div class="col-12">
            <label for="costumers_alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" required name="costumers_alamat" id="costumers_alamat"
                placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-12">
            <label for="costumers_telp" class="form-label">No. Telp</label>
            <input type="number" class="form-control" required name="costumers_telp" id="costumers_telp"
                placeholder="Apartment, studio, or floor">
        </div>
        <div class="col">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
        </div>

        <div class="col-12 mb-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-secondary" href="<?php echo BASE_URL;?>/costumers/index">Kembali</a>
        </div>
    </form>
</div>