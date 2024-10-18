<?php

namespace App\Models;

use App\Enums\ContactRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jiri extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'starting_at',
        'user_id'
    ];



    protected function casts(): array
    {
        return [
            'starting_at' => 'date:Y-m-d H:i',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function students(): BelongsToMany
    {
        return $this->contacts()
            ->withPivot('id')
            ->withPivotValue('role', ContactRole::Student->value)
            ->withTimestamps();
    }

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, Attendance::class);
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, Assignment::class);
    }

    public function evaluators(): BelongsToMany
    {
        return $this->contacts()
            ->withPivot('id')
            ->withPivotValue('role', ContactRole::Evaluator->value)
            ->withTimestamps();
    }

    public function attendances(): HasMany
    {
        return $this->HasMany(Contact::class, Attendance::class);
    }
}
