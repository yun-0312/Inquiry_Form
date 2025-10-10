<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index () {
        return view('index');
    }

    public function confirm (Request $request) {
        $tel1 = $request->only('tel1');
        $tel2 = $request->only('tel2');
        $tel3 = $request->only('tel3');
        $tel = $tel1 . $tel2 . $tel3;
        $content = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel' => $tel, 'address', 'building', 'category_id', 'detail' ]);
        return view('confirm', compact('content'));
    }
}
