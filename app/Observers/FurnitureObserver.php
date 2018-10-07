<?php /** @noinspection PhpUnusedParameterInspection */

namespace App\Observers;

use App\Models\Furniture;
use Psr\SimpleCache\InvalidArgumentException;

class FurnitureObserver
{
    /**
     * Handle the furniture "updated" event.
     *
     * @param  \App\Models\Furniture $furniture
     * @return void
     */
    public function updated(Furniture $furniture)
    {
        $this->updateCache();
    }

    /**
     * Handle the furniture "deleted" event.
     *
     * @param  \App\Models\Furniture $furniture
     * @return void
     */
    public function deleted(Furniture $furniture)
    {
        $furniture->tickets()->detach();
    }

    /**
     * Delete cache items.
     *
     * @return void
     */
    protected function updateCache()
    {
        try {
            cache()->delete('view-furniture');
        } catch (InvalidArgumentException | \Exception $e) {
            //
        }
    }
}
