<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'cost', 'img', 'quantity','mota','comp_id'];
    public function comp(){
        return $this->belongsTo(Comp::class);
    }
}
