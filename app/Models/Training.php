<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Das Model dient der Kommunikation mit der Datenbanktabelle "Trainings"
 */

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'repetition',
        'name_id',
        'user_id'
    ];


    protected static function booted()
    {
        static::creating(function ($fillable) {
            $fillable->user_id = Auth::id();
        });
    }

    /**
     * getUser gibt den Nutzer anhand der Fremdschlüssel id user_id zurück
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * getTrainingName gibt die TrainingsNamen anhand der name_id zurück
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getTrainingName() {
        return $this->belongsTo(TrainingName::class, 'name_id');
    }

}


