<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function index(Request $request) {
        $contacts = Contact::with('category')
            ->filter($request->only(['category_id', 'gender', 'keyword', 'created_at']))->paginate(7)->appends(request()->query());
        $query = Contact::with('category')->filter($request->all());
        $categories = Category::all();
        return view('admin.index', compact('contacts', 'categories'));
    }

    public function show($id) {
        $contact = Contact::with('category')->findOrFail($id);
        return view('admin.modal', compact('contact'));
    }

    public function destroy($id) {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.index')->with('success', '削除が完了しました');
    }

    public function export(Request $request) {
        $contacts = Contact::with('category')
            ->filter($request->only(['category_id', 'gender', 'keyword', 'created_at']))
            ->get();

        $response = new StreamedResponse(
            function () use ($contacts) {
                $handle = fopen('php://output', 'w');
                fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));
                fputcsv($handle, ['ID', '姓', '名', '性別', 'メールアドレス', '電話番号', '住所', '建物名', 'お問い合わせの種類', 'お問い合わせ内容', '作成日']);
                foreach ($contacts as $contact) {
                    fputcsv($handle, [
                        $contact->id,
                        $contact->last_name,
                        $contact->first_name,
                        $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他'),
                        $contact->email,
                        $contact->tel,
                        $contact->address,
                        $contact->building,
                        $contact->category->content ?? '',
                        $contact->detail,
                        $contact->created_at->format('Y-m-d H:i:s'),
                    ]);
                }
                fclose($handle);
            });
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="contacts.csv"');

        return $response;
    }
}
