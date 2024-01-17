<?php

namespace App\Repositories;

use App\Models\Tenant;
use App\Repositories\Contracts\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    protected $entity;
    public function __construct(Tenant $tenant)
    {
        $this->entity = $tenant;
    }

    public function getAllCompanies(int $per_page)
    {
        return $this->entity->paginate($per_page);
    }

    public function getCompanyByUuid($uuid)
    {
        return $this->entity
            ->where('uuid', $uuid)
            ->first();
    }
}
