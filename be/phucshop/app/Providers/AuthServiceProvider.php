<?php

namespace App\Providers;

use App\Product;
use App\Services\PermissionGateAndPolicyAccess;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Define permission
        $permissionGateAndPolicy = new PermissionGateAndPolicyAccess();
        $permissionGateAndPolicy->setGateAndPolicyAccess();











//        // menu
//        Gate::define('menu-list', function ($user) {
//            return $user->checkPermissionAccess(config('permissions.access.menu-list'));
//        });
//        Gate::define('product-edit', function ($user, $id) {
//            $product = Product::find($id);
//            if ($user->checkPermissionAccess('product_edit') && $user->id === $product->user_id) {
//                return true;
//            }
//            return false;
//        });
//        Gate::define('product-list', function ($user) {
//            return $user->checkPermissionAccess('product_list');
//        });
    }
}
