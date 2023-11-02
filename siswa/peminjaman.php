<?php 
if (!isset($_GET['aksi'])){
?>
    <div class="container-fluid px-4">
                <h1 class="mt-4">Data Peminjaman</h1>                      
                <div class="card mb-4">
                    <div class="card-header">
                        <a type="button" class="btn btn-primary" href="index.php?page=peminjaman&aksi=tambah">Tambah</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID Peminjaman</th>
                                    <th>Kode Buku</th>
                                    <th>ID Anggota</th>
                                    <th>ID Petugas</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $peminjaman=mysqli_query($koneksi, "SELECT * FROM peminjaman");
                            $no = 1;
                            while ($data = mysqli_fetch_array($peminjaman)){
                            ?>
                                <tr>
                                   
                                    <td><?php echo $data['id_peminjaman']; ?></td>
                                    <td><?php echo $data['kode_buku']; ?></td>
                                    <td><?php echo $data['id_anggota']; ?></td>
                                    <td><?php echo $data['id_petugas']; ?></td>
                                    <td><?php echo $data['tgl_pinjam']; ?></td>
                                    <td><?php echo $data['tgl_kembali']; ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td><a href="index.php?page=siswa&aksi=edit&id=<?php echo $data['id_peminjaman'] ?>">Edit</a> | 
                                        <a href="index.php?page=siswa&aksi=hapus&id=<?php echo $data['id_peminjaman'] ?>">Hapus</a></td>
                                </tr>
                            <?php
                            $no++;
                            }
                            ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
    </div>    
<?php
}elseif ($_GET['aksi']=='tambah'){     
?>
<div class="container-fluid px-4">
                <h1 class="mt-4">Data Peminjaman</h1>                      
                <div class="card mb-4 col-md-8">
                    <div class="card-header">
                       <h5> Tambah Data </h5>
                    </div>
                    <div class="card-body">
                        <form action=''  method="POST" enctype='multipart/form-data'>                        
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="a">
                                    <label>ID Peminjaman</label>                                
                                </div>                            
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="b">
                                    <label>Kode Buku</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="c">
                                    <label>ID Anggota</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="d">
                                    <label>ID Petugas</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="date" name="d">
                                    <label>Tanggal Pinjam</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="date" name="d">
                                    <label>Tanggal Kembali</label>
                                </div>
                                <style>
                                    .form-floating select:placeholder-shown + label {
                                        opacity: 0;
                                        top: -24px;
                                    }
                                    .form-floating select:focus + label {
                                        top: -24px;
                                    }
                                </style>

                                <div class="form-floating mb-3">
                                    <label for="status" class="visually-hidden">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="" disabled selected> Pilih Status </option>
                                        <option value="Pengajuan">Pengajuan</option>
                                        <option value="Proses">Proses</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-block" type="submit" name="simpan">Simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
</div>

<?php
if (isset($_POST['simpan'])){
    $dir_foto = 'foto/';
    $filename = basename($_FILES['e']['name']);
    $uploadfile = $dir_foto . $filename;
        if ($filename != ''){
            if (move_uploaded_file($_FILES['e']['tmp_name'], $uploadfile)) {            
                mysqli_query($koneksi,"INSERT INTO siswa (id_peminjaman, kode_buku, id_anggota, id_petugas, tgl_pinjam, tgl_kembali, status )           
                                VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$filename')");
                
                echo "<script>window.alert('Sukses Menambahkan Data Siswa.');
                        window.location='siswa'</script>";
            }else{
                echo "<script>window.alert('Gagal Menambahkan Data Siswa.');
                        window.location='index.php?page=siswa&aksi=tambah'</script>";
            }
        }else{
                mysqli_query($koneksi,"INSERT INTO siswa (id_peminjaman, kode_buku, id_anggota, id_petugas, tgl_pinjam, tgl_kembali, status )           
                VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]')");
                               
                echo "<script>window.alert('Sukses Menambahkan Data Peminjaman .');
                        window.location='siswa'</script>";
        }
}
}elseif ($_GET['aksi']=='edit'){
    $siswa = mysqli_query($koneksi, "SELECT * FROM siswa where id_siswa='$_GET[id]'");
    $data = mysqli_fetch_array($siswa);       
?>
<div class="container-fluid px-4">
                <h1 class="mt-4">Data Siswa</h1>                      
                <div class="card mb-4 col-md-8">
                    <div class="card-header">
                       <h5> Update Siswa </h5>
                    </div>
                    <div class="card-body">
                        <form action=''  method="POST" enctype='multipart/form-data'>      
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="a" value="<?php echo $data['nis']; ?>">
                                <label>NIS</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="b" value="<?php echo $data['nama_siswa']; ?>">
                                <label>Nama Siswa</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="c" value="<?php echo $data['jenis_kelamin']; ?>">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="d" value="<?php echo $data['alamat']; ?>">
                                <label>Alamat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="file" name="e">
                                <label>Foto Siswa</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block" type="submit" name="update">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
</div>
<?php
if (isset($_POST['update'])){
    $dir_foto = 'foto/';
    $filename = basename($_FILES['e']['name']);
    $uploadfile = $dir_foto . $filename;
        if ($filename != ''){
            if (move_uploaded_file($_FILES['e']['tmp_name'], $uploadfile)) {            
                mysqli_query($koneksi,"UPDATE siswa SET nis             = '$_POST[a]',
                                                        nama_siswa      = '$_POST[b]',
                                                        jenis_kelamin   = '$_POST[c]',
                                                        alamat          = '$_POST[d]',
                                                        foto_siswa      = '$filename' where id_siswa = '$_GET[id]'");           
                echo "<script>window.alert('Sukses Update Data Siswa.');
                        window.location='siswa'</script>";
            }else{
                echo "<script>window.alert('Gagal Update Data Siswa.');
                        window.location='index.php?page=siswa&aksi=tambah'</script>";
            }
        }else{
                mysqli_query($koneksi,"UPDATE siswa SET nis             = '$_POST[a]',
                                                        nama_siswa      = '$_POST[b]',
                                                        jenis_kelamin   = '$_POST[c]',
                                                        alamat          = '$_POST[d]',
                                                        foto_siswa      = '$filename' where id_siswa = '$_GET[id]'");                               
                echo "<script>window.alert('Sukses Update Data Siswa .');
                        window.location='siswa'</script>";
        }
}
}elseif ($_GET['aksi']=='hapus'){ 
	mysqli_query($koneksi, "DELETE FROM siswa where id_siswa='$_GET[id]'");
	echo "<script>window.alert('Data Siswa Berhasil Di Hapus.');
                                window.location='siswa'</script>";
}
?>