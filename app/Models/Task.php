<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content'];

    public function createdByUserId()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function assignedToUserId()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'id');
    }
}
