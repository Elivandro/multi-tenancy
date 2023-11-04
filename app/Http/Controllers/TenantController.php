<?php

namespace App\Http\Controllers;

use App\Models\User;

class TenantController extends Controller
{
    public function __construct(protected User $user)
    {
        $this->user = $user;
    }
    
    public function index()
    {
        $tenant = tenant();
        $users = $this->user->SimplePaginate(5);

        return view('tenant.index', compact(['users', 'tenant']));
    }
}
