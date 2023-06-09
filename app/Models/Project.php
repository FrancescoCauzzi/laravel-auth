<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    // By including these attributes in the $fillable array, you are indicating that these attributes can be mass assigned using methods like create() or update() on the model. All other attributes not listed in $fillable will be guarded and cannot be mass assigned.
    protected $fillable = ['name', 'description', 'start_date', 'end_date', 'status', 'budget'];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
