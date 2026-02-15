<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Api\Employees\EmployeesRepositoryInterface;

class EmployeeApiController extends Controller
{
    protected $employeeRepo;

    public function __construct(EmployeesRepositoryInterface $employeeRepo)
    {
        $this->employeeRepo = $employeeRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->employeeRepo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
