<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table="employees";
    protected $fillable = ['name', 'email', 'salary','dep_id'];

     public function departs()
    {

        return $this->belongsTo(Department::class,'dep_id');
    }
}
