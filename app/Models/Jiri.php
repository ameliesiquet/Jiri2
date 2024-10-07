<?php

namespace App\Models;

use App\Enums\ContactRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jiri extends Model
{
    use HasFactory;

    protected $casts = [
        'starting_at' => 'date:Y-m-d H:i',
    ];

    protected $fillable = [
        'name',
        'starting_at',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function contacts():BelongsToMany
    {
        return $this->belongsToMany(Contact::class, Attendance::class)
        ->withPivot('role', 'id');
    }
    public function students():BelongsToMany
    {
        return $this
            ->contacts()
            ->withPivotValue('role', ContactRole::Student->value)
            ->withTimestamps();
    }
    public function evaluators():BelongsToMany
    {
        return $this
            ->contacts()
            ->withPivotValue('role', ContactRole::Evaluator->value)
            ->withTimestamps();
    }

    public function attendances():HasMany
    {
        return $this->hasMany(Contact::class, Attendance::class);
    }

    public function projects():BelongsToMany
    {
        return $this->belongsToMany(Project::class, Assignment::class);
    }


    /*public function addStudent(Contact $contact)
    {
        $this->contacts()->attach($contact, ['role' => 'student']);
    }

    public function addEvaluator(Contact $contact)
    {
        $this->contacts()->attach($contact, ['role' => 'evaluator']);
    }*/
}
