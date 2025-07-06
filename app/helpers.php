<?php 

use Spatie\Multitenancy\Facades\Tenant;

if (! function_exists('tenant')) {
    function tenant() {
        return Tenant::current();
    }
}
