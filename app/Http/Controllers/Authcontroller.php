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
            $columns = ['heading'];
            $columnIndex = $request->input('order.0.column');
            $dir = $request->input('order.0.dir');
            $column = $columns[$columnIndex] ?? 'id';
            $query->orderBy($column, $dir);
        } else {
            $query->orderBy('id');
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

            $sub_array[] = '<button type="button" name="view" id="' . $row->id . '" class="btn btn-success btn-xs view">View</button>';
            $sub_array[] = '<button type="button" name="view" id="' . $row->id . '" class="btn btn-warning btn-xs update">Update</button>';
            $sub_array[] = '<button type="button" name="view" id="' . $row->id . '" class="btn btn-danger btn-xs delete">Delete</button>';
            $data[] = $sub_array;
        }
        $output = ["draw" => intval($request->input('draw')), "recordsTotal" => BlogTable::count(), "recordsFiltered" => $query->count(), "data" => $data,];
        return response()->json($output);
    }
    public function getdata(Request $request)
    {
        $category = DB::table('blog')
            ->select( 'id','tags')
            ->where('tags', 'LIKE', '%' . $request->input('q') . '%')
            ->get();

        return response()->json($category);
    }
    public function formdata(Request $request){

        $image = $request->file('image');
        $path = $image->store('images', 's3');
    
        // Check if the file was uploaded successfully
        if ($path) {
            // Print the success message and path (can be seen in logs or output)
            print_r('Image uploaded successfully. Path: ' . $path);
        } else {
            // Handle case where the upload failed
            print_r('Image upload failed.');
        }

    }
}
