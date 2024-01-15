<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'jenis',
    ];
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

}
