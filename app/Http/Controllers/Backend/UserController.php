<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//libraries
use Session;
use Hash;

//models 
use App\Models\UsersModel;

class UserController extends Controller {
    
    public function login() {

        if (Session::has('administrator')) {
            return redirect('twist-administration/pricings-list');
        }

        $title = 'Users | Login | Twist Administration';

        return view ('backend.users.login', compact('title'));
    } 

    public function list(Request $request) {

        $title = 'Users | List | Twist Administration';

        $filterSource = false;

        if ($request->has('source') && $request->input('source') != '') {
            $filterSource = $request->input('source');
        }

       $totalUsers = UsersModel::count();

       $users = UsersModel::select('user_id', 'name', 'surname', 'email')->when($filterSource, function($query, $filterSource) {
            return $query->where('name', 'LIKE', '%'.$filterSource.'%')
            ->orWhere('surname', 'LIKE', '%'.$filterSource.'%')
            ->orWhere('email', 'LIKE', '%'.$filterSource.'%');
       })->orderBy('user_id', 'desc')->get();

        $filtersParameters = [
            'filterSource' => $filterSource
        ];

        $scripts = array('users.js');

        return view ('backend.users.list', compact('title', 'totalUsers', 'users', 'filtersParameters', 'scripts'));
    } 

    public function register() {

        $title = 'Users | Registration | Twist Administration';

        $scripts = array('users.js');

        return view ('backend.users.register', compact('title', 'scripts'));
    } 

    public function edit($userId) {

        $userData = UsersModel::where('user_id', $userId)->first();

        $title = 'Users | Edit | Twist Administration';

        $scripts = array('users.js');

        return view('backend.users.edit', compact('title', 'userData', 'scripts'));
    }

    public function profile() {

        $userId = Session('administrator')['user_id'];
        $userData = UsersModel::where('user_id', $userId)->first();

        if (!$userData) {
            return Redirect('twist-administration/users-list');
        }

        $title = 'Users | Profile | Twist Administration';

        $scripts = array('users.js');

        return view('backend.users.profile', compact('title', 'userData', 'scripts'));
    }

    public function loginUser(Request $request) {

        $messages = [
            'email.required' => 'You must enter your email to access the system',
            'password.required' => 'You must enter your password to access the system'
        ];

        $validations = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], $messages);

        $email = $request->input('email');
        $password = $request->input('password');

        $verifyUser = UsersModel::where('email', $email)->first();

        if (!$verifyUser){
            return response()->json(['success' => false, 'message' => 'The email entered does not exist']);
        } else {
            if (!Hash::check($password, $verifyUser->password)) {
                return response()->json(['success' => false, 'message' => 'The password entered is incorrect']);
            } else {
                $data = [
                    'user_id' => $verifyUser->user_id,
                    'name' => $verifyUser->name,
                    'surname' => $verifyUser->surname,
                    'email' => $verifyUser->email
                ];

                Session::put('administrator', $data);

                return response()->json(['success' => true]);
            }
        }
    } 

    public function registerUser(Request $request) {

        $messages = [
            'name.required' => 'You must enter the username',
            'name.min' => 'The username must contain at least 3 characters',
            'name.max' => 'The username must contain less than 30 characters',
            'surname.required' => 'You must enter the user´s last name',
            'surname.min' => 'The user´s last name must contain at least 3 characters',
            'surname.max' => 'The user´s last name must contain less than 30 characters',
            'email.required' => 'You must enter the user´s email',
            'email.max' => 'The user´s email must contain less than 80 characters',
            'email.email' => 'The email entered is invalid',
            'email.unique' => 'There is already a registered user with that email address',
            'password.required' => 'You must enter a password for the user',
            'password.min' => 'The user password must contain at least 10 characters',
            'repeat_password.required' => 'You must enter a password for the user',
            'repeat_password.min' => 'The user password must contain at least 10 characters',
            'repeat_password.same' => 'The entered keys do not match'
        ];

        $validations = $request->validate([
            'name' => 'required|min:3|max:30',
            'surname' => 'required|min:3|max:30',
            'email' => 'required|max:80|unique:tw_users',
            'password' => 'required|min:10',
            'repeat_password' => 'required|min:10|same:password'
        ], $messages);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $password = $request->input('password');
        $repeat_password = $request->input('repeat_password');

        $UsersModel = new UsersModel();
        $UsersModel->name = $name;
        $UsersModel->surname = $surname;
        $UsersModel->email = $email;
        $UsersModel->password = Hash::make($password);
        $UsersModel->registration_date = date('Y-m-d');
        $UsersModel->save();
        $userId = $UsersModel->user_id;

        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
            'userId' => $userId
        ]);
    }

    public function editUser($userId, Request $request) {

        $messages = [
            'name.required' => 'You must enter the username',
            'name.min' => 'The username must contain at least 3 characters',
            'name.max' => 'The username must contain less than 30 characters',
            'surname.required' => 'You must enter the user´s last name',
            'surname.min' => 'The user´s last name must contain at least 3 characters',
            'surname.max' => 'The user´s last name must contain less than 30 characters',
            'email.required' => 'You must enter the user´s email',
            'email.max' => 'The user´s email must contain less than 80 characters',
            'email.email' => 'The email entered is invalid',
            'email.unique' => 'There is already a registered user with that email address',
            'password.min' => 'The user password must contain at least 10 characters',
            'repeat_password.min' => 'The user password must contain at least 10 characters',
            'repeat_password.same' => 'The entered keys do not match'
        ];

        $validations = $request->validate([
            'name' => 'required|min:3|max:30',
            'surname' => 'required|min:3|max:30',
            'email' => 'required|max:80|email|unique:tw_users,email,'.$userId.',user_id',
            'password' => 'nullable|min:10',
            'repeat_password' => 'nullable|min:10|same:password'
        ], $messages);

        $isUserProfile = $request->input('is_user_profile');
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $password = $request->input('password');
        $repeat_password = $request->input('repeat_password');

        if ($password && $repeat_password){
            UsersModel::where('user_id', $userId)->update([
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'password' => Hash::make($password)
            ]);
        } else {
            UsersModel::where('user_id', $userId)->update([
                'name' => $name,
                'surname' => $surname,
                'email' => $email
            ]);
        }

        $verifyUser = UsersModel::where('user_id', $userId)->first();

        if ($isUserProfile) {
            $data = [
                'user_id' => $verifyUser->user_id,
                'name' => $verifyUser->name,
                'surname' => $verifyUser->surname,
                'email' => $verifyUser->email
            ];

            Session::put('administrator', $data);
        }

        return response()->json([
            'success' => true,
            'message' => 'User edited successfully',
            'userId' => $userId
        ]);

    }

    public function deleteUser($userId) {
        $userData = UsersModel::where('user_id', $userId)->first();

        if (!$userData) {
            return response()->json(['success' => false, 'message' => 'The user ID is invalid or non-existent']);
        }

        if ($userId == Session('administrator')['user_id']) {
            return response()->json(['success' => false, 'message' => 'You cannot remove yourself from the system']);
        }

        UsersModel::where('user_id', $userId)->delete();

        return response()->json(['success' => true, 'message' => 'The user has been successfully deleted']);
    }

    public function logout() {
        Session::flush();
        return redirect('twist-administration');
    } 
}