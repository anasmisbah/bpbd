<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">

<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Pengguna</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
            <li class="breadcrumb-item active">Pengguna</li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Pengguna</h3>
        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
            <li class="nav-item">
                <a class="nav-link active" href="<?= route_to('user.create'); ?>"><i class="fas fa-plus"></i></a>
            </li>
            </ul>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach($user as $item): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $item['nama']; ?></td>
                <td><?= $item['email']; ?></td>
                <td>
                    <a href="<?= route_to('user.detail',$item['id']); ?>" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <form class="d-inline" id="form-delete" style="display: none" action="" method="POST">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" id="item_id">
        <input type="hidden" name="_method" value="DELETE">
    </form>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('admin_assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?= base_url('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('admin_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('admin_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('admin_assets/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>

<script>
$(function () {
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });


    const status = '<?= session()->getFlashdata('pesan'); ?>'

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    if (status) {
        console.log(status);
        Toast.fire({
            icon: 'success',
            title: status
        })
    }

    const error = '<?= session()->getFlashdata('error'); ?>'
    if (error) {
        Toast.fire({
            icon: 'error',
            title: error
        })
    }

    $(document).on('click','.btn-delete',function(e){
        e.preventDefault()
        let action = $(this).data('action')
        let itemId = $(this).data('item_id')

        let form = $('#form-delete')
        let inputItemId = $('#item_id')
        form.attr('action',action)
        inputItemId.val(itemId)

        Swal.fire({
            title: "Apakah anda yakin ingin menghapus?",
            text: "Anda tidak dapat mengembalikan data setelah dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Iya, Hapus",
            cancelButtonText : "Tidak"
        }).then(function(result) {
            if (result.value) {
                form.submit()
            }
        });
    });
});
</script>
<?= $this->endSection(); ?>
  
