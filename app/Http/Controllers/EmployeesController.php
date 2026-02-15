<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesRequest;
use App\Repositories\Employees\EmployeesRepositoryInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeesController extends Controller
{
    protected $employeesRepo;

    public function __construct(EmployeesRepositoryInterface $employeesRepo)
    {
        $this->employeesRepo = $employeesRepo;
    }
    public function index()
    {
        return view('admin.employees.index');
    }

    public function datatable(Request $request, DataTables $dataTables)
    {
        $employees = $this->employeesRepo->datatable();

        return $dataTables->of($employees)->toJson();
    }

    public function create(Request $request)
    {
        return view('admin.employees.create');
    }
    public function postCreate(EmployeesRequest $request)
    {
        $this->employeesRepo->create($request->validated());

        // return redirect()->route('admin.employees.index');
        return redirect()->route('admin.employees.create')
                    ->with('success', 'Employee created successfully!');   
    }

    public function update(Request $request, $id)
    {
        $employees = $this->employeesRepo->find($id);

        return view('admin.employees.update', compact('employees'));
    }
    public function postUpdate(EmployeesRequest $request)
    {
        $id = $request->input('employee_id');
        $data['firstname'] = $request->input('firstname');
        $data['latname'] = $request->input('latname');
        $data['factory_id'] = $request->input('factory_id');
        $data['email'] = $request->input('email');
        $data['phone'] = $request->input('phone');
        $this->employeesRepo->find($id)->update($data);
        
        return redirect()
            ->route('admin.employees.update', $id)
            ->with('success', 'Employee updated successfully!');
    }

    public function delete(Request $request, $id)
    {
        $deleted = $this->employeesRepo->delete($id);

        if ($deleted) {
            return response()->json(['success' => true, 'message' => 'Employee deleted']);
        } else {
            return response()->json(['success' => false, 'message' => 'Deletion failed'], 400);
        }
    }
}
