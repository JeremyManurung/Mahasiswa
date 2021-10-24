<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="container col-md-10">
    <h1 class="text-center">Data Mahasiswa</h1>
        <div class="card">
            <div class="card-header bg-primary text-white">
                Tabel Data Mahasiswa
            </div>
            <div class="card-body">
                <a href="input_mahasiswa.php" class="btn btn-primary">Tambah Data</a>
                <table class="table table-bordered">
                    <tr>
                        <th>NO</th>
                        <th>ID MAHASISWA</th>
                        <th>NPM</th>
                        <th>NAMA</th>
                        <th>PRODI</th>
                        <th>AKSI</th>  
                    </tr>
                    <?php
                        include "koneksi.php";
                        $batas = 10;
                        $halaman = @$_GET['halaman'];
                        if (empty ($halaman)) {
                            $posisi = 0;
                            $halaman = 1;

                        }else {
                            $posisi = ($halaman-1) * $batas;
                        }

                        $no=1 + $posisi;
                        $tampil = mysqli_query($koneksi,"SELECT * FROM tblmahasiswa LIMIT $posisi,$batas");
                        while ($data=mysqli_fetch_array($tampil)) 
                        {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['id_mahasiswa'];?></td>
                        <td><?php echo $data['npm'];?></td>
                        <td><?php echo $data['nama'];?></td>
                        <td><?php echo $data['prodi'];?></td>
                        <td>
                            <a href="edit_mahasiswa.php?id_mahasiswa=<?php echo $data['id_mahasiswa']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id_mahasiswa=<?php echo $data['id_mahasiswa']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php }?>

                </table>
                
                <?php
                $query2 = mysqli_query($koneksi, "select * from tblmahasiswa ");
                $jumlahdata = mysqli_num_rows ($query2);
                $jumlahhalamahan = ceil($jumlahdata/$batas);
                ?>

                <nav aria-label="Page navigation example">
                <ul class="pagination">
                <?php
                for($i=1;$i<=$jumlahhalamahan;$i++)
                            if ($i != $halaman) {
                                echo "<li class='page-item'><a class='page-link' href=\"data_mahasiswa.php?halaman=$i\">$i</a></li>";
                            }else {
                                echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                            }
                ?>
                </ul>
                </nav>
            </div>
        </div>
    </div>
</body>
</html>