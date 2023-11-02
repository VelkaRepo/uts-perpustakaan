<?php 
if (!isset($_GET['aksi'])){
?>
    <div class="container-fluid px-4">
                <h1 class="mt-4">Data Buku</h1>                      
                <div class="card mb-4">
                    <div class="card-header">
                        <a type="button" class="btn btn-primary" href="index.php?page=buku&aksi=tambah">Tambah Buku</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode Buku</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Foto</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $buku=mysqli_query($koneksi, "SELECT * FROM buku");
                            $no = 1;
                            while ($data = mysqli_fetch_array($buku)){
                            ?>
                                <tr>
                                   
                                    <td><?php echo $data['kode_buku']; ?></td>
                                    <td><?php echo $data['judul']; ?></td>
                                    <td><?php echo $data['penulis']; ?></td>
                                    <td><?php echo $data['penerbit']; ?></td>
                                    <td><?php echo $data['foto']; ?></td>
                                    <td><?php echo $data['stok']; ?></td>
                                    <td><a href="index.php?page=buku&aksi=edit&id=<?php echo $data['kode_buku'] ?>">Edit</a> | 
                                        <a href="index.php?page=buku&aksi=hapus&id=<?php echo $data['kode_buku'] ?>">Hapus</a></td>
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
                <h1 class="mt-4">Data Buku</h1>                      
                <div class="card mb-4 col-md-8">
                    <div class="card-header">
                       <h5> Tambah Buku </h5>
                    </div>
                    <div class="card-body">
                        <form action=''  method="POST" enctype='multipart/form-data'>                        
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="a">
                                    <label>Kode Buku</label>                                
                                </div>                            
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="b">
                                    <label>Judul</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="c">
                                    <label>Penulis</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="d">
                                    <label>Penerbit</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="file" name="e">
                                    <label>Foto Buku</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="d">
                                    <label>Stok</label>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-block" type="submit" name="simpan">Simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $dir_foto = 'foto/';
    $filename = basename($_FILES['e']['name']);
    $uploadfile = $dir_foto . $filename;

    if ($filename != '') {
        if (move_uploaded_file($_FILES['e']['tmp_name'], $uploadfile)) {
            mysqli_query($koneksi, "INSERT INTO buku (kode_buku, judul, penulis, penerbit, foto_buku, stok)           
                VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$filename')");

            echo "<script>window.alert('Sukses Menambahkan Data Buku.');
                    window.location='buku'</script>";
        } else {
            echo "<script>window.alert('Gagal Menambahkan Data Buku.');
                    window.location='index.php?page=buku&aksi=tambah'</script>";
        }
    } else {
        mysqli_query($koneksi, "INSERT INTO buku (kode_buku, judul, penulis, penerbit, stok)            
            VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]')");

        echo "<script>window.alert('Sukses Menambahkan Data Buku .');
                window.location='buku'</script>";
    }
}

} elseif ($_GET['aksi'] == 'edit') {
    $buku = mysqli_query($koneksi, "SELECT * FROM buku where kode_buku='$_GET[id]'");
    $buku = mysqli_fetch_array($buku);
    ?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data buku</h1>                      
        <div class="card mb-4 col-md-8">
            <div class="card-header">
                <h5> Update Buku </h5>
            </div>
            <div class="card-body">
                <form action='' method="POST" enctype='multipart/form-data'>      
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="a" value="<?php echo $buku['kode_buku']; ?>">
                        <label>Kode Buku</label>
                    </div>
                    <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="a" value="<?php echo $buku['kode_buku']; ?>">
                        <label>Judul Buku</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="c" value="<?php echo $buku['penulis']; ?>">
                        <label>Penulis</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="d" value="<?php echo $buku['penerbit']; ?>">
                        <label>Penerbit</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="file" name="e">
                        <label>Foto Buku</label>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-block" type="submit" name="update">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['update'])) {
        $dir_foto = 'foto/';
        $filename = basename($_FILES['e']['name']);
        $uploadfile = $dir_foto . $filename;

        if ($filename != '') {
            if (move_uploaded_file($_FILES['e']['tmp_name'], $uploadfile)) {
                mysqli_query($koneksi, "UPDATE buku SET kode_buku = '$_POST[a]'
                                                    judul = '$_POST[b]',
                                                    penulis = '$_POST[c]',
                                                    penerbit = '$_POST[d]',
                                                    foto_buku = '$filename' where kode_buku = '$_GET[id]'");
                echo "<script>window.alert('Sukses Update Data buku.');
                        window.location='buku'</script>";
            } else {
                echo "<script>window.alert('Gagal Update Data buku.');
                        window.location='index.php?page=buku&aksi=edit&id=$_GET[id]'</script>";
            }
        } else {
            mysqli_query($koneksi, "UPDATE buku SET kode_buku = '$_POST[a]',
                                                judul = '$_POST[b]',
                                                penulis = '$_POST[c]',
                                                penerbit = '$_POST[d]' where kode_buku = '$_GET[id]'");
            echo "<script>window.alert('Sukses Update Data buku .');
                    window.location='buku'</script>";
        }
    }
} elseif ($_GET['aksi'] == 'hapus') { 
    mysqli_query($koneksi, "DELETE FROM buku where kode_buku='$_GET[id]'");
    echo "<script>window.alert('Data buku Berhasil Di Hapus.');
                            window.location='buku'</script>";
}

?>