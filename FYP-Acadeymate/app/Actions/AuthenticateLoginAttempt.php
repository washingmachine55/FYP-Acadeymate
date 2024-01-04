<?php

// namespace App\Actions;
// use Illuminate\Http\Request;
// use App\Models\User;
// use App\Models\DevAdmin;
// use Illuminate\Support\Facades\Hash;
// use Laravel\Fortify\Fortify;


// class AuthenticateLoginAttempt extends Fortify
// {
//     public function handle(Request $request)
//     {
//         // $response = next($request);

//         $user = User::where('email', $request->email)->first();
//         $devadmin = DevAdmin::where('email', $request->email)->first();

//         if ($user &&
//             Hash::check($request->password, $user->password)) {
//             return $user;
//         } elseif ($devadmin && Hash::check($request->password, $devadmin->password)) {
//             return $devadmin;
//         } else {
//             return false;
//         }
//     }

// }
