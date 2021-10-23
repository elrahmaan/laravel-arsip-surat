<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsips';
    public $timestamps = true;

    protected $fillable = [
        'nomor', 'judul', 'file_surat', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
