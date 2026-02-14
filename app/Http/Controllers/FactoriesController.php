<?php

namespace App\Http\Controllers;

use App\Http\Requests\FactoryRequest;
use App\Repositories\Factories\FactoriesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class FactoriesController extends Controller
{
    protected $factoriesRepo;

    public function __construct(FactoriesRepositoryInterface $factoriesRepo)
    {
        $this->factoriesRepo = $factoriesRepo;
    }
    public function index()
    {
        return view('admin.factories.index');
    }

    public function datatable(Request $request, DataTables $dataTables)
    {
        $factories = $this->factoriesRepo->datatable();

        return $dataTables->of($factories)->toJson();
    }

    public function create(Request $request)
    {
        return view('admin.factories.create');
    }
    public function postCreate(FactoryRequest $request)
    {
        $this->factoriesRepo->create($request->validated());

        // return redirect()->route('admin.factories.index');
        return view('admin.factories.create')->with('success', 'Factory created successfully!');
    }

    public function update(Request $request, $id)
    {
        $factory = $this->factoriesRepo->find($id);

        return view('admin.factories.update', compact('factory'));
    }
    public function postUpdate(FactoryRequest $request)
    {
        $this->factoriesRepo->find($request->input('id'))->update($request->validated());

        return redirect()->route('admin.factories.index');
    }

    public function delete(Request $request, $id)
    {
        $deleted = $this->factoriesRepo->delete($id);

        if ($deleted) {
            return response()->json(['success' => true, 'message' => 'Factory deleted']);
        } else {
            return response()->json(['success' => false, 'message' => 'Deletion failed'], 400);
        }
    }
}
