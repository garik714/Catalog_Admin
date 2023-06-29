<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client as OClient;

class PassportAuthController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        dd(222);
        try {
            return $this->getTokenAndRefreshToken(request('email'), request('password'));
        } catch (\Throwable $e) {

            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $password = $request->password;
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return response()->json('Sucess');

    }

    public function getTokenAndRefreshToken($email, $password)
    {
        $oClient = OClient::where('password_client', 1)->first();
        $http = new Client;

        $response = $http->request('POST', 'http://localhost:8001/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $oClient->id,
                'client_secret' => $oClient->secret,
                'username' => $email,
                'password' => $password,
                'scope' => '*',
            ],
        ]);

        $result = json_decode((string)$response->getBody(), true);

        return response()->json($result, $this->successStatus);
    }

    public function refresh(Request $request)
    {
        $oClient = OClient::where('password_client', 1)->first();
        $response = Http::asForm()->post('http://localhost:8001/oauth/token', [

            'grant_type' => 'refresh_token',
            'refresh_token' => $request->get('refresh_token'),
            'client_id' => $oClient->id,
            'client_secret' => $oClient->secret,
            'scope' => '*',
        ]);

        return $response->json();
    }

}
