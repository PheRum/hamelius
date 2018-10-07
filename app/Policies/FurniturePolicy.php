<?php /** @noinspection PhpUnusedParameterInspection */

namespace App\Policies;

use App\Models\User;
use App\Models\Furniture;
use Illuminate\Auth\Access\HandlesAuthorization;

class FurniturePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the furniture.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Furniture  $furniture
     * @return mixed
     */
    public function view(User $user, Furniture $furniture)
    {
        return false;
    }

    /**
     * Determine whether the user can create furniture.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the furniture.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Furniture  $furniture
     * @return mixed
     */
    public function update(User $user, Furniture $furniture)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the furniture.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Furniture  $furniture
     * @return mixed
     */
    public function delete(User $user, Furniture $furniture)
    {
        return false;
    }
}
