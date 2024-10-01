<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // Specify which attributes can be mass-assigned
    protected $fillable = [
        'subject',       // New field for subject
        'description',
        'priority',
        'category',
        'attachment',
        'reported_at',
        'status',        // Assuming you have a status field
        'user_id',      // User ID to associate the ticket with a user
    ];
    protected $casts = [
        'reported_at' => 'datetime',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
