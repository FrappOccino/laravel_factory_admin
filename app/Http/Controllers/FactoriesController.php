<?php

namespace App\Http\Controllers;

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
        return view('admin.user.index');
    }

    public function datatable(Request $request, DataTables $dataTables){
        $users = DB::table('users');

        return $dataTables->of($users)->toJson();
    }


}
