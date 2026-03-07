<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan</title>
    <link rel="stylesheet" href="./style_index.css">


    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    
    <h2>Form Pengaduan</h2>
    <hr />
    <br>
    <center>
    <div class="label">
        <table>
            <form action="proses_index.php" method="POST">
                <tr>
                    <td><label for="">Nama Pelapor</label></td>
                    <td>:</td>
                    <td> <input class="input" type="text" name="nama_pelapor" placeholder="Opsional"></td>
                </tr>

                <tr>
                    <td><label for="">Kontak Pelapor</label></td>
                    <td>:</td>
                    <td> <input class="input" type="text" name="kontak_pelapor" placeholder="email/whatsapp"></td>
                </tr>

                <tr>
                    <td><label for="">Deskripsi Pengaduan</label></td>
                    <td>:</td>
                    <td> <textarea name="deskripsi" required placeholder="Jelaskan masalah yang Anda hadapi, termasuk lokasi atau detail lainnya"></textarea></td>
                </tr>

                <tr>
                    <td><label for="">Kategori Pengaduan</label></td>
                    <td>:</td>
                    <td> 
                        <select name="kategori">
                        <option value=""></option>
                        <option value="Lingkungan">Lingkungan</option>
                        <option value="Transportasi">Transportasi</option>
                        <option value="Layanan Publik">Layanan Publik</option>
                        <option value="Permasalahan Sosial">Permasalahan Sosial</option>
                        </select>
                    </td>
                </tr>
    
                <td>
                <button type="submit" value="Kirim Pengaduan">Kirim Pengaduan</button>
                </td>
            </form>
        </table>
    </center>
    
</body>
</html>