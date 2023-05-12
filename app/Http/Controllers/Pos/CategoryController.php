<?php
namespace App\Http\Controllers\Pos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;


class CategoryController extends Controller
{
    //Method responsible for loading the AllCategories View
    public function CategoryAll()
    {

        $categories = Category::latest()->get();
        return view('backend.category.category_all', compact('categories'));

    } 

    //Loads the Add Category View
    public function CategoryAdd()
    {
        return view('backend.category.category_add');
    }

    //Method responsible for storing a category in the database
    public function CategoryStore(Request $request)
    {

        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);

    } 

    //Loads the Edit Category View
    public function CategoryEdit($id)
    {

        $categoryById = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('categoryById'));

    } 

    //Method responsible for updating a category record in the Database
    public function CategoryUpdate(Request $request)
    {

        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);

    } 

    //Method Responsible for Deleting a category record in the database
    public function CategoryDelete($id)
    {

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } 

}