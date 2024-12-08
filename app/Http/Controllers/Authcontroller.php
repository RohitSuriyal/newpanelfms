<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\BlogTable;
use AWS\CRT\HTTP\Message;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


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

            $sub_array[] = '<a href="' . route('view_blog', ['id' => $row->id]) . '" class="btn btn-success btn-xs view">
            View
        </a>';
            $sub_array[] = '<a href="' . route('update_blog', ['id' => $row->id]) . '" class="btn btn-warning btn-xs view">
        update
        </a>';

            $sub_array[] = '<a href="' . route('deleteblog', ['id' => $row->id]) . '" class="btn btn-danger btn-xs ">
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
            return redirect()->route('addblog')->with('successMessage', 'Your data has been added successfully!');
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

        if ($query > 0) {

            $schoolname = DB::table('schools')->select('name', 'id')->get();

            // Define the success message
            $successMessageupdate = 'Blog updated successfully!';

            // Return the view, passing both the success message and the existing school data

            return redirect('addblog')->with('successMessageupdate', 'Your data has been updated successfully!');
        } else {
            $schoolname = DB::table('schools')->select('name', 'id')->get();

            // Define the success message
            $successnoMessageupdate = 'No data updated';

            // Return the view, passing both the success message and the existing school data
            return redirect('addblog')->with('successMessagenoupdate', 'Your data has been updated successfully!');
        }
    }
    public function deleteblog(Request $request)
    {
        $id = $request->id;
        $image = DB::table("blog")->where("id", $id)->value("image");
        if ($image) {
            // Delete the image from S3
            if (Storage::disk('s3')->exists($image)) {
                Storage::disk('s3')->delete($image);
            }

            // Delete the row from the database
            DB::table('blog')->where('id', $id)->delete();




            return redirect('addblog')->with('delelteblog', 'Your data has been deleted successfully!');
        }
    }
    public function view_blog(Request $request)
    {
        $id = $request->id;

        $data = DB::table('blog')->where("id", $id)->get();
        $school_id = $data[0]->School;
        $school_name = DB::table("schools")->where("id", $school_id)->value("name");







        return view("viewblog", compact("data", "school_name"));
    }
    public function basicdetail(Request $request)
    {

        try {
            // Process the school type and tags (no changes here)
            $schooltypecategory = implode(',', array_map('trim', $request->school_type));
            $tagsstring = implode(',', array_map('trim', $request->tags));

            // Handle image upload logic
            $image = $request->file('image');

            if ($image) {
                // Assuming the image name is passed as part of the request, you could use a unique identifier or filename
                $imageName = $image->getClientOriginalName();

                // Check if the file already exists on S3
                if (Storage::disk('s3')->exists('images/' . $imageName)) {
                    // If the image already exists, return the URL without uploading
                    $url = Storage::disk('s3')->url('images/' . $imageName);
                } else {
                    // If the image doesn't exist, upload it to S3
                    $path = $image->storeAs('images', $imageName, 's3');
                    $url = Storage::disk('s3')->url($path); // Get the URL of the newly uploaded image
                }
            } else {
                // If no image was provided, use the hidden URL
                $hidden_url = $request->image_hidden;
                $url = $hidden_url;
            }

            // Prepare data array
            $data = [];
            $data["name"] = $request->name;
            $data["state"] = $request->state;
            $data["city"] = $request->city;
            $data["address"] = $request->address;
            $data["class_offered"] = $request->class;
            $data["class_offered"] = $request->class;
            $data["board"] = $request->board;
            $data["student_faculty_ratio"] = $request->student_faculty;
            $data["tags"] = $tagsstring;
            $data["image"] = $url;
            $data["school_type"] = $schooltypecategory;

            // Store session data
            session(['basic_detail' => $data]);

            // Redirect with success message
            return redirect()->route("addschool")->with("basicdetail", "Your data is successfully saved.");
        } catch (\Exception $e) {


            // Optionally, you can return a specific error message or redirect to a different route
            return redirect()->route("addschool")->with("error", "An error occurred while saving your data. Please try again.");
        }
    }
    public function overviewdetails(Request $request)
    {

        try {
            $data = [];
            $school_format = trim(implode(",", $request->school_format));

            $data["content"] = $request->content;
            $data["ownership"] = $request->ownership;
            $data["establishment"] = $request->establishment;
            $data["campus"] = $request->campus_size;
            $data["Board"] = $request->board;
            $data["Co_ed_status"] = $request->Co_ed_status;
            $data["campus_type"] = $request->campus_type;
            $data["interact_language"] = $request->language;
            $data["session"] = $request->academic_session;
            $data["school_format"] = $school_format;
            $data["url"] = $request->videolink;



            session((["overviewdata" => $data]));
            $overviewData = session('overviewdata');

            return redirect()->route("addschool")->with("success_overview", "your data is successfully added");
        } catch (\Exception $e) {
            return redirect()->route("addschool")->with("error", $e->getMessage());
        }


        // // Step 2: Assume you fetch the ID from another query or source
        // $id = 123;  // Example ID from another query

        // // Step 3: Add the ID to the existing $overviewData array
        // $overviewData['id'] = $id;

        // // Step 4: Store the updated data back in the session
        // session(['overviewdata' => $overviewData]);








    }


    public function addclassfee(request $request)
    {
     

        $data = [];

        $data["class"] = $request->class;
        $data["registration_fee"] = $request->refee;
        $data["registration_fre"] = $request->refre;
        $data["admission_fee"] = $request->adfee;
        $data["admission_fre"] = $request->adfre;
        $data["tution_fee"] = $request->tutfee;
        $data["tution_fre"] = $request->tutfre;
        $data["security_fee"] = $request->secfee;
        $data["security_fre"] = $request->secfre;
        $data["annual_fee"] = $request->anufee;
        $data["annual_fre"] = $request->anufre;
        $data["transportation_fee"] = $request->transfee;
        $data["transportation_fre"] = $request->transfre;
        $data["other_fee"] = $request->otherfee;
        $data["other_fre"] = $request->otherfre;
        $data["total_cost"] = $request->totalfee;
        $data["total_fre"] = $request->totalfre;
        $data["monthly_cost"] = $request->monthlyfee;
        $data["monthly_fre"] = $request->monthlyfre;

        if ($request->class == "Prenursery") {
            session(["Prenursery" => $data]);
        } elseif ($request->class == "Nursery") {
            session(["Nursery" => $data]);
        } elseif ($request->class == "LKG") {
            session(["LKG" => $data]);
        } elseif ($request->class == "UKG") {
            session(["UKG" => $data]);
        } elseif ($request->class == "I") {
            session(["I" => $data]);
        } elseif ($request->class == "II") {
            session(["II" => $data]);
        } elseif ($request->class == "III") {
            session(["III" => $data]);
        } elseif ($request->class == "IV") {
            session(["IV" => $data]);
        } elseif ($request->class == "V") {
            session(["V" => $data]);
        } elseif ($request->class == "VI") {
            session(["VI" => $data]);
        } elseif ($request->class == "VII") {
            session(["VII" => $data]);
        } elseif ($request->class == "VIII") {
            session(["VIII" => $data]);
        } elseif ($request->class == "IX") {
            session(["IX" => $data]);
        } elseif ($request->class == "X") {
            session(["X" => $data]);
        } elseif ($request->class == "XI") {
            session(["XI" => $data]);
        } elseif ($request->class == "XII") {
            session(["XII" => $data]);
        } else {


            response()->json("error");
        }

   
        // return redirect()->route("addschool")->with("classfee", $request->class);
        return response()->json([
            'message' => 'Class fee added successfully',
            'classfee' => $request->class, // Sending the class fee data to the client
        ]);
    }
    public function addeligibity(Request $request)
    {
        $data["class"] = $request->class ?? null;
        $data["eligible_age"] = $request->eliag ?? null;
        $data["eligible_marks"] = $request->elmarks ?? null;
        $data["total_seats"] = $request->elseats ?? null;

        $data["written_test"] = $request->eltest ?? null;
        $data["student_interaction"] = $request->elstudent ?? null;
        $data["parents_interaction"] = $request->elparent ?? null;
        $data["form_availabilty"] = $request->elform ?? null;
        $data["form_paymnet"] = $request->elformpayment ?? null;
        $data["timing_from"] = $request->eltimefrom ?? null;
        $data["timing_to"] = $request->eltimeto ?? null;




        if ($request->class == "Prenursery") {
            session(["Prenursery_eligibility" => $data]);
        } elseif ($request->class == "Nursery") {
            session(["Nursery_eligibility" => $data]);
        } elseif ($request->class == "LKG") {
            session(["LKG_eligibility" => $data]);
        } elseif ($request->class == "UKG") {
            session(["UKG_eligibility" => $data]);
        } elseif ($request->class == "I") {
            session(["I_eligibility" => $data]);
        } elseif ($request->class == "II") {
            session(["II_eligibility" => $data]);
        } elseif ($request->class == "III") {
            session(["III_eligibility" => $data]);
        } elseif ($request->class == "IV") {
            session(["IV_eligibility" => $data]);
        } elseif ($request->class == "V") {
            session(["V_eligibility" => $data]);
        } elseif ($request->class == "VI") {
            session(["VI_eligibility" => $data]);
        } elseif ($request->class == "VII") {
            session(["VII_eligibility" => $data]);
        } elseif ($request->class == "VIII") {
            session(["VIII_eligibility" => $data]);
        } elseif ($request->class == "IX") {
            session(["IX_eligibility" => $data]);
        } elseif ($request->class == "X") {
            session(["X_eligibility" => $data]);
        } elseif ($request->class == "XI") {
            session(["XI_eligibility" => $data]);
        } elseif ($request->class == "XII") {
            session(["XII_eligibility" => $data]);
        } else {


            response()->json("error");
        }
        return response()->json([
            'message' => 'Class fee added successfully',
            'class_eligibility' => $request->class, // Sending the class fee data to the client
        ]);
        
    }


    public function addfacilities(Request $request)
    {



        $data = [];
        $data["class_facilities"] = trim(implode(",", $request->class_facilities));
        $data["boarding"] = trim(implode(",", $request->boarding));
        $data["infrastructure"] = trim(implode(",", $request->infrastructure));
        $data["safety_and_security"] = trim(implode(",", $request->safety_and_security));
        $data["advance_facilities"] = trim(implode(",", $request->advancefacilties));
        $data["extra_curricular"] = trim(implode(",", $request->extra_cur));
        $data["sports_and_faclities"] = trim(implode(",", $request->sports_and_fitness));
        $data["lab"] = trim(implode(",", $request->lab));
        $data["disable_friendly"] = $request->disabled_friendly;

        session(["facilities" => $data]);

        return redirect()->route("addschool")->with("facility", "Facility is added ");
    }




    public function addimages(Request $request)
    {

        try {
            if ($request->category == "infrastructure") {


                $image = $request->file('image');

                if ($image) {
                    // Assuming the image name is passed as part of the request, you could use a unique identifier or filename
                    $imageName = $image->getClientOriginalName();

                    // Check if the file already exists on S3
                    if (Storage::disk('s3')->exists('images/' . $imageName)) {
                        // If the image already exists, return the URL without uploading
                        $url = Storage::disk('s3')->url('images/' . $imageName);
                    } else {
                        // If the image doesn't exist, upload it to S3
                        $path = $image->storeAs('images', $imageName, 's3');
                        $url = Storage::disk('s3')->url($path); // Get the URL of the newly uploaded image
                    }
                } else {
                    // If no image was provided, use the hidden URL

                    $url = "";
                }


                $infrastructureImages = session('infrastructure', []);

                // Add the new image URL to the session array only if it doesn't already exist
                if ($url && !in_array($url, $infrastructureImages)) {
                    $infrastructureImages[] = $url;
                }

                // Update the session with the updated array
                session(['infrastructure' => $infrastructureImages]);
            }
            if ($request->category == "classroom") {
                $image = $request->file('image');

                if ($image) {
                    // Assuming the image name is passed as part of the request, you could use a unique identifier or filename
                    $imageName = $image->getClientOriginalName();

                    // Check if the file already exists on S3
                    if (Storage::disk('s3')->exists('images/' . $imageName)) {
                        // If the image already exists, return the URL without uploading
                        $url = Storage::disk('s3')->url('images/' . $imageName);
                    } else {
                        // If the image doesn't exist, upload it to S3
                        $path = $image->storeAs('images', $imageName, 's3');
                        $url = Storage::disk('s3')->url($path); // Get the URL of the newly uploaded image
                    }
                } else {
                    // If no image was provided, use the hidden URL

                    $url = "";
                }


                $classroominages = session('classroom', []);

                // Add the new image URL to the session array only if it doesn't already exist
                if ($url && !in_array($url, $classroominages)) {
                    $classroominages[] = $url;
                }

                // Update the session with the updated array
                session(['classroom' => $classroominages]);
            }
            if ($request->category == "library") {
                $image = $request->file('image');

                if ($image) {
                    // Assuming the image name is passed as part of the request, you could use a unique identifier or filename
                    $imageName = $image->getClientOriginalName();

                    // Check if the file already exists on S3
                    if (Storage::disk('s3')->exists('images/' . $imageName)) {
                        // If the image already exists, return the URL without uploading
                        $url = Storage::disk('s3')->url('images/' . $imageName);
                    } else {
                        // If the image doesn't exist, upload it to S3
                        $path = $image->storeAs('images', $imageName, 's3');
                        $url = Storage::disk('s3')->url($path); // Get the URL of the newly uploaded image
                    }
                } else {
                    // If no image was provided, use the hidden URL

                    $url = "";
                }


                $library_images = session('library', []);

                // Add the new image URL to the session array only if it doesn't already exist
                if ($url && !in_array($url, $library_images)) {
                    $library_images[] = $url;
                }

                // Update the session with the updated array
                session(['library' => $library_images]);
            }
            if ($request->category == "playground") {
                if ($image) {
                    // Assuming the image name is passed as part of the request, you could use a unique identifier or filename
                    $imageName = $image->getClientOriginalName();

                    // Check if the file already exists on S3
                    if (Storage::disk('s3')->exists('images/' . $imageName)) {
                        // If the image already exists, return the URL without uploading
                        $url = Storage::disk('s3')->url('images/' . $imageName);
                    } else {
                        // If the image doesn't exist, upload it to S3
                        $path = $image->storeAs('images', $imageName, 's3');
                        $url = Storage::disk('s3')->url($path); // Get the URL of the newly uploaded image
                    }
                } else {
                    // If no image was provided, use the hidden URL

                    $url = "";
                }


                $playground_images = session('playground', []);

                // Add the new image URL to the session array only if it doesn't already exist
                if ($url && !in_array($url, $playground_images)) {
                    $playground_images[] = $url;
                }

                // Update the session with the updated array
                session(['playground' => $playground_images]);
            }

            return redirect()->route("addschool")->with("successgallery", $request->category);
        } catch (\Exception $e) {


            return  redirect()->route('addschool')->with('errorgallery', $e->getMessage());
        }
    }
    public function finalsubmit()
    {


        // dd(session('infrastructure'), session('classroom'), session('library'), session('playground'));

        try {
            $databasic = session("basic_detail");
            if (!$databasic || !is_array($databasic)) {
                throw new \Exception("Basic details are missing or invalid.");
            }


            $inserbasicdetail = DB::table("schools")->insertGetId($databasic);


            if (session('infrastructure')) {
                $infrastructureimages = session('infrastructure');
            }

            if (session('classroom')) {
                $classroomimages = session('classroom');
            }
            if (session('library')) {
                $libraryimages = session('library');
            }
            if (session('playground')) {

                $playgroundimages = session('playground');
            }







            $infrastructure_array = [];
            $classroom_array = [];
            $library_array = [];
            $playground_array = [];









            //this is for the overviewdata
            $overviewdetail = session('overviewdata');
            if (!$overviewdetail || !is_array($overviewdetail)) {

                throw new \Exception("overview details  are missing or invalid.");
            }

            $overviewdetail = ['school_id' => $inserbasicdetail] + $overviewdetail;




            //this is for the facility
            $facilty = session("facilities");
            if (!$facilty || !is_array($facilty)) {
                throw new \Exception("facilities  are missing or invalid.");
            }
            $facilty = ['school_id' => $inserbasicdetail] + $facilty;


            //arrays of the fees
            $classprenurseryfee = session('Prenursery');
            if (!$classprenurseryfee || !is_array($classprenurseryfee)) {
                throw new \Exception("class prenursery details  are missing or invalid.");
            }
            $classnurseryfee = session('Nursery');
            if (!$classnurseryfee || !is_array($classnurseryfee)) {
                throw new \Exception("class nursery details  are missing or invalid.");
            }
            $classlkgfee=session('LKG');
            if (!$classlkgfee || !is_array($classlkgfee)) {
                throw new \Exception("class LKG details  are missing or invalid.");
            }
            $classukgfee=session("UKG");
            if (!$classukgfee || !is_array($classukgfee)) {
                throw new \Exception("class UKG details  are missing or invalid.");
            }

            $classIfee = session("I");
            if (!$classIfee || !is_array($classIfee)) {
                throw new \Exception("class I details  are missing or invalid.");
            }
            $classIIfee = session("II");
            if (!$classIIfee || !is_array($classIIfee)) {
                throw new \Exception("class II details  are missing or invalid.");
            }
            $classIIIfee = session("III");
            if (!$classIIIfee || !is_array($classIIIfee)) {
                throw new \Exception("class III details  are missing or invalid.");
            }
            $classIVfee = session("IV");
            if (!$classIVfee || !is_array($classIVfee)) {
                throw new \Exception("class IV details  are missing or invalid.");
            }
            $classVfee = session("V");
            if (!$classVfee || !is_array($classVfee)) {
                throw new \Exception("class V details  are missing or invalid.");
            }
            $classVIfee = session("VI");
            if (!$classVIfee || !is_array($classVIfee)) {
                throw new \Exception("class VI details  are missing or invalid.");
            }
            $classVIIfee = session("VII");
            if (!$classVIIfee || !is_array($classVIIfee)) {
                throw new \Exception("class VII details  are missing or invalid.");
            }
            $classVIIIfee = session("VIII");
            if (!$classVIIIfee || !is_array($classVIIIfee)) {
                throw new \Exception("class VIII details  are missing or invalid.");
            }
            $classIXfee = session("IX");
             if (!$classIXfee || !is_array($classIXfee)) {
                throw new \Exception("class IX details  are missing or invalid.");
            }
            $classXfee = session("X");
            if (!$classXfee || !is_array($classXfee)) {
                throw new \Exception("class X details  are missing or invalid.");
            }
            $classXIfee = session("XI");
            if (!$classXIfee || !is_array($classXIfee)) {
                throw new \Exception("class XI details  are missing or invalid.");
            }
            
            $classXIIfee = session("XII");
            if (!$classXIIfee || !is_array($classXIIfee)) {
                throw new \Exception("class XII details  are missing or invalid.");
            }


            $feeArrays = [
                ['school_id' => $inserbasicdetail] + $classprenurseryfee,
                ['school_id' => $inserbasicdetail] + $classnurseryfee,
                ['school_id' => $inserbasicdetail] + $classlkgfee,
                ['school_id' => $inserbasicdetail] + $classukgfee,
                ['school_id' => $inserbasicdetail] + $classIfee,
                ['school_id' => $inserbasicdetail] + $classIIfee,
                ['school_id' => $inserbasicdetail] + $classIIIfee,
                ['school_id' => $inserbasicdetail] + $classIVfee,
                ['school_id' => $inserbasicdetail] + $classVfee,
                ['school_id' => $inserbasicdetail] + $classVIfee,
                ['school_id' => $inserbasicdetail] + $classVIIfee,
                ['school_id' => $inserbasicdetail] + $classVIIIfee,
                ['school_id' => $inserbasicdetail] + $classIXfee,
                ['school_id' => $inserbasicdetail] + $classXfee,
                ['school_id' => $inserbasicdetail] + $classXIfee,
                ['school_id' => $inserbasicdetail] + $classXIIfee,
            ];

            //this is for the eligibiltiy

            $prenurseryeligibility = session('Prenursery_eligibility');
            $nurseryeligibility = session('Nursery_eligibility');
            $lkgeligibility = session('LKG_eligibility');
            $ukgeligibility = session('UKG_eligibility');
            $classIeligibilty = session('I_eligibility');
            $classIIeligibilty = session("II_eligibility");
            $classIIIeligibility = session('III_eligibility');
            $classIVeligibility = session('IV_eligibility');
            $classVeligibility = session('V_eligibility');
            $classVIeligibility = session('VI_eligibility');
            $classVIIeligibility = session('VII_eligibility');
            $classVIIIeligibility = session('VIII_eligibility');
            $classIXeligibility = session('IX_eligibility');
            $classXeligibility = session('X_eligibility');
            $classXIeligibility = session('XI_eligibility');
            $classXIIeligibility = session('XII_eligibility');


            $eligibilityArrays = [
                ['school_id' => $inserbasicdetail] + $prenurseryeligibility,
                ['school_id' => $inserbasicdetail] + $nurseryeligibility,
                ['school_id' => $inserbasicdetail] + $lkgeligibility,
                ['school_id' => $inserbasicdetail] + $ukgeligibility,
                ['school_id' => $inserbasicdetail] + $classIeligibilty,
                ['school_id' => $inserbasicdetail] + $classIIeligibilty,
                ['school_id' => $inserbasicdetail] + $classIIIeligibility,
                ['school_id' => $inserbasicdetail] + $classIVeligibility,
                ['school_id' => $inserbasicdetail] + $classVeligibility,
                ['school_id' => $inserbasicdetail] + $classVIeligibility,
                ['school_id' => $inserbasicdetail] + $classVIIeligibility,
                ['school_id' => $inserbasicdetail] + $classVIIIeligibility,
                ['school_id' => $inserbasicdetail] + $classIXeligibility,
                ['school_id' => $inserbasicdetail] + $classXeligibility,
                ['school_id' => $inserbasicdetail] + $classXIeligibility,
                ['school_id' => $inserbasicdetail] + $classXIIeligibility,
            ];







            //insertion in all 5 tables;

            $overview_insert = DB::table("school_overview")->insert($overviewdetail);

            foreach ($eligibilityArrays as $eligible) {
                DB::table('eligibilty')->insert($eligible);
            }

            foreach ($feeArrays as $feeArray) {
                DB::table('fee')->insert($feeArray);
            }

            $facility_insert = DB::table("facility")->insert($facilty);


            if (session('infrastructure')) {
                foreach ($infrastructureimages as $value) {
                    $infrastructure_array[] = [
                        "school_id" => $inserbasicdetail, // Assuming $inserbasicdetail contains the school ID
                        "image" => $value,
                        "category" => "infrastructure",
                    ];
                }
                foreach ($infrastructure_array as $row) {
                    $insert = DB::table("gallery")->insert($row);
                }
            }

            if (session('classroom')) {
                foreach ($classroomimages as $c) {
                    $classroom_array[] = [
                        "school_id" => $inserbasicdetail, // Assuming $inserbasicdetail contains the school ID
                        "image" => $value,
                        "category" => "classroom",
                    ];
                }

                foreach ($classroom_array as $row) {

                    $insert = DB::table("gallery")->insert($row);
                }
            }

            if (session('library')) {
                foreach ($libraryimages as $l) {
                    $library_array[] = [
                        "school_id" => $inserbasicdetail, // Assuming $inserbasicdetail contains the school ID
                        "image" => $value,
                        "category" => "library",
                    ];
                }

                foreach ($library_array as $row) {
                    $insert = DB::table("gallery")->insert($row);
                }
            }
            if (session('playground')) {

                foreach ($playgroundimages as $p) {
                    $playground_array[] = [
                        "school_id" => $inserbasicdetail, // Assuming $inserbasicdetail contains the school ID
                        "image" => $value,
                        "category" => "playground",
                    ];
                }
                foreach ($playground_array as $row) {
                    $insert = DB::table("gallery")->insert($row);
                }
            }




            session()->forget('basic_detail');
            session()->forget('infrastructure');
            session()->forget('classroom');
            session()->forget('library');
            session()->forget('playground');
            session()->forget('overviewdata');
            session()->forget('facilities');
            session()->forget('Prenursery');
            session()->forget('Nursery');
            session()->forget('I');
            session()->forget('II');
            session()->forget('III');
            session()->forget('IV');
            session()->forget('V');
            session()->forget('VI');
            session()->forget('VII');
            session()->forget('VIII');
            session()->forget('IX');
            session()->forget('X');
            session()->forget('XI');
            session()->forget('XII');
            session()->forget('Prenursery_eligibility');
            session()->forget('Nursery_eligibility');
            session()->forget('LKG_eligibility');
            session()->forget('UKG_eligibility');
            session()->forget('I_eligibility');
            session()->forget('II_eligibility');
            session()->forget('III_eligibility');
            session()->forget('IV_eligibility');
            session()->forget('V_eligibility');
            session()->forget('VI_eligibility');
            session()->forget('VII_eligibility');
            session()->forget('VIII_eligibility');
            session()->forget('IX_eligibility');
            session()->forget('X_eligibility');
            session()->forget('XI_eligibility');
            session()->forget('XII_eligibility');




            return redirect()->route("addschool")->with("finalsuccess", "Your school data has been saved ");
        } catch (\Exception $e) {




            return redirect()->route("addschool")->with("finalerror", $e->getMessage());
        }
    }
}




// $("form").on("submit", function(e) {
//     e.preventDefault(); // Prevents the default form submission

//     var formData = new FormData(this); // Create a FormData object from the form (including the image file)
    
//     $.ajax({
//         url: $(this).attr('action'),  // The URL to send the form data to
//         type: 'POST',  // HTTP method (POST)
//         data: formData,  // The form data to send
//         contentType: false, // This tells jQuery not to set content type (important for file upload)
//         processData: false, // This prevents jQuery from automatically processing the data
//         success: function(response) {
//             // Handle the response from the server
//             if (response.classfee) {
//                 // Example: Display the class fee message
//                 alert('Class fee for ' + response.classfee + ' added successfully!');
//             }
//             if (response.imageUrl) {
//                 // Display the uploaded image (optional)
//                 $("#imagePreview").attr('src', response.imageUrl); // Assuming there's an <img id="imagePreview">
//             }
//         },
//         error: function(xhr, status, error) {
//             // Handle errors
//             alert("An error occurred: " + error);
//             console.error(error);
//         }
//     });
// });