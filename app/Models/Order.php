<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\InteractsWithMedia;

class Order extends Model
{
    use HasFactory,  InteractsWithMedia;

    protected $fillable = ['description','ubication','type', 'price','category_id','n_docu','image',];


    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function orderlineas(): HasMany
   {
       return $this->hasMany(Orderlines::class);
   }


}
