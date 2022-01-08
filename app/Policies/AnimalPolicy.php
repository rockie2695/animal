<?php

namespace App\Policies;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnimalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Animal $animal)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Animal $animal)
    {
        // 只有刊登動物的會員可以操作更新的動作。
        if ($user->id === $animal->user_id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Animal $animal)
    {
        // 修改動物資料必須檢查，動物是否是由該會員新建的，利用animal 的user_id 判斷
        if ($user->id === $animal->user_id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Animal $animal)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Animal $animal)
    {
        //
    }

    public function before($user, $ability)
    {
        // 昨天新建的
        if ($user->permission == 'admin') {
            return true;
        }
    }
}
