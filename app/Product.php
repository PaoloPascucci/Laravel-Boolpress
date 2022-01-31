<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'image','price','user_id'];


    /**
     * Get all of the users for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
/**
 * Get the users that owns the ProduTo
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function users(): BelongsTo
{
    return $this->belongsTo(User::class);
}
}
