<?php

namespace App\Models;

use App\Models\Party;
use App\Models\Plane;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diamond extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parties()
    {
        return $this->belongsTo(Party::class);
    }

    public function planes()
    {
        return $this->belongsTo(Plane::class);
    }
}
