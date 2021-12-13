<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            "title" => 'required|max:255',
            "description" => 'required'
        ]);
    
        if ($validator->fails()) {
            toastr()->error('Validation Error Ocurred');
            return back()->withErrors($validator)->withInput();
        }

        // `title`, `description`, `user_id`, `category_id`, `status`,
        $title = $request->input('title');
        $description = $request->input('description');
        $user_id = Auth('admin')->user()->id;
        $category_id = $request->input('category_id');
        
        $save_question = Question::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $user_id,
            'category_id' => $category_id
        ]);

        if(!$save_question){
            toastr()->error('An Error Occured, Try again later.');
            return back();
        }

        toastr()->success('Question has been successdfully saved.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            "title" => 'required|max:255',
            "description" => 'required'
        ]);
    
        if ($validator->fails()) {
            toastr()->error('Validation Error Ocurred');
            return back()->withErrors($validator)->withInput();
        }

        $fetch_question = Question::where('id',$id)->where('status','1')->get();

        if(!$fetch_question){
            toastr()->error('Question doesnt exist or has been deleted');
            return back();
        }

        $category_id = $request->input('category_id');
        // $user_id = Auth('admin')->user()->id;
        $title = $request->input('title');
        $description = $request->input('description');
        
        $fetch_question[0]->title = $title;
        $fetch_question[0]->description = $description;
        $update_question = $fetch_question[0]->save();

        if(!$update_question){
            toastr()->error('An Error occured, Try again later.');
            return back();
        }

        toastr()->success('Question has been successfully updated.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(!isset($id)){
            toastr()->error('Invalid Format for deleting record!');
            return back();
        }

        $category = Question::where('id',$id)->where('status','1')->get();

        // dd($category);
        if(!$category){
            toastr()->error('Sorry the Question has already been deleted or doesnt exists');
            return back();
        }

        $delete_category = $category[0]->update([
            'status' => '0'
        ]);

        if(!$delete_category){
            toastr()->error('Sorry the Question could not be deleted, try again later');
            return back();
        }

        toastr()->success('Question has been deleted Successfully');
        return back();
    }
}
