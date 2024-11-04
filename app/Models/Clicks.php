<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clicks extends Model
{
    use HasFactory;
    protected $table="all_clicks";



        public function user()
        {
            return $this->belongsTo(User::class);           

        }

        public function Clicks()
        {
            return $this->hasMany(Clicks::class);
        }

        public function Working()
        {
            return $this->hasMany(Working::class);
        }

}
