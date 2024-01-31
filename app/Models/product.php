<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'created_by'
    ];
    protected $table = 'products';

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
