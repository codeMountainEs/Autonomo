<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['description','ubication','type', 'price','category_id','n_docu',];


    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


}
