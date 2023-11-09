<?php
if (isset($_POST['nisn'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_kelas = $_POST['id_kelas'];

    $query = mysqli_query($koneksi, "INSERT INTO siswa (nisn,nis,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,id_kelas) VALUES('$nisn','$nis','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$id_kelas')");

    if ($query) {
        echo '<script>alert("Data Berhasil Ditambah !");location.href="?page=siswa";</script>';
    }
}
?>
<h1 class="h3 mb-3">Tambah Siswa</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">NISN</label>
                        <div class="col-sm-12">
                            <input type="number" name="nisn" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <div class="col-sm-12">
                            <input type="number" name="nis" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <div class="col-sm-12">
                            <input type="text" name="tempat_lahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <div class="col-sm-12">
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas & Jurusan</label>
                        <select name="id_kelas" class="form-select">
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM kelas INNER JOIN  jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?php echo $data['id_kelas'] ?>"><?php echo $data['nama_kelas'] ?> - <?php echo $data['nama_jurusan'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary btn-sm rounded"><i data-feather="save"></i></button>
                        <button type="reset" class="btn btn-danger btn-sm rounded"><i data-feather="refresh-ccw"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>