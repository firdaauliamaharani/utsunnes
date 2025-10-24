<html>
    <head>
        <title>::Data Registrasi::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-size: cover;
                background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 20px;
            }
            .container{
                background-color: white;
                border: 3px solid grey;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 600px;
                width: 100%;
            }
            h1{
                text-align: center;
                color: #333;
                margin-bottom: 30px;
                font-size: 28px;
            }
            .success-message{
                background-color: #d4edda;
                color: #155724;
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid #c3e6cb;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }
            
            /* MODIFIKASI: Style untuk pesan error umur */
            .error-message {
                background-color: #f8d7da;
                color: #721c24;
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid #f5c6cb;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }

            /* MODIFIKASI: Style untuk tabel data baru */
            .data-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .data-table th, .data-table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }
            .data-table th {
                background-color: #f2f2f2;
                color: #333;
            }

            .back-button{
                text-align: center;
                margin-top: 20px;
            }
            .back-button a{
                background-color: #007bff;
                color: white;
                padding: 12px 24px;
                text-decoration: none;
                border-radius: 5px;
                display: inline-block;
                transition: background-color 0.3s;
            }
            .back-button a:hover{
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Data Registrasi User</h1>
            
            <?php if (isset($_POST['submit'])): ?>
                <?php
                    // Ambil semua data dari POST
                    $nama_depan = htmlspecialchars($_POST['nama_depan']);
                    $nama_belakang = htmlspecialchars($_POST['nama_belakang']);
                    // PERSYARATAN #1: Ambil umur dan ubah ke integer
                    $umur = (int)$_POST['umur']; 
                    $asal_kota = htmlspecialchars($_POST['asal_kota']);
                    
                    // PERSYARATAN #2: Gabungkan nama depan dan belakang
                    $nama_lengkap = $nama_depan . " " . $nama_belakang;
                ?>

                <?php if ($umur < 10): ?>
                    <div class="error-message">
                        Error: Umur minimal adalah 10 tahun!
                    </div>
                <?php else: ?>
                    <div class="success-message">
                        Registrasi Berhasil!
                    </div>

                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Umur</th>
                                <th>Asal Kota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $jumlah_baris = 0; // Counter untuk jumlah baris
                                $nomor = 1;        // Counter untuk kolom "No"
                                
                                // PERSYARATAN #3: Looping sebanyak $umur
                                while ($jumlah_baris < $umur) {
                                    
                                    // PERSYARATAN #5: Skip no 7 dan 13
                                    if ($nomor == 7 || $nomor == 13) {
                                        $nomor += 2; // Lompat ke angka ganjil berikutnya
                                        continue;   // Ulangi loop (tanpa mencetak baris & tanpa menambah $jumlah_baris)
                                    }

                                    // Cetak baris tabel
                                    echo "<tr>";
                                    echo "<td>" . $nomor . "</td>";
                                    echo "<td>" . $nama_lengkap . "</td>";
                                    echo "<td>" . $umur . "</td>";
                                    echo "<td>" . $asal_kota . "</td>";
                                    echo "</tr>";

                                    // Increment kedua counter
                                    $nomor += 2; // PERSYARATAN #4: Selalu ganjil
                                    $jumlah_baris++; // Menandakan 1 baris telah dicetak
                                }
                            ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                
                <div class="back-button">
                    <a href="index.html">Kembali ke Form Registrasi</a>
                </div>

            <?php else: ?>
                <div style="text-align: center; color: #dc3545; padding: 20px;">
                    <h3>Error: Data tidak ditemukan</h3>
                    <p>Silakan isi form registrasi terlebih dahulu.</p>
                    <div class="back-button">
                        <a href="index.html">Kembali ke Form Registrasi</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>