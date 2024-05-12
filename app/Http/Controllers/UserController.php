<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use App\DataTables\UsersDataTable;

class UserController extends Controller
{

    public function showAllUser(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->setRowClass(function ($user) {
                        return $user->id % 2 == 0 ? 'alert-success' : 'alert-warning';
                    })
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('users');
    }

}
