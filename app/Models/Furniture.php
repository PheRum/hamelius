<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Furniture
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Furniture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Furniture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Furniture whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Furniture whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $tickets
 */
class Furniture extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return string
     */
    public function getTitleAttribute()
    {
        return trans('furniture.' . $this->name);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tickets()
    {
        return $this->belongsToMany(Ticket::class);
    }
}
