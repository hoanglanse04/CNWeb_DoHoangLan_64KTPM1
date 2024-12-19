<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    protected $fillable=['computer_id', 'report_by', 'report_date', 'description','urgency','status'];

    public function Computer()
    {
        return $this->belongsTo(Computer::class);
    }
}
