<?php

$id = $_GET['id'];
//echo $id;

$ambil   = $koneksi->query("SELECT * FROM tb_berita  WHERE berita_id = '$id'");
$pecah   = $ambil->fetch_object();
$gambar = $pecah->berita_gambar;

unlink('assets/gambar_berita/' . $gambar);

$hapus = $koneksi->query("DELETE FROM tb_berita WHERE berita_id='$id'");

if ($hapus) {
    echo "<script>
    Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
    );

    window.location='index.php?page=module/berita/index';
    </script>";
} else {
    echo "<script>alert('Data Tidak Dihapus');
    window.location='index.php?page=module/berita/index';
    </script>";
}
