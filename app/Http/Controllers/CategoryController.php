<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoriesIndex(){
        $categories = Category::orderBy('name', 'asc')->paginate(8);
        return view('categories.index', ['categories' => $categories]);
    }

    public function getCategory($id){
        $category = Category::where('id', '=', $id)->with('recipes')->first();
        return view('categories.category', ['category' => $category]);
    }

    // GET manage functions for category
    // index
    public function getCategoryManageIndex(){
        $categories = Category::orderBy('name', 'asc')->paginate(8);
        return view('manage.category.index', ['categories' => $categories]);
    }

    // new
    public function getCategoryManageNew(){
        return view('manage.category.new');
    }

    // edit
    public function getCategoryManageEdit($id){
        $category = Category::where('id', '=', $id)->first();
        return view('manage.category.edit', ['category' => $category, 'categoryId' => $id]);
    }

    // delete
    public function getCategoryManageDelete($id){
        $category = Category::find($id);
        $category->recipes()->detach();
        $category->delete();
        return redirect()->route('manage.category.index')->with('info', 'Category ' . $category->name . ' deleted.');
    }

    // POST functions
    // create
    public function postCategoryManageNew(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        $category = new Category([
            'name' => $request->input('name')
        ]);
        $category->save();
        return redirect()->route('manage.category.index')->with('info', 'Category ' . $category->name . ' created.');
    }

    // update
    public function postCategoryManageEdit(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = new Category();
        $category = Category::find($request->input('id'));
        $category->name = $request->input('name');

        $category->save();
        return redirect()->route('manage.category.index')->with('info', 'Category ' . $category->name . ' updated.');
    }
}
