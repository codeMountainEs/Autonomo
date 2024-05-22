<?php

namespace App\Models;

use App\Filament\Resources\OrderResource\RelationManagers\OrderlinesRelationManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

         protected $fillable = ['name','price','image','is_active'];
   
       public function orderlineas():HasMany
   {
        return $this->hasMany(Orderlines::class);
   }

}
