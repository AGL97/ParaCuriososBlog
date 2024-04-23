<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['id','created_at','updated_at','user_id'];
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
