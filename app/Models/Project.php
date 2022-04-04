<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'deadline',
        'status',
        'user_id',
        'client_id'
    ];

    public const STATUS = ['Abierto', 'En Progreso', 'Cancelado', 'Completado'];

    protected function deadline(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y') : null,
            set: fn ($value) => $value ?  Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d') : null
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function client()
    {
        return $this->belongsTo(Client::class)->withDefault();
    }
}
