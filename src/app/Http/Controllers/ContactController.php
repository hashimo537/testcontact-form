<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
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
    // 電話番号を結合
        $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;

        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'address',
            'building',
            'category_id',
            'detail'
        ]);
        // telを追加
        $contact['tel'] = $tel;
        $category = Category::find($contact['category_id']);
        return view('confirm', compact('contact', 'category'));

    }

    // storeメソッド
    public function store(Request $request)
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
    }
