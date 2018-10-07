<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Process
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Process whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Process whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Process whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Process whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Process extends Model
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
        return trans('process.' . $this->name);
    }
}
