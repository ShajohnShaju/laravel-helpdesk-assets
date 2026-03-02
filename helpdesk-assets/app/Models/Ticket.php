<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public const PRIORITIES = ['P1', 'P2', 'P3', 'P4'];

    // labels for display
    public const PRIORITY_LABELS = [
        'P1' => 'Critical',
        'P2' => 'High',
        'P3' => 'Medium',
        'P4' => 'Request',
    ];

    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'asset_id',
        'created_by_user_id',
        'created_by_name',
        'assigned_to_user_id',
    ];

    public function getPriorityLabelAttribute(): string
    {
        return self::PRIORITY_LABELS[$this->priority] ?? 'Unknown';
    }
    
}
