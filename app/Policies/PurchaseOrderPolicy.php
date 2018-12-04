<?php

namespace App\Policies;

use App\User;
use App\PurchaseOrder;
use Illuminate\Auth\Access\HandlesAuthorization;

class PurchaseOrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the purchaseOrder.
     *
     * @param  \App\User  $user
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return mixed
     */
    public function view(User $user, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Determine whether the user can create purchaseOrders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the purchaseOrder.
     *
     * @param  \App\User  $user
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return mixed
     */
    public function update(User $user, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Determine whether the user can delete the purchaseOrder.
     *
     * @param  \App\User  $user
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return mixed
     */
    public function delete(User $user, PurchaseOrder $purchaseOrder)
    {
        //
    }
}
