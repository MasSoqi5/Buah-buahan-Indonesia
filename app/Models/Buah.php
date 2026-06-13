<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
 
class Buah extends Model
{
    protected $fillable = [
        'nama', 'slug', 'nama_latin', 'asal_daerah',
        'musim_panen', 'deskripsi', 'manfaat', 'gambar', 'author',
    ];
 
    protected static function booted(): void
    {
        static::creating(function ($buah) {
            if (empty($buah->slug)) {
                $buah->slug = Str::slug($buah->nama);
            }
        });
    }
}
 