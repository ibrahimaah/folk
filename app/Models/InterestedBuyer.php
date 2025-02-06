<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedBuyer extends Model
{
    use HasFactory;
    protected $fillable = ['listing_id', 'name', 'email', 'phone', 'message'];
}
