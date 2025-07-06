<?php

namespace App\Models;

use Spatie\Multitenancy\Models\Tenant as BaseTenant;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Tenant extends BaseTenant
{
    use UsesTenantConnection;

    protected $fillable = ['name', 'domain', 'database'];

    public function getDatabaseName(): string
    {
        return $this->database;
    }
}
