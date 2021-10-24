<?php
    include "koneksi.php";
    $id = $_GET['id_mahasiswa'];
    $ambilData = mysqli_query($koneksi, "DELETE FROM tblmahasiswa WHERE id_mahasiswa='$id'");

    echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='data_mahasiswa.php';
	            </script>";

?>