<?php
include 'koneksi.php';
?>

<script>
    window.print();
</script>

<table border="1" width"100%" cellpadding="5" cell  spacing="0">
    <tr>
        <th colspan="8">
            <h2 style="margin: 0;">Data Siswa</h2>
        </th>
    </tr>
    <tr>
        <th>NISN</th>
        <th>NIS</th>
        <th>Nama Lengkap</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Kelas</th>
        <th>Jurusan</th>
    </tr>
    <tbody>
        <?php
        if (isset($_GET['kelas'])) {
            $kelas = $_GET['kelas'];
            $query = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE nama_kelas='$kelas'");
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
        }
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $data['nisn'] ?></td>
                <td><?php echo $data['nis'] ?></td>
                <td><?php echo $data['nama'] ?></td>
                <td><?php echo $data['tempat_lahir'] ?></td>
                <td><?php echo $data['tanggal_lahir'] ?></td>
                <td><?php echo $data['jenis_kelamin'] ?></td>
                <td><?php echo $data['nama_kelas'] ?></td>
                <td><?php echo $data['nama_jurusan'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>