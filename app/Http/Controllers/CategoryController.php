<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('category.index', compact('data'));
    }

     public function requestForm()
    {
        $form = request()->validate([
            'category_name' => 'required'
        ]);
        return $form;
    }

    public function create()
    {
        return view('category.create');
    }

    public function store()
    {
        $data = $this->requestForm();
        Category::create($data);
        return redirect()->route('category.index')->with('success', 'A New Category created succesfully');
    }

    public function edit($id)
    {
        $_id = Crypt::Decrypt($id);
        $data = Category::findOrfail($_id);
        return view('category.edit', compact('data'));
    }

    public function update($id)
    {
        $data = $this->requestForm();
        Category::where(['id' => $id])->update($data);
        return redirect()->route('category.index')->with('success', 'A Category Updated succesfully');
    }

     public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')->with('success', 'A Category Deleted succesfully');
    }
}
