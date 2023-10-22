<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'attachment', 'user_id', 'status'];
    
    protected function user() : BelongsTo 
    {
        return $this->belongsTo(User::class);    
    }
}
