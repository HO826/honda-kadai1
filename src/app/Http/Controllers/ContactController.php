<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contact.index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $inputs = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'category_id',
            'detail'
        ]);
        $category = Category::find($inputs['category_id']);

        return view('contact.confirm', compact('inputs', 'category'));
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'category_id',
            'detail'
        ]);
        $data['tel'] = $data['tel1'] . $data['tel2'] . $data['tel3'];
        unset($data['tel1'], $data['tel2'], $data['tel3']);
        Contact::create($data);
        return view('contact.thanks');
    }
}
