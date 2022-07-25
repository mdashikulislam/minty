<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopItem extends Model
{
    use HasFactory;

    public function shops()
    {
        return $this->hasOne(Shop::class,'id','shop_id');
    }
    public function masterItems()
    {
        return $this->hasOne(MasterItem::class,'id','master_item_id');
    }
}
