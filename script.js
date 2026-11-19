function cekForm() {

    var nama = document.getElementById("nama").value.trim();
    var email = document.getElementById("email").value.trim();
    var telepon = document.getElementById("telepon").value.trim();
    var pesan = document.getElementById("pesan").value.trim();

    if (nama == "" || email == "" || telepon == "" || pesan == "") {
        alert("Semua kolom harus diisi!");
        return false;
    }

    if (email.indexOf("@") == -1 || email.indexOf(".") == -1) {
        alert("Masukkan alamat email yang benar!");
        return false;
    }

    if (telepon.length < 8 || telepon.length > 16 ||
        !/^[0-9+ ]+$/.test(telepon)) {
        alert("Nomor telepon harus berisi 8 sampai 16 angka!");
        return false;
    }

    if (pesan.length < 10) {
        alert("Pesan minimal 10 karakter!");
        return false;
    }

    return true;
}