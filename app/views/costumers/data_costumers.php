<p><?php Flasher::flash()?></p>
<div class="container mt-5">
    <div class="row-sm-4">
        <a class="btn btn-info mb-4 " href="<?php echo BASE_URL?>/costumers/tambah_cos">Tambah</a>
        <button class="btn btn-success mb-4 ms-2" id="print">Print</button>
    </div>
    <div class="row">
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Costumers</th>
                    <th scope="col">Brand</th>
                    <th scope="col">No. Telp</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th style="display: none;" scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                <?php foreach($data['cos'] as $data) : ?>
                <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td style="display:none ;"><?php echo $data['costumers_id']?></td>
                    <td><?php echo $data['costumers_nama']?></td>
                    <td><?php echo $data['brand_nama']?></td>
                    <td><?php echo $data['costumers_telp']?></td>
                    <td><?php echo $data['costumers_email']?></td>
                    <td><?php echo $data['costumers_alamat']?></td>
                    <td style="display: none;"><?php echo $data['keterangan']?></td>
                    <td>
                        <button class="btn btn-info editbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg></button>
                        <a href="<?php echo BASE_URL?>/costumers/hapus_cos/<?php echo $data['costumers_id']?>"
                            class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg></a>
                    </td>
                </tr>
                <?php $i++;?>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodal-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodal-1">Edit Costumers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="<?php echo BASE_URL?>/costumers/edit_costumers" method="POST">
                    <input type="hidden" class="form-control" id="costumers_id" name="costumers_id">
                    <div class="col-md-6">
                        <label for="costumers_nama" class="form-label">Nama Costumers</label>
                        <input type="text" class="form-control" id="costumers_nama" required name="costumers_nama">
                    </div>
                    <div class="col-md-6">
                        <label for="brand_nama" class="form-label">Brand</label>
                        <input type="text" class="form-control" required name="brand_nama" id="brand_nama">
                    </div>
                    <div class="col-12">
                        <label for="costumers_email" class="form-label">Email</label>
                        <input type="costumers_email" class="form-control" required name="costumers_email"
                            id="costumers_email">
                    </div>
                    <div class="col-12">
                        <label for="costumers_alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" required name="costumers_alamat" id="costumers_alamat">
                    </div>
                    <div class="col-md-6">
                        <label for="costumers_telp" class="form-label">No. Telp</label>
                        <input type="text" class="form-control" required name="costumers_telp" id="costumers_telp">
                    </div>
                    <div class="col-md-6">
                        <label for="keterangan" class="form-label">keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"
                            id="floatingTextarea"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(".editbtn").on("click", function() {
        $("#editmodal").modal("show");
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        console.log(data);
        $("#costumers_id").val(data[0]);
        $("#costumers_nama").val(data[1]);
        $("#brand_nama").val(data[2]);
        $("#costumers_telp").val(data[3]);
        $("#costumers_email").val(data[4]);
        $("#costumers_alamat").val(data[5]);
        $("#keterangan").val(data[6]);
    });

});
</script>