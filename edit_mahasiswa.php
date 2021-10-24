<?php
    include "koneksi.php";
    $id = $_GET['id_mahasiswa'];
     $ambilData = mysqli_query($koneksi, "SELECT * FROM customer WHERE idcustomer='$id'");
    $data=mysqli_fetch_array($ambilData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    
    <div class="container col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Edit Data Mahasiswa
            </div>
            <div class="card-body">
                <form action="" method="POST" class="form-item">

                    <div class="form-group">
                        <label for="npm">Npm</label>
                        <input type="text" name="npm"value="<?php echo @$data['npm'] ?>"  class="form-control col-md-9" placeholder="Masukkan Npm">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama"value="<?php echo @$data['nama'] ?>" class="form-control col-md-9" placeholder="Masukkan Nama">
                    </div>

                    <div class="form-group">
                    <label>Program Studi</label>
                    <select class="form-control col-md-9" name="prodi">
                        <option></option>
                        <option value="S1-SI">S1-SI</option>
                        <option value="S1-TI">S1-TI</option>
                    </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
                    <button type="reset" class="btn btn-danger">BATAL</button>
                </form>

            </div>
        </div>
    </div>


</body>
</html>

<?php
        if(isset($_POST['simpan']))
        {
            $npm        = $_POST['npm'];
            $nama       = $_POST['nama'];
            $prodi      = $_POST['prodi'];

            mysqli_query($koneksi, "UPDATE tblmahasiswa
            SET npm='$npm', nama='$nama', prodi='$prodi' WHERE id_mahasiswa='$id'") or die(mysqli_error($koneksi));

			echo "<script>
						alert('Edit Data Suksess!!');
						document.location='data_mahasiswa.php';
	            </script>";
			}

?>