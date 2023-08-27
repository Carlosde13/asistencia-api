<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Maestro extends Model
{
    use HasFactory;

    protected $table = 'maestros';

    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class);
    }
}
