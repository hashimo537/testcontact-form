<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    // 確認画面
    public function confirm(ContactRequest $request)

    {
    $contact = $request->only(['first_name','last_name','gender', 'email', 'tel', 'address','building','category_id','detail']);
    $category = Category::find($contact['category_id']);
     return view('confirm', compact('contact', 'category'));

    }

    // storeメソッド
    public function store(ContactRequest $request)
{
    Contact::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'gender' => $request->gender,
        'email' => $request->email,
        'tel' => $request->tel,
        'address' => $request->address,
        'building' => $request->building,
        'category_id' => $request->category_id,
        'detail' => $request->detail,
    ]);

    return redirect('/thanks');
}

    // thanksページ
    public function thanks()
    {
        return view('thanks');
    }

    public function admin()
    {
        return view('admin');
    }

    public function search()
    {
        return view('search');
    }

    public function reset()
    {
        return view('reset');
    }

    public function delete()
    {
        return view('delete');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        return view('logout');
    }

    public function export()
    {
        return view('export');
    }
}
