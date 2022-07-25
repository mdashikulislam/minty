<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CupboardHistory extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function shops()
    {
        return $this->hasOne(Shop::class,'id','shop_id');
    }

    public function items()
    {
        return $this->hasOne(MasterItem::class,'id','cupboard_id');
    }
}
