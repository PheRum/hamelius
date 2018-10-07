<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Status
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Status whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Status whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $style
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Status whereStyle($value)
 */
class Status extends Model
{
    public const STATUS_NEW = 1;
    public const STATUS_COMPLETED = 2;
    public const STATUS_CLOSE = 3;
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
        return trans('status.' . $this->name);
    }
}
