<?php

$id = $_GET['id'];
//echo $id;
$hapus = $koneksi->query("DELETE FROM tb_admin WHERE admin_id='$id'");

if ($hapus) {
    echo "<script>
    Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
    );

    window.location='index.php?page=module/admin/index';
    </script>";
} else {
    echo "<script>alert('Data Tidak Dihapus');
    window.location='index.php?page=module/admin/index';
    </script>";
}
