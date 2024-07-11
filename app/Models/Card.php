<?php

namespace App\Models;

use App\Observers\CardObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([CardObserver::class])]
class Card extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['created_at','updated_at'];
    // protected $fillable = [
    //     "title",
    //     "description",        
    //     "imageRoute",
    //     "category"
    // ];
    

    /**
     * Get the user that owns the Card
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    
}
