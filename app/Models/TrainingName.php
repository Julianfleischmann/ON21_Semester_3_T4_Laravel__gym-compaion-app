<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Das Model dient der Kommunikation mit der Datenbanktabelle "TrainingNames"
 */

class TrainingName extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
