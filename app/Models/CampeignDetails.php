<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampeignDetails extends Model
{
    use HasFactory;

    protected $table = 'campeign_details';

    protected $fillable = [
        'campeignID',
        'language',
        'center',
        'name',
        'contact_no',
    ];
}
