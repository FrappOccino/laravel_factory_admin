<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Factories;

class Employees extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = ['firstname', 'lastname', 'factory_id', 'email', 'phone'];

    public function manufactory()
    {
        return $this->belongsTo(Factories::class, 'factory_id', 'id');
    }
}
