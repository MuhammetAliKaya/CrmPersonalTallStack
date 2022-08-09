<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Responsible;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model
{
    use HasFactory, SoftDeletes, HasRoles;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phoneNumber',
    ];
    protected $guard_name = 'web';
    //scope
    public function scopelastDays($query, $days)
    {
        return $query->where("created_at", ">", now()->subDays($days));
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable', 'imageableType', 'imageableId');
    }
    public function responsible()
    {
        return $this->morphOne(Responsible::class, 'responsible', 'reponsibleType', 'reponsibleId');
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  Carbon::parse($value)->format('d-m-Y'),
        );
    }
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  Carbon::parse($value)->format('d-m-Y'),
        );
    }
    protected function surname(): Attribute
    {
        return Attribute::make(
            set: fn ($value) =>  strtoupper($value)
        );
    }
}