<h1 class="h3 mb-3">Kelas</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-header">
                <a href="?page=tambah-kelas" class="btn btn-success btn-sm">+ Tambah Kelas</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover cell-border" id="kelas">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM kelas INNER JOIN  jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['nama_kelas'] ?></td>
                                <td><?php echo $data['nama_jurusan'] ?></td>
                                <td>
                                    <a href="?page=ubah-kelas&id=<?php echo $data['id_kelas'] ?>" class="btn btn-warning btn-sm rounded"><i data-feather="edit"></i></a>
                                    <a href="?page=hapus-kelas&id=<?php echo $data['id_kelas'] ?>" onclick="return confirm('Yakin Untuk Menghapus ?')" class="btn btn-danger btn-sm rounded"><i data-feather="trash-2"></i></a>
                                </td>
                            </tr>
                        <?php

                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    let table = new DataTable('#kelas');
</script>