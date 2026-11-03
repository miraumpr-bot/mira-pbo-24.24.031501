<?php
// LAB 2 — Class, object, constructor
// Spesifikasi:
//  - Mahasiswa(string $nim, string $nama, string $prodi, float $ipk)
//      info(): string
//      predikat(): string  -> ipk >= 3.51 'Cumlaude', ipk >= 3.01 'Sangat Memuaskan', selain itu 'Memuaskan'
//  - Produk(string $nama, int $harga, int $stok)
//      totalNilai(): int   -> harga x stok

class Mahasiswa
{
   public string $nim;
   public string $nama;
   public string $prodi;
   public float $ipk;
    
   public function __construct(string $nim, string $nama, string $prodi, float $ipk)
   {
       
   $this->nim = $nim;
   $this->nama = $nama;
   $this->prodi = $prodi;
   $this->ipk = $ipk;
}

public function info(): string
{ 
    return "{$this->nim} - {$this->nama} ({$this->prodi}), IPK: {$this->ipk}";
}
public function predikat(): string
{ 
    if ($this->ipk >=3.51) {
        return 'Cumlaude';
    } elseif ($this->ipk >=3.01) {
        return 'Sangat Memuaskan';
    } else {
        return 'Memuaskan';
    }
  }
}
class Produk
{ 
    public string $nama;
    public int $harga;
    public int $stok;
    
    public function __construct(string $nama, int $harga, int $stok)
    { 
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    }
    
    public function totalNilai() : int
    {
        return $this->harga * $this->stok;
    }
}
//TODO: buat 3 objek mahasiswa dan tampilkan info() + predikat()
$mhs1 = new Mahasiswa('12345', 'Ali', 'PTI', 3.80);
$mhs2 = new Mahasiswa('12346', 'Budi', 'PTI', 3.30);
$mhs3 = new Mahasiswa('12347', 'Citra', 'PTI',3.72);

echo $mhs1->info() . "| predikat: " . $mhs1->predikat() . "\n";
echo $mhs2->info() . "| predikat: " . $mhs2->predikat() . "\n";
echo $mhs3->info() . "| predikat: " . $mhs3->predikat() . "\n";