<?php
$pesan_sukses = "";
$pesan_error = "";

if (isset($_POST['kirim'])) {

    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $telepon = trim($_POST['telepon']);
    $pesan = trim($_POST['pesan']);

    if ($nama == "" || $email == "" || $telepon == "" || $pesan == "") {
        $pesan_error = "Semua kolom harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $pesan_error = "Format email tidak valid.";
    } elseif (!preg_match("/^[0-9+ ]{8,16}$/", $telepon)) {
        $pesan_error = "Nomor telepon harus 8 sampai 16 karakter angka.";
    } else {
        $pesan_sukses = "Terima kasih, " . htmlspecialchars($nama) . ". Konsultasi berhasil dikirim.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi - MalariaCare</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>

<header class="header">
    <h1>Malaria<span>Care</span></h1>
    <p>Website Informasi dan Edukasi Penyakit Malaria</p>
</header>

<nav class="menu">
    <a href="index.php">Home</a>
    <a href="profil.php">Profil Penyakit</a>
    <a href="gejala.php">Gejala</a>
    <a href="penyebab.php">Penyebab</a>
    <a href="pencegahan.php">Pencegahan</a>
    <a href="penanganan.php">Penanganan</a>
    <a href="konsultasi.php" class="aktif">Konsultasi</a>
    <a href="kontak.php">Kontak</a>
</nav>

<main class="container">

    <section class="bagian">

        <p class="label">HUBUNGI KAMI</p>
        <h2>Formulir Konsultasi</h2>

        <p>
            Silakan isi formulir berikut apabila ingin
            menyampaikan pertanyaan mengenai penyakit malaria.
        </p>

        <?php if ($pesan_sukses != "") { ?>
            <p class="berhasil">
                <?php echo $pesan_sukses; ?>
            </p>
        <?php } ?>

        <?php if ($pesan_error != "") { ?>
            <p class="gagal">
                <?php echo htmlspecialchars($pesan_error); ?>
            </p>
        <?php } ?>

        <form method="POST" action="konsultasi.php" onSubmit="return cekForm();">

            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama"
                   placeholder="Masukkan nama lengkap" required>

            <label for="email">Alamat Email</label>
            <input type="email" name="email" id="email"
                   placeholder="nama@email.com" required>

            <label for="telepon">Nomor Telepon</label>
            <input type="text" name="telepon" id="telepon"
                   placeholder="Masukkan nomor telepon" required>

            <label for="pesan">Pesan atau Pertanyaan</label>
            <textarea name="pesan" id="pesan"
                      placeholder="Tuliskan pertanyaan kamu"
                      required></textarea>

            <button type="submit" name="kirim">
                Kirim Konsultasi
            </button>

        </form>

        <p class="catatan-form">
            Formulir ini merupakan contoh latihan.
            Data belum disimpan ke database atau dikirim melalui email.
        </p>

    </section>

</main>

<footer class="footer">
    <p>Gadis Anastasya Yuanita_250205021</p>
</footer>

</body>
</html>