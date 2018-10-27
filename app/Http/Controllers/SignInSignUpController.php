<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\student;
use App\user;
use Illuminate\Http\Request;
use Session;

class SignInSignUpController extends Controller
{
    //
    public function Register(Request $request){
      $this->validate($request,[
        'Birthdate' => 'required',
        'Gender' => 'required',
        'Username' => 'required|unique:users,User_UserName',
        'Email' => 'required',
        'FirstName' => 'required',
        'MiddleName' => 'required',
        'LastName' => 'required',
        'Password' => 'required',
        'Address' => 'required',
        'PhoneNumber' => 'required|max:11',
      ]);
      $NewStudent = new student;
      $NewStudent->Student_DateOfBirth = $request->Birthdate;
      $NewStudent->Student_Gender = $request->Gender;
      $NewStudent->Student_RegisteredDate = Carbon::now();
      $NewStudent->save();

      $NewUser = new user;
      $NewUser->User_UserName = $request->Username;
      $NewUser->User_Email = $request->Email;
      $NewUser->User_FirstName = $request->FirstName;
      $NewUser->User_MiddleName = $request->MiddleName;
      $NewUser->User_LastName = $request->LastName;
      $NewUser->User_Password = $request->Password;
      $NewUser->User_AccessLevel = "Student";
      $NewUser->User_Address = $request->Address;
      $NewUser->User_ContactNumber = $request->PhoneNumber;
      $NewUser->FK_StudentID = $NewStudent->id;
      $NewUser->save();

      return response()->json($NewUser);
    }

    public function Login(Request $request){

      $LoginUser = user::where([['User_UserName','=',$request->Username],['User_Password','=',$request->Password]])->first();

      if($LoginUser == NULL){
          // return back()->with('status', 'A bank deposit with a same transaction number has already been approved.');
        return back()->with('error','No Existing Account Found');
      }
      if($LoginUser['User_AccessLevel'] == "Student"){

          $StudentInformation = student::find($LoginUser['id']);
          Session::put('CurrentUser',$LoginUser);
          Session::put('CurrentStudent',$StudentInformation);
              return redirect('/student/profile');
      }
      if($LoginUser['User_AccessLevel'] == "Coordinator"){
          Session::put('CurrentUser',$LoginUser);

          return redirect('/Coordinator/subjects');
      }
      if($LoginUser['User_AccessLevel']=="Admin"){
        Session::put('CurrentUser',$LoginUser);
        return redirect('/admin/dashboard');
      }


    }

    public function LogOut(){
      Session::put('CurrentUser',null);
      Session::put('CurrentStudent',null);

      return redirect('/');
    }

    public function newCoordinator(Request $request){
      $this->validate($request,[
        'Username' => 'required|unique:users,User_UserName',
        'Email' => 'required|unique:users,User_Email',
        'Email' => 'required',
        'MiddleName' => 'required',
        'LastName' => 'required',
        'Password' => 'required',
        'Address' => 'required',
        'PhoneNumber' => 'required|max:11',
      ]);
      $NewUser = new user;
      $NewUser->User_UserName = $request->Username;
      $NewUser->User_Email = $request->Email;
      $NewUser->User_FirstName = $request->FirstName;
      $NewUser->User_MiddleName = $request->MiddleName;
      $NewUser->User_LastName = $request->LastName;
      $NewUser->User_Password = $request->Password;
      $NewUser->User_AccessLevel = "Coordinator";
      $NewUser->User_Address = $request->Address;
      $NewUser->User_ContactNumber = $request->PhoneNumber;
      $NewUser->save();

      return back()->with('success','Successfully Added Coordinator');
    }

    public function editStudentProfile(Request $request){
      $this->validate($request,[
        'UserID' => 'required',
        'FirstName' => 'required',
        'MiddleName' => 'required',
        'LastName' => 'required',
        'Address' => 'required',
        'ContactNumber' => 'required|max:11',
        'Gender' => 'required',
        'Birthdate' => 'required'
      ]);




      $user = user::find($request->UserID);
      $user->User_FirstName = $request->FirstName;
      $user->User_MiddleName = $request->MiddleName;
      $user->User_LastName = $request->LastName;
      $user->User_Address = $request->Address;

      $student = student::find($user->FK_StudentID);
      $student->Student_Gender = $request->Gender;
      $student->Student_DateOfBirth = $request->Birthdate;
      $student->save();

      if($request->ProfilePicture !=null){
        $fileName = md5(rand());
        $fileName = $fileName.".jpg"; // generates file name
        $target= "profilepicture/";
        $fileTarget = $target.$fileName;
        $tempFileName = $_FILES['ProfilePicture']['tmp_name'];
        $result= move_uploaded_file($tempFileName,$fileTarget);
        $user->User_ProfileImage= $fileTarget;
      }
        $user->save();

          Session::put('CurrentUser',$user);
          Session::put('CurrentStudent',$student);
        return back()->with('success','Successfully Edited Profile');
    }
}
