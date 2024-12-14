<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function logintoapp(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check if the username exists
        $username = DB::table("fmsappuser")->where("username", $request->username)->first();

        if ($username) {
            // Check if the password matches
            $user = DB::table("fmsappuser")
                ->where("username", $request->username)
                ->where("password", $request->password)
                ->first();

            if ($user) {
                // Successful login response
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful',

                ], 200);
            } else {
                // Incorrect password
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid password',
                ], 401);
            }
        } else {
            // Username not found
            return response()->json([
                'status' => 'error',
                'message' => 'Username not found',
            ], 404);
        }
    }


    public function getschooldata(Request $request)
    {

        $id = $request->id;
        try {
            $data = DB::table("schools")->where("id", $id)->get();

            return response()->json([

                "status" => "success",
                "data" => $data
            ]);
        } catch (\Exception $e) {

            return response()->json(
                [
                    "status" => "error",
                    "message" => $e->getMessage(),


                ]
            );
        }
    }
    public function schoolpage(Request $request)
    {
        $id = $request->id;
        try {
            $name = str_replace(' ', '-', DB::table("schools")->where("id", $id)->value("name"));

            // Construct the URL
            $url = "https://findmyschool.net/Welcome/School_details/{$id}/{$name}";

            return response()->json([

                "status" => "success",
                "message" => $url

            ]);
        } catch (\Exception $e) {
            return response()->json([

                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }

    public function blogpage(Request $request)
    {
        $id = $request->id;
        try {
            $name = DB::table("blog")->where("School", $id)->value("heading");

            // Replace spaces with dashes and remove special characters
            $name = preg_replace('/[^A-Za-z0-9-]+/', '-', $name); // Replace all non-alphanumeric characters with dashes
            $name = strtolower($name); // Convert to lowercase (optional)
            $blogid=DB::table("blog")->where("School",$id)->value("id");
            // Construct the URL
            $url = "https://findmyschool.net/blog/{$blogid}/{$name}";


            return response([

                "status" => "success",
                "message" => $url
            ]);
        } catch (\Exception $e) {
            return response()->json([

                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }



    public function matchotp()
    {

        $fields = array(
            "variables_values" => "678",
            "sender_id" => "BODVID",
            "message" => "157005",
            "route" => "dlt",
            "numbers" => "7754093527",
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array(
                "authorization: kYUAj9hHsbvn21XR3I4JPWzmC5ONtw6qGa7fSlEVFi8ugdQLoBt7HNMiReG60SjvlsTLIAXkg32qJEYd",
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        // Close cURL
        curl_close($curl);
    }
}
