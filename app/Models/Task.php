<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    //Para Mapagawas ang tinuod na value sa database like sa status
    //Instead of '1' Active ang iyang ipakita sa table
    protected $appends = ['status_string'];
    public function getStatusStringAttribute(){
        return $this -> status == 1 ? 'Active' : 'Inactive';
    }
}
