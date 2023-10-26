<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function item_condition() {
        return $this->belongsTo(ItemCondition::class, 'item_condition_id');
    }
    public function item_type() {
        return $this->belongsTo(ItemType::class, 'item_type_id');
    }
}
