<?php

namespace App\Http\Controllers\front;

use App\EmailSenderModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class indexController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $create = EmailSenderModel::create($all);
        if($create)
        {
            Artisan::call('Reminder:Start');
            return redirect()->back()->with('success','Görəv göndərildi');
        }
        else
        {
            return redirect()->back()->with('warning','Xəta baş verdi!');
        }
    }
}
