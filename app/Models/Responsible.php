<?php

namespace App\Models;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Responsible extends Model
{
    use HasFactory;
    protected $fillable = [
        'reponsibleId',
        'reponsibleById',
        'reponsibleType',
    ];

    public function responsible()
    {
        return $this->morphTo();
    }

    public static function getResponsibleIds($id)
    {
        return Responsible::where('reponsibleById', $id)->pluck('id')->all();
    }
    public static function getResponsibles($id)
    {
        return Customers::whereIn(
                'id',
                Responsible::where('reponsibleById', $id)->pluck('id')->all()
            )
            ->get();
    }
}