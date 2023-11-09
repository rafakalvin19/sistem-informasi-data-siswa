<?php
$id = $_GET['id'];
if (isset($_POST['nisn'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_kelas = $_POST['id_kelas'];

    $query = mysqli_query($koneksi, "UPDATE siswa SET nisn='$nisn',nis='$nis',nama='$nama',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',id_kelas='$id_kelas' WHERE nisn='$id'");

    if ($query) {
        echo '<script>alert("Data Berhasil Diupdate !");location.href="?page=siswa";</script>';
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$id'");
$data = mysqli_fetch_array($query);
?>
<h1 class="h3 mb-3">Ubah Siswa</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">NISN</label>
                        <div class="col-sm-12">
                            <input type="number" name="nisn" class="form-control" required value="<?php echo $data['nisn'] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <div class="col-sm-12">
                            <input type="number" name="nis" class="form-control" required value="<?php echo $data['nis'] ?>">
                        </div>
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama" class="form-control" required value="<?php echo $data['nama'] ?>">
                        </div>
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <div class="col-sm-12">
                            <input type="text" name="tempat_lahir" class="form-control" required value="<?php echo $data['tempat_lahir'] ?>">
                        </div>
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <div class="col-sm-12">
                            <input type="date" name="tanggal_lahir" class="form-control" required value="<?php echo $data['tanggal_lahir'] ?>">
                        </div>
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="Laki-laki" <?php if ($data['jenis_kelamin'] == 'Laki-laki') {
                                                            echo 'selected';
                                                        } ?>>Laki-laki</option>
                            <option value="Perempuan" <?php if ($data['jenis_kelamin'] == 'Perempuan') {
                                                            echo 'selected';
                                                        } ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas & Jurusan</label>
                        <select name="id_kelas" class="form-select">
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM kelas INNER JOIN  jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
                            while ($kelas = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?php echo $kelas['id_kelas'] ?>" <?php if ($data['id_kelas'] == $kelas['id_kelas']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?php echo $kelas['nama_kelas'] ?> - <?php echo $kelas['nama_jurusan'] ?></option>
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