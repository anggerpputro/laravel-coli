<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{

  protected $table = "akun";

  protected $fillable = [
    'username',
    'nama',
    'nomorhp',
    'alamat',
    'jenis_kelamin',
    'email',
    'umur',
  ];

  // protected $guarded = [
  // ];

  protected function scopeUsername($query, $username) {
    return $query->where('username', '=', $username);
  }

  protected function scopeLakiLaki($query) {
    return $query->where('jenis_kelamin', '=', 'laki-laki');
  }

  protected function scopePerempuan($query) {
    return $query->where('jenis_kelamin', '=', 'perempuan');
  }
}
