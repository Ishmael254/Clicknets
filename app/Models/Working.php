<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Clicks;
use App\Models\Working;



class Working extends Model
{
    use HasFactory;

    protected $table="working";

   
    public function viewed(){
      
        $work = Clicks::where('ClickerId', $id)->get();

    }

    public function user()
    {
        return $this->hasOne(Working::class);
    }
    public function Clicks()
    {
        return $this->hasMany(Clicks::class);
    }

    




}
