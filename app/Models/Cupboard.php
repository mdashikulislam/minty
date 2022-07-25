<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupboard extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function masterItems()
    {
        return $this->hasOne(MasterItem::class,'id','master_item_id');
    }
}
