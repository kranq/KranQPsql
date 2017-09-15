<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use App\User;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserValidatePasswordRequest;

class HomeController extends Controller
{
    protected $error = 'error';
    protected $success = 'success';
    protected $updatemsg = 'main.user.updateprofilesuccess';
    protected $updatepwdmsg = 'main.user.updatepwdsuccess';
    protected $pwderrormsg = 'main.user.pwderrormsg';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('home');
    }

    /**
     * To view the Profiles
     */
    public function profileView($id)
    {
        $data['user'] = User::findorfail($id);
        return view('user.updateProfile', $data);
    }

    /**
     * To update the Profile
     */
    public function updateProfile(UsersRequest $request, $id)
    {

        $input = $request->all();
        $userData = User::findorfail($id);

        // File Upload
        if ($request->hasFile('updateprofile')) {
            $oldFileName = $userData->profile_picture;
            $file = 'updateprofile';
            if ($request->hasFile($file) && $request->file($file)->getSize() > 0) {
                $destinationPath = base_path() . "/uploads/userProfile/";
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777);
                }
                // To unlink the old file
                if ($oldFileName) {
                        @unlink($destinationPath.'/'.$oldFileName);
                }
                $input['profile_picture'] = $request->file($file)->getClientOriginalName();
                $request->file($file)->move($destinationPath, $input['profile_picture']);
            }
        }
        $userData->fill($input);
        $userData->save();
        return Redirect::back()->with($this->success, trans($this->updatemsg));
    }

    /**
     * To show the Admin change Password form
     */
     public function changePassword($id)
     {
       $data['user'] = User::findorfail($id);
       return view('user.changePassword', $data);
     }

    /**
     *  To update the Password
     */
    public function updatePassword(UserValidatePasswordRequest $request, $id)
    {
        $userData = User::findorfail($id);
        $input  = $request->all();
        $user['password'] = bcrypt($input['password']);
        $userData->fill($user);
        $userData->save();
        return Redirect::back()->with($this->success, trans($this->updatemsg));
    }

    /**
     * Page Not Found
     * @return 404 page
     */
    public function pageNotFound()
    {
        return view('404');
    }
}
