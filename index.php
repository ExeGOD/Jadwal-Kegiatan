<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kegiatan</title>
</head>
<body>
    <h1>Jadwal Kegiatan</h1>

    <?php
    // Fungsi untuk menampilkan jadwal kegiatan
    function tampilkanJadwal($kegiatan) {
        echo '<ul>';
        foreach ($kegiatan as $hari => $aktivitas) {
            echo '<li><strong>' . $hari . ':</strong> ' . $aktivitas . '</li>';
        }
        echo '</ul>';
    }

    // Inisialisasi jadwal kegiatan
    $jadwalKegiatan = array(
        'Senin'    => 'Sekolah',
        'Selasa'   => 'Sekolah lagi',
        'Rabu'     => 'Sekolah lagi',
        'Kamis'    => 'Sekolah lagi',
        'Jumat'    => 'Sekolah lalu jumatan',
        'Sabtu'    => 'Kerumah fahd dan push epep',
        'Minggu'   => 'Kerumah fahd dan push epep lagi sampe grendmaster'
    );

    // Menampilkan jadwal kegiatan menggunakan fungsi
    tampilkanJadwal($jadwalKegiatan);
    ?>

    <form method="post" action="">
        <label for="hari">Pilih hari untuk menambah kegiatan:</label>
        <select name="hari" id="hari" required>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
            <option value="Minggu">Minggu</option>
        </select>
        <br>
        <label for="aktivitas">Tambahkan kegiatan:</label>
        <input type="text" name="aktivitas" id="aktivitas" required>
        <br>
        <button type="submit">Tambah Kegiatan</button>
    </form>

    <?php
    // Menambah kegiatan baru ke jadwal jika formulir dikirim
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hari = isset($_POST['hari']) ? $_POST['hari'] : '';
        $aktivitas = isset($_POST['aktivitas']) ? $_POST['aktivitas'] : '';

        // Validasi input
        if ($hari && $aktivitas) {
            // Menambah kegiatan baru ke jadwal
            $jadwalKegiatan[$hari] = $aktivitas;

            // Menampilkan jadwal yang telah diperbarui
            echo '<h2>Jadwal Kegiatan Setelah Penambahan:</h2>';
            tampilkanJadwal($jadwalKegiatan);
        } else {
            echo '<p style="color: red;">Harap isi kedua field untuk menambah kegiatan.</p>';
        }
    }
    ?>
</body>
</html>
