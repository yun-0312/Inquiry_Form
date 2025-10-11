<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function index () {
        
        return view('index');
    }

    public function confirm (ContactRequest $request) {
        $tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        $inputs = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail' ]);
        $inputs['tel'] = $tel;
        return view('confirm', compact('inputs'));
    }

    public function send (Request $request) {
        $action = $request->input('action');
        // 修正ボタンを押した場合
        if ($action === 'back') {
            return redirect()
                ->route('index')
                ->withInput($request->except('action'));
        }
        //送信ボタンを押した場合
        $inputs = $request->except('action');
        Contact::create($inputs);
        $request->session()->forget('_old_input');
        return view('thanks');
    }
}
