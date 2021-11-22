<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function login()
    {

        return view('blog.admin.admin_login');
    }
    public function checklogin(Request $request)
    {
        $data = $request->all();



        $admin = Admin::select()->where('name', 'Dmitrii')->get()[0];

        dd($admin->password,Hash::check('1234567qw',$admin->password));

        //if()
        // $2y$10$bvGFgBL/sUG99pYMrLKba.WycztJDruTG412s1Cw8sQZr2wmfdpFW
        //$2y$10$5qJmdhYlHG47UHcyHr5VFevuL985Eq9CTlIIBglwWYjHsgp0.i5DO

    }
}
