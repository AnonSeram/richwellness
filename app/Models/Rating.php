<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['pemesanan_id', 'rating', 'description', 'user_id'];

    public function pemesanan()
    {
        return $this->belongsTo(DataReservasi::class, 'pemesanan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
