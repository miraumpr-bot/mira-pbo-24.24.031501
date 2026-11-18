<?php
// LAB 9 — Exception (bagian PHPUnit dikerjakan lokal, kirim tautan repositori)
// Spesifikasi:
//  - NilaiTidakValidException & SaldoTidakCukupException extends Exception
//  - Siswa(): setNilai(int) melempar NilaiTidakValidException jika di luar 0–100
//  - Rekening(float $saldo): tarik(float) melempar SaldoTidakCukupException; getSaldo(): float

// TODO: dua custom exception
 class NilaiTidakValidException extends Exception{}
 class SaldoTidakCukupException extends Exception {}

class Siswa
{
    private int $nilai;
    public function setNilai(int $nilai): void
    {
        if ($nilai < 0 || $nilai > 100) {
            throw new NilaiTidakValidException("Nilai harus berada antara 0 dan 100.");
        }
        $this->nilai = $nilai;
    }
    public function getNilai(): int
    {
        return $this->nilai;
    }
}

class Rekening
{
      private float $saldo;
      public function __construct(float $saldo)
      {
           $this->saldo = $saldo;  
      }
      public function tarik(float $jumlah): void
      {
          if ($jumlah > $this->saldo) {
              throw new SaldoTidakCukupException("saldo tidak cukup untuk melakukan penarikan.");
          }
              $this->saldo -=$jumlah;
      }
      public function getSaldo(): float
      {
           return $this->saldo;
      }
}

// Coba setelah selesai (hapus tanda komentar):
 try {
     (new Siswa())->setNilai(150);
 } catch (NilaiTidakValidException $e) {
     echo 'Tertangkap: ' . $e->getMessage(). "\n";
 }
try {
      $rekening = new Rekening(100000);
      $rekening->tarik(150000);
} catch (SaldoTidakCukupException $e) {
     echo 'Tertangkap: ' . $e->getMessage(). "\n";
 }