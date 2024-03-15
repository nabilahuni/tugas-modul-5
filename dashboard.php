<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
</head>
<body>
    <div class="container">
        <h2>Upload File</h2>
        <form method="POST" enctype="multipart/form-data" action="upload.php">
            <div class="form-group">
                <label for="nis">NIS:</label>
                <input type="text" class="form-control" id="nis" name="nis" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Siswa:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            </div>
            <div class="form-group">
                <label for="telepon">Telepon:</label>
                <input type="text" class="form-control" id="telepon" name="telepon" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
            </div>
            <div class="form-group">
                <label for="file">File:</label>
                <input type="file" class="form-control-file" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
        <h2>Data Calon Mahasiswa</h2>
        <table class="table table-striped">
            <a href="laporan.php" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Cetak</a>
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //koneksi ke database
                include 'koneksi.php';
                $query = mysqli_query($koneksi, "SELECT * FROM calon_mhs");

                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                <td><?php echo $data['nis'];?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['jk'];?></td>
                <td><?php echo $data['telepon'];?></td>
                <td><?php echo $data['alamat'];?></td>
                
                <td><a href="download.php?file=<?php echo $data['file']?>" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span> Download</a></td>
                <td><a href="preview.php?file=<?php echo $data['file']?>" class="btn btn-primary"><span class="glyphicon glyphicon-preview"></span> preview</a></td>
                <td><a href="hapus.php?file=<?php echo $data['file']?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td> 
                </tr>
                <?php
                }
                ?>    
            </tbody>
        </table>
    </div>
</body>
</html>