<p><?php Flasher::flash()?></p>
<div class="container-sm mt-5 shadow p-6" style="width: 70vw;">
    <form class="row g-3" action="<?php echo BASE_URL;?>/product/add_product" method="POST" id="add_item">
        <div class="col-md-6">
            <label for="product_sku" class="form-label">Product SKU</label>
            <input type="text" class="form-control" id="product_sku" required name="product_sku">
        </div>
        <div class="col-md-6">
            <label for="product_name" class="form-label">Product Nama</label>
            <input type="text" class="form-control" id="product_name" required name="product_name">
        </div>
        <div class="col-md-6">
            <label for="product_brand" class="form-label">Product Brand</label>
            <input type="text" class="form-control" id="product_brand" required name="product_brand">
        </div>
        <div class="col-md-6">
            <label for="unit" class="form-label">unit</label>
            <input type="text" class="form-control" id="unit" required name="unit">
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
            <label for="sales_price" class="form-label">sales_price</label>
            <input type="text" class="form-control" id="sales_price" required name="sales_price">
        </div>
        <div class="col-12 mb-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-secondary" href="<?php echo BASE_URL;?>/costumers/index">Kembali</a>
        </div>
    </form>
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
                <form class="row g-3" action="<?php echo BASE_URL?>/product/category" method="POST">
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
});
</script>