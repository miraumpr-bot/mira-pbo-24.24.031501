<?php
declare(strict_types=1);

// LAB 4 - Static, const, fitur PHP 8

class Mahasiswa
{
    // Konstanta BATAS_SKS
    public const BATAS_SKS = 24;

    // Static counter untuk melacak jumlah objek
    private static int $jumlah = 0;

    // Constructor property promotion dengan readonly property
    public function __construct(
        public readonly string $nim,
        public string $nama
    ) {
        // Menambahkan counter setiap kali objek baru dibuat
        self::$jumlah++;
    }

    // Method static untuk mendapatkan jumlah objek
    public static function getJumlah(): int
    {
        return self::$jumlah;
    }
}

// Enum Semester berbasis string (Backed Enum)
enum Semester: string
{
    case Ganjil = 'ganjil';
    case Genap = 'genap';
}

// Enum Predikat dengan method label()
enum Predikat
{
    case Cumlaude;
    case SangatMemuaskan;
    case Memuaskan;

    public function label(): string
    {
        return match($this) {
            self::Cumlaude => 'Pujian (Cumlaude)',
            self::SangatMemuaskan => 'Sangat Memuaskan',
            self::Memuaskan => 'Memuaskan',
        };
    }
}

