<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\Contracts\TenantRepositoryInterface;


class TenantService
{
    private $plan, $data = [];
    private $repository;
    
    public function __construct(TenantRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllTenants(int $per_page)
    {
       return $this->repository->getAllTenants($per_page);
    }

    public function getTenantByUuid(string $uuid)
    {
        return $this->repository->getTenantByUuid($uuid);
    }

    /**
     * Chama os métodos de armazenamento de tenants e users e retorna um usuario cadastrado
     * @param App\Models\Plan 
     * @param array data
     * @return App\Models\User
     */
    public function make(Plan $plan, array $data)
    {
        $this->plan = $plan;
        $this->data = $data;

        $tenant = $this->storeTenant();

        return $this->storeUser($tenant);        
    }
    /**
     * Armazena os tenants (inquilinos) provenientes do formulario de registro
     * @return tenant registrado
     */
    public function storeTenant()
    {
        $data = $this->data;

        return $this->plan->tenants()->create([
            'cnpj' => $data['cnpj'],
            'name' => $data['empresa'],            
            'email' => $data['email'],

            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }
    /**
     * Armazena os usuários vinculados aos tenants advindos do formulario de registro
     * @param tenant
     * @return user cadastrado
     */
    public function storeUser($tenant)
    {
        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);

        return $user;
    }
}