<p><?php Flasher::flash()?></p>
<div class="container mt-5">
    <div class="row-sm-4">
        <a class="btn btn-info mb-3 offset-1 " href="<?php echo BASE_URL?>/system/signup">Tambah User</a>
    </div>
    <div class="row">
        <table class="m-auto table table-hover text-center" style="width:70vw">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama user</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Level</th>
                    <th scope="col">Last Login</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                <?php foreach($data['user'] as $data) : ?>
                <tr>
                    <th scope="row"><?php echo $i?></th>
                    <td style="display:none;"><?php echo $data['user_id']?></td>
                    <td><?php echo $data['username']?></td>
                    <td><?php echo $data['nama_user']?></td>
                    <td><?php echo $data['create_date']?></td>
                    <td><?php echo $data['level_id']?></td>
                    <td><?php echo $data['last_login']?></td>
                    <td>
                        <button class="btn btn-info editbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg></button>
                        <a class="btn btn-danger"
                            href="<?php echo BASE_URL?>/supplier/delete_supplier/<?php echo $data['id_supplier']?>"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash" viewBox="0 0 16 16">
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
                <h5 class="modal-title" id="editmodal-1">Edit Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="<?php echo BASE_URL?>/supplier/edit_supplier" method="POST">
                    <input type="hidden" class="form-control" id="id_supplier" name="id_supplier">
                    <div class="col-md-6">
                        <label for="nama_sup" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" id="nama_sup" required name="nama_supplier">
                    </div>
                    <div class="col-md-6">
                        <label for="owner_sup" class="form-label">Owner Supplier</label>
                        <input type="text" class="form-control" required name="owner_supplier" id="owner_supplier">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" required name="email" id="email">
                    </div>
                    <div class="col-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" required name="alamat" id="alamat">
                    </div>
                    <div class="col-md-6">
                        <label for="no_telp" class="form-label">No. Telp</label>
                        <input type="text" class="form-control" required name="no_telp" id="no_telp">
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
    $('.editbtn ').on('click ', function() {
        $('#editmodal').modal('show');
        $tr = $(this).closest('tr');
        // Membuat Array Baru yang ada didalam tr
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        console.log(data);
        $('#id_supplier').val(data[0]);
        $('#nama_sup').val(data[1]);
        $('#owner_supplier').val(data[2]);
        $('#email').val(data[3]);
        $('#alamat').val(data[4]);
        $('#no_telp').val(data[5]);
    });
});
</script>