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
        $inputs = $request->all();
        $category = Category::find($inputs['category_id']);

        return view('contact.confirm', compact('inputs', 'category'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['tel'] = $data['tel1'] . $data['tel2'] . $data['tel3'];
        $category = Category::find($data['category_id']);
        $data['category'] = $category->content;
        Contact::create($data);
        return view('contact.thanks');
    }
}
