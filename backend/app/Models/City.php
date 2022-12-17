<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use YourAppRocks\EloquentUuid\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory, HasUuid, Filterable;

    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'city_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
