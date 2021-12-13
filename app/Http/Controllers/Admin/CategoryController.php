<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    public function view_all(){
        $fetch_categories = Category::where('status',1)->orderby('id','desc')->get();
        $data= [
            "categories" => $fetch_categories
        ];

        return view('admin.category.view')->with($data);
    }

    public function add_category(Request $request){
        $validator = Validator::make($request->all(), [
            "name" => 'required|max:255',
            "description" => 'required'
        ]);
    
        if ($validator->fails()) {
            toastr()->error('Validation Error Ocurred');
            return back()->withErrors($validator)->withInput();
        }

        $name = $request->input('name');
        $description = $request->input('description');

        $Category = new Category();
        $Category->name = $name;
        $Category->description = $description;
        $save_category = $Category->save(); 

        if(!$save_category){
            toastr()->error('Sorry an error ocurred. Try Again later');
            return back();
        }

        toastr()->success('Category has been successfully created');
        return back();
    }

    public function delete_category($id){
        if(!isset($id)){
            toastr()->error('Invalid Format for deleting record!');
            return back();
        }

        $category = Category::where('id',$id)->where('status','1')->get();

        // dd($category);
        if(!$category){
            toastr()->error('Sorry the category has already been deleted or doesnt exists');
            return back();
        }

        $delete_category = $category[0]->update([
            'status' => '0'
        ]);

        if(!$delete_category){
            toastr()->error('Sorry the category could not be deleted, try again later');
            return back();
        }

        toastr()->success('Category has been deleted Successfully');
        return back();
    }

    public function view_test_page($id){

        $fetch_category = Category::where('id',$id)->where('status',1)->orderby('id','desc')->get();
        
        $fetch_questions = Question::where('category_id',$id)->where('status',1)->orderby('id','desc')->get();

        $data= [
            "category" => $fetch_category,
            'questions' => $fetch_questions
        ];

        return view('admin.category.view-test')->with($data);
    }

    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            "name" => 'required|max:255',
            "description" => 'required'
        ]);
    
        if ($validator->fails()) {
            toastr()->error('Validation Error Ocurred');
            return back()->withErrors($validator)->withInput();
        }

        $fetch_Category = Category::where('id',$id)->where('status','1')->get();

        if(!$fetch_Category){
            toastr()->error('Category doesnt exist or has been deleted');
            return back();
        }

        // $user_id = Auth('admin')->user()->id;
        $name = $request->input('name');
        $description = $request->input('description');
        
        $fetch_Category[0]->name = $name;
        $fetch_Category[0]->description = $description;
        $update_Category = $fetch_Category[0]->save();

        if(!$update_Category){
            toastr()->error('An Error occured, Try again later.');
            return back();
        }

        toastr()->success('Category has been successfully updated.');
        return back();
    }
}
