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
                $school_id = DB::table("fmsappuser")->where("username", $request->username)->where("password", $request->password)->value('school_id');
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful',
                    "school_id" => $school_id

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
            $blogid = DB::table("blog")->where("School", $id)->value("id");
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
    public function sendotp(Request $request)
    {


        $number = $request->number;










        // Your Fast2SMS API key
        $apiKey = 'kYUAj9hHsbvn21XR3I4JPWzmC5ONtw6qGa7fSlEVFi8ugdQLoBt7HNMiReG60SjvlsTLIAXkg32qJEYd'; // Replace with your actual API key

        // Fast2SMS endpoint URL
        $url = 'https://www.fast2sms.com/dev/bulkV2';
        $random_no = rand(1000, 9999);
        DB::table('fmsappuser')
            ->where('mobile', $number)
            ->update(['otp' => $random_no]);
        // Parameters for testing
        $data = array(
            "sender_id" => "BODVID",  // Replace with a valid sender ID
            "message" => "157005", // Replace with a valid message
            "route" => "dlt",         // Ensure this is the correct route
            "numbers" => $number, // Replace with a valid phone number (with country _
            "variables_values" => $random_no
        );

        // Initialize cURL
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url, // Fast2SMS API endpoint
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "authorization: $apiKey", // The API key for authentication
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        // Execute cURL request
        $response = curl_exec($curl);
        $err = curl_error($curl);

        // Close cURL
        curl_close($curl);

        // Handle cURL errors
        if ($err) {
            echo "cURL Error: $err";
        } else {
            // Decode the JSON response from the API
            $responseData = json_decode($response, true);

            // Check if the API key is valid and the request was successful
            if (isset($responseData['return']) && $responseData['return'] === true) {
                echo "API key is valid. OTP sent successfully.";
            } else {
                // If there was an issue, show the error message
                $errorMessage = isset($responseData['message']) ? $responseData['message'] : 'Unknown error occurred.';
                echo "Failed to send OTP: $errorMessage";
            }
        }
    }
    public function confirmotp(Request $request)
    {


        $number = $request->number;
        $entered_otp = $request->otp;
        $newpassword = $request->newpassword;



        $otpPresent = DB::table("fmsappuser")
            ->where('otp', $entered_otp)->where("mobile", $number)
            ->first();

        if ($otpPresent) {


            $updateotp = DB::table("fmsappuser")->where("mobile", $number)->update([
                "password" => $newpassword
            ]);

            if ($updateotp > 0) {


                return response()->json([

                    "status" => "success",
                    "message" => "password updated successfully"
                ]);
            } else {
                return response()->json([
                    "status" => "error",
                    "message" => "password is not updated"

                ]);
            }
        } else {

            return response()->json([

                "status" => "failure",
                "message" => "otp did not match"
            ]);
        }
    }
}
