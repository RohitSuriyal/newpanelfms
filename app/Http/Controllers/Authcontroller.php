<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\BlogTable;
use Illuminate\Support\Facades\Storage;


class Authcontroller extends Controller
{

    public function update_blog(Request $request)
    {


        $data = DB::table("blog")->where("id", $request->id)->get();


        $schoolname = DB::table('schools')->select('name', 'id')->get();
        $id = $request->id;

        return view("update", compact('data', 'schoolname', 'id'));
    }


    public function login(Request $request)


    {


        $validator = Validator::make($request->all(), [

            "username" => "required",
            "password" => "required|min:6"


        ]);
        if ($validator->fails()) {
            // Redirect back with input and validation errors
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {



            $user = User::where('name', $request->username)->first();

            if ($user) {
                // User exists, now check the password
                if (Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
                    return redirect()->route("home");
                } else {

                    // $plainPassword = '123456';
                    // $hashedPassword = Hash::make($plainPassword);

                    // // Echo the hashed password
                    // echo $hashedPassword;
                    // die;

                    return redirect()->back()
                        ->withErrors([
                            'password' => 'The provided password is incorrect.',
                        ])
                        ->withInput(); // Preserve input data
                }
            } else {

                return redirect()->back()
                    ->withErrors([
                        'username' => 'No user found with that email address.',
                    ])
                    ->withInput(); // Preserve input data
            }
        }
    }
    public function table(Request $request)
    {
        $query = BlogTable::query();
        if ($request->has('search') && !empty($request->input('search.value'))) {
            $searchValue = $request->input('search.value');
            $query->where('heading', 'like', "%$searchValue%");
        }
        if ($request->has('order')) {
            // Define the columns that can be used for sorting
            $columns = ['heading', 'title']; // Add 'title' to the columns array if 'title' is a valid column for sorting.

            // Get the column index and direction from the request
            $columnIndex = $request->input('order.0.column');
            $dir = $request->input('order.0.dir');

            // Map the column index to the column name (defaults to 'id' if not found)
            $column = $columns[$columnIndex] ?? 'id';

            // Apply sorting based on the column and direction
            $query->orderBy($column, $dir);
        } else {
            // Default sorting when no filter is applied (latest first by 'id')
            $query->orderBy('id', 'desc');
        }
        $length = $request->input('length');
        $start = $request->input('start');
        if ($length != -1) {
            $query->offset($start)->limit($length);
        }
        $blogs = $query->get();
        $data = [];
        foreach ($blogs as $row) {
            $sub_array = [];
            $sub_array[] = $row->heading;
            $sub_array[] = '<img src="' . $row->image . '" alt="Image" style="width:100px;height:auto;" />';

            $sub_array[] = '<a href="' . route('update_blog', ['id' => $row->id]) . '" class="btn btn-success btn-xs view">
            View
        </a>';
            $sub_array[] = '<a href="' . route('update_blog', ['id' => $row->id]) . '" class="btn btn-warning btn-xs view">
            update
        </a>';
            $sub_array[] = '<a href="' . route('update_blog', ['id' => $row->id]) . '" class="btn btn-danger btn-xs view">
        delete
        </a>';




            $data[] = $sub_array;
        }
        $output = ["draw" => intval($request->input('draw')), "recordsTotal" => BlogTable::count(), "recordsFiltered" => $query->count(), "data" => $data,];
        return response()->json($output);
    }
    public function getdata(Request $request)
    {
        $category = DB::table('blog')
            ->select('id', 'tags')
            ->where('tags', 'LIKE', '%' . $request->input('q') . '%')
            ->get();

        return response()->json($category);
    }
    public function formdata(Request $request)
    {

        $image = $request->file('image');

        if ($image) {
            // Assuming the image name is passed as part of the request, you could use a unique identifier or filename
            $imageName = $image->getClientOriginalName();

            // You can check if the file exists on S3 by trying to get the URL for an existing file (example logic)
            $existingImageUrl = Storage::disk('s3')->url('images/' . $imageName);

            // Check if the image already exists
            if (Storage::disk('s3')->exists('images/' . $imageName)) {
                // If the image already exists, return the URL without uploading
                $url = $existingImageUrl;
            } else {
                // If the image does not exist, upload it to S3
                $path = $image->storeAs('images', $imageName, 's3');
                $url = Storage::disk('s3')->url($path); // Get the URL of the newly uploaded image
            }
        } else {
            // Handle case where no image is uploaded (you might want to set a default or return an error)
            $url = null;
        }
        $mainheading = $request->main_heading;
        $content = $request->content;
        $category = $request->category;
        $date = $request->date;
        $tags = $request->tags;  // Assuming this is an array of strings

        // Convert the array to a single string (e.g., comma-separated)
        $tagsString = implode(',', $tags);

        // Trim the resulting string
        $tagsStringnew = trim($tagsString);


        $written_by = $request->writtenby;
        $school = $request->school;


        $query = DB::table("blog")->insert([

            "heading" => $mainheading,
            "image" => $url,
            "body" => $content,
            "School" => $school,
            "tags" => $tagsStringnew,
            "category" => $category,
            "date" => $date,
            "written_by" => $written_by
        ]);

        if ($query) {

            $schoolname = DB::table('schools')->select('name', 'id')->get();

            // Define the success message
            $successMessage = 'Blog post created successfully!';

            // Return the view, passing both the success message and the existing school data
            return view('addblog', compact('schoolname', 'successMessage'));
        } else {
            // If the insert fails, redirect with an error message
            return redirect()->route('addblog')->with('error', 'There was an error creating the blog post.');
        }
    }
    public function updateblogdata(Request $request)
    {



        $image = $request->file('image_update');



        if ($image) {
            // Assuming the image name is passed as part of the request, you could use a unique identifier or filename
            $imageName = $image->getClientOriginalName();

            // You can check if the file exists on S3 by trying to get the URL for an existing file (example logic)
            $existingImageUrl = Storage::disk('s3')->url('images/' . $imageName);

            // Check if the image already exists
            if (Storage::disk('s3')->exists('images/' . $imageName)) {
                // If the image already exists, return the URL without uploading
                $url = $existingImageUrl;
            } else {
                // If the image does not exist, upload it to S3
                $path = $image->storeAs('images', $imageName, 's3');
                $url = Storage::disk('s3')->url($path); // Get the URL of the newly uploaded image
            }
        } else {
            $hidden_url = $request->image_hidden;
            $url = $hidden_url;
        }
        $mainheading = $request->main_heading_update;
        $content = $request->content_update;
        $category = $request->category_update;
        $date = $request->date_update;
        $tags = $request->tags_update;
        // Assuming this is an array of strings

        // Convert the array to a single string (e.g., comma-separated)
        $tagsString = implode(',', $tags);

        // Trim the resulting string
        $tagsStringnew = trim($tagsString);


        $written_by = $request->writtenby_update;
        $school = $request->school_update;
        $id = $request->id_update;
        

        $query = DB::table("blog")->where("id", $id)->update([

            "heading" => $mainheading,
            "image" => $url,
            "body" => $content,
            "School" => $school,
            "tags" => $tagsStringnew,
            "category" => $category,
            "date" => $date,
            "written_by" => $written_by
        ]);
        
        if ($query>0) {

            $schoolname = DB::table('schools')->select('name', 'id')->get();

            // Define the success message
            $successMessageupdate = 'Blog updated successfully!';

            // Return the view, passing both the success message and the existing school data
            return view('addblog', compact('schoolname', 'successMessageupdate'));
        } else {
            $schoolname = DB::table('schools')->select('name', 'id')->get();

            // Define the success message
            $successnoMessageupdate = 'No data updated';

            // Return the view, passing both the success message and the existing school data
            return view('addblog', compact('schoolname', 'successnoMessageupdate'));
        }
    }
}
