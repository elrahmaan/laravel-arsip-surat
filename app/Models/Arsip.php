<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsip';
    public $timestamps = true;

    protected $fillable = [
        'id', 'nomor', 'judul', 'category_id'
    ];
}
