function hitungStatus() {
    const nilaiTeori = parseFloat(document.getElementById("nilaiTeori").value);
    const nilaiPraktik = parseFloat(document.getElementById("nilaiPraktik").value);
    const hasil = document.getElementById("hasil");

    if (isNaN(nilaiTeori) || isNaN(nilaiPraktik) || nilaiTeori < 0 || nilaiPraktik < 0 || nilaiTeori > 100 || nilaiPraktik > 100) {
        hasilElement.innerHTML = '<p style="color: orange;">⚠️ Masukkan nilai angka yang valid (0-100) untuk kedua bidang.</p>';
        hasilElement.className = ''; 
        return; 
    }
    const rataRata = (nilaiTeori + nilaiPraktik) / 2;
    
    let statusKelulusan = '';
    let kelasStatus = '';
    
    if (rataRata >= 75) {
        statusKelulusan = 'Lulus';
        kelasStatus = 'lulus';
    } else {
        statusKelulusan = 'Tidak Lulus, Perlu Remidial';
        kelasStatus = 'tidak-lulus';
    }

    hasilElement.innerHTML = '
        <p>Nilai Teori: <strong>${nilaiTeori}</strong></p>
        <p>Nilai Praktik: <strong>${nilaiPraktik}</strong></p>
        <hr>
        <p>Rata-Rata: <strong>${rataRata.toFixed(2)}</strong></p>
        <p>Status: <span class="${kelasStatus}">${statusKelulusan}</span></p>
        `;

    // Opsional: Atur kelas container hasil untuk tampilan dinamis (jika diperlukan)
    hasilElement.className = kelasStatus;
}