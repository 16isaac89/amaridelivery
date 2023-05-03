<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'routes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'location',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function routeOrders()
    {
        return $this->hasMany(Order::class, 'route_id', 'id');
    }

    public function routesDrivers()
    {
        return $this->belongsToMany(Driver::class);
    }

    public function places()
    {
        return $this->belongsToMany(Place::class);
    }
}
