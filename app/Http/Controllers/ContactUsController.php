<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contactuses = DB::table('contactuses')->get();

        return view('receive', compact('contactuses'));

    }

    public function send()
    {
        return view('contactus');
    }

    public function sendprocess(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'nohp' => ['required'],
            'message' => ['required'],
        ]);

        $send = new Contactus();
        $send->name = $request->name;
        $send->email = $request->email;
        $send->nohp = $request->nohp;
        $send->message = $request->message;
        $send->save();

        return back()->with('status', 'Email Terkirim');
        // dd($request->all());
    }

    public function destroy($id)
    {
        DB::table('contactuses')->where('id', $id)->delete();
        return back()->with('status', 'Email Berhasil Di Hapus');
    }
}
