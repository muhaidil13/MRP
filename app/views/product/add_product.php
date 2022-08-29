<p><?php Flasher::flash()?></p>
<div class="container-sm mt-5 shadow p-6" style="width: 70vw;">
    <form class="row g-3" action="<?php echo BASE_URL;?>/material/add_material" method="POST" id="add_item">

        <div class="col-md-6">
            <label for="material_name" class="form-label">Material Nama</label>
            <input type="text" class="form-control" id="material_name" required name="material_name">
        </div>
        <div class="col-md-6">
            <label for="material_sku" class="form-label">Material SKU</label>
            <input type="text" class="form-control" id="material_sku" required name="material_sku">
        </div>

        <div class="col-md-6">
            <label for="category" class="mb-1">Kategory</label>
            <select class="form-select form-select-sm" id="category" name="category_id"
                aria-label=".form-select-sm example" style="width:455px; height:43px">
                <option selected>Pilih Category</option>
                <?php foreach($data['cat'] as $key => $val):?>
                <option value="<?php echo $val["category_id"]?>"><?php echo $val["category_name"]?></option>
                <?php endforeach;?>
                <option value="tampil_modal_cat">+Tambah Category</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="material_unit" class="mb-1">Satuan Ukur</label>
            <select class="form-select form-select-sm" id="material_unit" name="material_unit"
                aria-label=".form-select-sm example" style="width:455px; height:43px">
                <option selected>Pilih Satuan Ukur</option>
                <?php foreach($data['ukur'] as $key => $val):?>
                <option value="<?php echo $val['material_unit']?>"><?php echo $val['unit']?></option>
                <?php endforeach;?>
                <option value="tampil_ukur">+Tambah Satuan</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="material_brand" class="form-label">Material Brand</label>
            <input type="text" class="form-control" required name="material_brand" id="material_brand">
        </div>
        <div class="col-md-6">
            <label for="material_price" class="form-label">Material Price</label>
            <input type="text" class="form-control" required name="material_price" id="material_price">
        </div>
        <div class="col-12">
            <label for="stok_awal" class="form-label">Stock Awal</label>
            <input type="stok_awal" class="form-control" required name="stok_awal" id="stok_awal">
        </div>
        <div class="col-12">
            <label for="lead_time" class="form-label">Lead Time</label>
            <input type="text" class="form-control" required name="lead_time" id="lead_time">
        </div>

        <div class="col-12 mb-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-secondary" href="<?php echo BASE_URL;?>/costumers/index">Kembali</a>
        </div>
    </form>
</div>



<!-- Modal -->
<div class="modal fade" id="Tambah_satuan" tabindex="-1" aria-labelledby="editmodal-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodal-1">Tambah Satuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="<?php echo BASE_URL?>/material/satuan" method="POST">
                    <div class="col">
                        <label for="unit" class="form-label">Unit</label>
                        <input type="text" class="form-control" id="unit" required name="unit">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="Tambah_category" tabindex="-1" aria-labelledby="editmodal-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodal-1">Tambah Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="<?php echo BASE_URL?>/material/category" method="POST">
                    <div class="col">
                        <label for="name_category" class="form-label">Unit</label>
                        <input type="text" class="form-control" id="name_category" required name="name_category">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {

    $('#category').on('change', function() {
        if ($(this).val() === 'tampil_modal_cat') {
            $('#Tambah_category').modal('show');
        }
    });
    $("#material_unit").on("change", function() {
        if ($(this).val() === "tampil_ukur") {
            $("#Tambah_satuan").modal("show");
        }
    });
});
</script>