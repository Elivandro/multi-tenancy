<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tenant\TenantRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Tenant;

class HomeController extends Controller
{
    public function __construct(protected Tenant $tenants)
    {
        $this->tenants = $tenants;
    }
    
    public function create()
    {
        $tenants = $this->tenants->all();
        return view('tenancy.index',  compact('tenants'));
    }

    public function store(TenantRequest $request)
    {
        $tenentData = $request->validated();

        $imagePath = Storage::put("{$tenentData['id']}/images/logo", $tenentData['logo']);
        $imagePath = Storage::url($imagePath);

        $tenentData['logo'] = $imagePath;

        $tenants = $this->tenants->create($tenentData);
        $tenants->domains()->create(['domain' => "{$tenants->id}.localhost"]);

        return redirect()->route('home')->with('success', 'registro feito com sucesso');
    }
}
