<?php
// LAB 6 — Abstraction & polymorphism
// Spesifikasi:
//  - abstract BangunDatar: abstract luas(): float, abstract keliling(): float
//  - Lingkaran(float $r), Persegi(float $sisi), PersegiPanjang(float $p, float $l)
//  - interface Notifikasi { kirim(string $pesan): string }
//      Email, WhatsApp, SMS implements Notifikasi
//  - function kirimSemua(array $notifikasi, string $pesan): array (hasil tiap kirim)

abstract class BangunDatar 
{
    abstract public function luas(): float;
    abstract public function keliling(): float;
}

// Implementasi Lingkaran
class Lingkaran extends BangunDatar 
{
    private float $r;
    
    public function __construct(float $r) {
        $this->r = $r;
    }
    
    public function luas(): float {
        return pi() * $this->r * $this->r; // Akan menghasilkan ~153.94 untuk r=7
    }
    
    public function keliling(): float {
        return 2 * pi() * $this->r;
    }
}

// Implementasi Persegi
class Persegi extends BangunDatar 
{
    private float $sisi;
    
    public function __construct(float $sisi) {
        $this->sisi = $sisi;
    }
    
    public function luas(): float {
        return $this->sisi * $this->sisi;
    }
    
    public function keliling(): float {
        return 4 * $this->sisi;
    }
}

// Implementasi PersegiPanjang
class PersegiPanjang extends BangunDatar 
{
    private float $p;
    private float $l;
    
    public function __construct(float $p, float $l) {
        $this->p = $p;
        $this->l = $l;
    }
    
    public function luas(): float {
        return $this->p * $this->l;
    }
    
    public function keliling(): float {
        return 2 * ($this->p + $this->l);
    }
}
       // Implementasi Segitiga (menggunakan 3 sisi dengan rumus Heron untuk luas)
class Segitiga extends BangunDatar 
{
    private float $a;
    private float $b;
    private float $c;
    
    public function __construct(float $a, float $b, float $c) {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
    
    public function luas(): float {
        $s = $this->keliling() / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }
    
    public function keliling(): float {
        return $this->a + $this->b + $this->c;
    }
}

// 2. Interface Notifikasi
interface Notifikasi 
{
    public function kirim(string $pesan): string;
}

// Implementasi Email, WhatsApp, dan SMS
class Email implements Notifikasi 
{
    public function kirim(string $pesan): string {
        return "Mengirim Email: " . $pesan;
    }
}

class WhatsApp implements Notifikasi 
{
    public function kirim(string $pesan): string {
        return "Mengirim WhatsApp: " . $pesan;
    }
}

class SMS implements Notifikasi 
{
    public function kirim(string $pesan): string {
        return "Mengirim SMS: " . $pesan;
    }
}

// 3. Fungsi Polimorfis kirimSemua
function kirimSemua(array $notifikasi, string $pesan): array 
{
    $hasil = [];
    foreach ($notifikasi as $notif) {
        if ($notif instanceof Notifikasi) {
            $hasil[] = $notif->kirim($pesan);
        }
    }
    return $hasil;
}
?>