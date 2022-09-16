<!DOCTYPE html>
<html>
    <head>
        <title>Registrasi</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/professional-portfolio.png">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <h1>Formulir Pendaftaran Peserta</h1>
        <div class="main-block">
            <form action="../php/data.php" method="post" enctype="multipart/form-data">
                <label>Nama Peserta</label>
                <input type="text" name="nama">
                <label>Tanggal Lahir</label>
                <input type="date" name="ttl" value="Tanggal Lahir">
                <label>Alamat Domisili</label>
                <input type="textarea" name="alamat">
                <label>Jenis Kelamin</label>
                <div class="select">
                    <input type="radio" name="jenis_kelamin" value="P"> Wanita
                    <input type="radio" name="jenis_kelamin" value="L"> Pria
                </div>
                <label>Jurusan</label>
                <div class="title-block">
                    <select name="jurusan" id="jurusan">
                        <option>-- Pilih --</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="informatika">Informatika</option>
                        <option value="akuntansi">Akuntansi</option>
                    </select>
                </div>
                <label>Upload Foto</label>
                <input type="file" name="ft" id="foto">
                <button type="submit" name="submit">Daftar</button>
            </form>
        </div>
    </body>
</html>