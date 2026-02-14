<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Repositories\User\UserRepositoryInterface;
class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function datatable(Request $request, DataTables $dataTables){
        $users = $this->userRepo->datatable();

        return $dataTables->of($users)->toJson();
    }

}
