<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Contact::with('category');

        if ($request->filled('keyword')) {
        $query->where(function ($q) use ($request) {
                $q->where('last_name', 'like', '%' . $request->keyword . '%')
                ->orWhere('first_name', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->filled('gender')) {
        $query->where('gender', $request->gender);
        }

        if ($request->filled('category')) {
        $query->where('category_id', $request->category);
        }

        if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7);

        return view('admin.index', compact('contacts', 'categories'));
    }

    public function export(Request $request)
    {
        $query = Contact::with('category');

        if ($request->filled('keyword')) {
        $query->where(function ($q) use ($request) {
            $q->where('last_name', 'like', '%' . $request->keyword . '%')
            ->orWhere('first_name', 'like', '%' . $request->keyword . '%')
            ->orWhere('email', 'like', '%' . $request->keyword . '%');
        });
        }

        if ($request->filled('gender')) {
        $query->where('gender', $request->gender);
        }

        if ($request->filled('category')) {
        $query->where('category_id', $request->category);
        }

        if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();

        $response = new StreamedResponse(function () use ($contacts) {
        $handle = fopen('php://output', 'w');

        fputcsv($handle, ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類']);

        foreach ($contacts as $contact) {
            $gender = match($contact->gender) {
                1 => '男性',
                2 => '女性',
                default => 'その他'
            };

            fputcsv($handle, [
                $contact->last_name . ' ' . $contact->first_name,
                $gender,
                $contact->email,
                $contact->category->content ?? ''
            ]);
            }

            fclose($handle);
        });

    $response->headers->set('Content-Type', 'text/csv');
    $response->headers->set('Content-Disposition', 'attachment; filename="contacts.csv"');

    return $response;
    }

    public function reset()
    {
        return redirect('/admin');
    }

    public function destroy(Request $request)
    {
    Contact::find($request->id)->delete();
    return redirect('/admin');
    }

}