<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campeign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    protected $table = 'campeign';
}
