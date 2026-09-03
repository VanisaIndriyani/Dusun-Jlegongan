<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'description',
        'content',
        'image',
    ];

    public static $typeLabels = [
        'sejarah' => 'Sejarah Dusun',
        'geografis' => 'Geografis',
        'struktur' => 'Struktur Kepadukuhan',
        'beranda_hero' => 'Hero Beranda (Gambar)',
        'kontak' => 'Kontak (No. Telp)',
    ];

    public static $typeColors = [
        'sejarah' => ['bg' => '#fef3c7', 'color' => '#92400e'],
        'geografis' => ['bg' => '#dbeafe', 'color' => '#1e40af'],
        'struktur' => ['bg' => '#ede9fe', 'color' => '#5b21b6'],
        'beranda_hero' => ['bg' => '#fce7f3', 'color' => '#9d174d'],
        'kontak' => ['bg' => '#ffedd5', 'color' => '#9a3412'],
    ];

    public function getTypeLabelAttribute(): string
    {
        return self::$typeLabels[$this->type] ?? Str::headline($this->type);
    }

    public function getTypeColorAttribute(): array
    {
        return self::$typeColors[$this->type] ?? ['bg' => '#d1fae5', 'color' => '#047857'];
    }
}
