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

        public function export()
{
    $contacts = Contact::all();

    $filename = "contacts.csv";

    $headers = [
        "Content-Type" => "text/csv",
        "Content-Disposition" => "attachment; filename=$filename",
    ];

    $callback = function() use ($contacts) {

        $file = fopen('php://output', 'w');

        // CSVヘッダー
        fputcsv($file, [
            'ID',
            '姓',
            '名',
            '性別',
            'メール',
            '電話番号',
            '住所',
            '建物名',
            'お問い合わせ種類',
            '内容'
        ]);

        foreach ($contacts as $contact) {
            fputcsv($file, [
                $contact->id,
                $contact->last_name,
                $contact->first_name,
                $contact->gender,
                $contact->email,
                $contact->tel,
                $contact->address,
                $contact->building,
                $contact->category_id,
                $contact->detail
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}
    }
