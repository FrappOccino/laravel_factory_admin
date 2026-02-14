<?php

namespace App\Http\Controllers;

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
        // dd('123');
        return view('admin.factories.index');
    }

    public function datatable(Request $request, DataTables $dataTables){
        $users = $this->factoriesRepo->datatable();

        return $dataTables->of($users)->toJson();
    }


}
