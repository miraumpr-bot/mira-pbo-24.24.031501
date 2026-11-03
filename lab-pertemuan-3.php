<?php
// LAB 3 — Enkapsulasi
// Spesifikasi:
//  - Rekening(string $nomor, string $pemilik), properti PRIVATE $saldo = 0
//      setor(float $jumlah): bool   -> false jika jumlah <= 0
//      tarik(float $jumlah): bool   -> false jika jumlah > saldo
//      transfer(Rekening $tujuan, float $jumlah): bool
//      getSaldo(): float, getRiwayat(): array
//  - Siswa() dengan setNilai(int) (hanya 0–100) dan getNilai(): int

class Rekening
{
    private string $nomor;
    private string $pemilik;
    private float $saldo = 0;
    private array $riwayat = [];

    public function __construct(string $nomor, string $pemilik)
    {
        $this->nomor = $nomor;
        $this->pemilik = $pemilik;
    }

    public function setor(float $jumlah): bool
    {
        if ($jumlah <= 0) {
            return false; 
        }
        $this->saldo += $jumlah;
        $this->riwayat[] = "Setor: Rp" . $jumlah;
        return true;
    }

    public function tarik(float $jumlah): bool
    {
        if ($jumlah > $this->saldo || $jumlah <= 0) {
            return false;
        }
        $this->saldo -= $jumlah;
        $this->riwayat[] = "Tarik: Rp" . $jumlah;
        return true;
    }

    public function transfer(Rekening $tujuan, float $jumlah): bool
    {
        if ($jumlah <= 0 || $jumlah > $this->saldo) {
             return false;
        }
        
        $this->saldo -= $jumlah;
        $tujuan->saldo += $jumlah;
        
        $this->riwayat[] = "Transfer keluar ke: Rp" . $jumlah;
        $tujuan->riwayat[] = "Transfer masuk: Rp" . $jumlah;
        return true;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }
    
    public function getRiwayat(): array
    {
        return $this->riwayat;
    }
}

class Siswa
{
    private string $nama = "";
    private int $nilai = 0;

    public function setNama(string $nama): void
    {
        if (trim($nama) !== "") {
            $this->nama = $nama;
        }
    }
   
    public function getNama(): string
    {
        return $this->nama;
    }

    public function setNilai(int $nilai): void
    {
        if ($nilai >= 0 && $nilai <= 100) {
            $this->nilai = $nilai;
        }
    }
    
    public function getNilai(): int
    {
        return $this->nilai;
    }
}

$a = new Rekening('001', 'Andi');
$a->setor(100000);
echo "Saldo awal: " . $a->getSaldo() . "\n"; 
    