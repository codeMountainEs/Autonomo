<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Order extends Model implements HasMedia
{
    use HasFactory,  InteractsWithMedia;

    protected $fillable = ['description','ubication','type', 'price','category_id','n_docu','image',];


    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function orderlines(): HasMany
   {
       return $this->hasMany(Orderlines::class);
   }


}
