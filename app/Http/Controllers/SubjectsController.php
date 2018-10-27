<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\subject;
use App\enrollment;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Subjects = subject::all();
      $CurrentUserInformation = Session::get('CurrentUser');

      return view('navigation/collaborator/dashboard',['CurrentUserInformation'=>$CurrentUserInformation,'Subjects'=>$Subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request,[
        'SubjectID' => 'required|unique:subjects,Subject_ID',
        'SubjectName' => 'required',
        'SubjectDescription' => 'required',
        'SubjectDay' => 'required',
        'SubjectStartTime' => 'required',
        'SubjectEndTime' => 'required|after:SubjectStartTime',
        'SubjectYear' => 'required',
      ]);
        $subject = new subject();
        $subject->FK_UserID = Session::get('CurrentUser')['id'];
        $subject->Subject_ID = $request->SubjectID;
        $subject->Subject_Name = $request->SubjectName;
        $subject->Subject_Description = $request->SubjectDescription;
        $subject->Subject_Day = $request->SubjectDay;
        $subject->Subject_StartTime = $request->SubjectStartTime;
        $subject->Subject_EndTime = $request->SubjectEndTime;
        $subject->Subject_Year = $request->SubjectYear;

        $fileName = md5(rand());
        $fileName = $fileName.".jpg"; // generates file name
        $target= "profilepicture/";
        $fileTarget = $target.$fileName;
        $tempFileName = $_FILES['SubjectPicture']['tmp_name'];
        $result= move_uploaded_file($tempFileName,$fileTarget);
        $subject->Subject_Picture = $fileTarget;

        $subject->save();

        return back()->with('success','Successfully added Subject');

        // $bazaar->Bazaar_EventPoster = $fileTarget;
        // $bazaar->Bazaar_Name = $request->Bazaar_Name;
        // $bazaar->Bazaar_Venue = $request->Bazaar_Venue;
        // $bazaar->Bazaar_DateStart = $request->Bazaar_DateStart;
        // $bazaar->Bazaar_DateEnd = $request->Bazaar_DateEnd;
        // $bazaar->Bazaar_TimeStart = $request->Bazaar_TimeStart;
        // $bazaar->Bazaar_TimeEnd = $request->Bazaar_TimeEnd;
        // $bazaar->Bazaar_Status = "Available";
        // $bazaar->Bazaar_Description = $request->Bazaar_Description;
        // $bazaar->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'SubjectID' => 'required|unique:subjects,Subject_ID',
        'SubjectName' => 'required',
        'SubjectDescription' => 'required',
        'SubjectDay' => 'required',
        'SubjectStartTime' => 'required',
        'SubjectEndTime' => 'required|after:SubjectStartTime',
        'SubjectYear' => 'required',
      ]);
      $subject = subject::find($id);
      $subject->Subject_ID = $request->SubjectID;
      $subject->Subject_Name = $request->SubjectName;
      $subject->Subject_Description = $request->SubjectDescription;
      $subject->Subject_Day = $request->SubjectDay;
      $subject->Subject_StartTime = $request->SubjectStartTime;
      $subject->Subject_EndTime = $request->SubjectEndTime;
      $subject->Subject_Year = $request->SubjectYear;

      if($request->SubjectPicture != NULL){
      $fileName = md5(rand());
      $fileName = $fileName.".jpg"; // generates file name
      $target= "profilepicture/";
      $fileTarget = $target.$fileName;
      $tempFileName = $_FILES['SubjectPicture']['tmp_name'];
      $result= move_uploaded_file($tempFileName,$fileTarget);
      $subject->Subject_Picture = $fileTarget;
      }

      $subject->save();

      return back()->with('success','Successfully Edited Subject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function EditSubject(Request $request)
    {
      $this->validate($request,[
        'SubjectID' => 'required|unique:subjects,Subject_ID',
        'SubjectName' => 'required',
        'SubjectDescription' => 'required',
        'SubjectDay' => 'required',
        'SubjectStartTime' => 'required',
        'SubjectEndTime' => 'required|after:SubjectStartTime',
        'SubjectYear' => 'required',
      ]);
      $subject = subject::find($request->ID);
      $subject->Subject_ID = $request->SubjectID;
      $subject->Subject_Name = $request->SubjectName;
      $subject->Subject_Description = $request->SubjectDescription;
      $subject->Subject_Day = $request->SubjectDay;
      $subject->Subject_StartTime = $request->SubjectStartTime;
      $subject->Subject_EndTime = $request->SubjectEndTime;
      $subject->Subject_Year = $request->SubjectYear;

      if($request->SubjectPicture != NULL){
      $fileName = md5(rand());
      $fileName = $fileName.".jpg"; // generates file name
      $target= "profilepicture/";
      $fileTarget = $target.$fileName;
      $tempFileName = $_FILES['SubjectPicture']['tmp_name'];
      $result= move_uploaded_file($tempFileName,$fileTarget);
      $subject->Subject_Picture = $fileTarget;
      }

      $subject->save();

      return back()->with('success','Successfully Edited Subject');
    }

    public function DeleteSubject(Request $request)
    {
      $this->validate($request,[
        'ID' => 'required'
      ]);
      $subject = subject::find($request->ID);
      $subject->delete();

      return back()->with('delete','Successfully Deleted Subject');
    }

    public function enroll(Request $request){
      $this->validate($request,[
        'ID' => 'required'
      ]);
      $CurrentStudentInformation = Session::get('CurrentStudent');
      $enrollment = new enrollment;
      $enrollment->Enrollment_Status = "Pending for Approval";
      $enrollment->FK_SubjectID = $request->ID;
      $enrollment->FK_StudentID = $CurrentStudentInformation['id'];
      $enrollment->save();

        return back()->with('success','Successfully Enrolled Subject');
    }

    public function approveEnrollment(Request $request){
      $this->validate($request,[
        'EnrollmentID' => 'required'
      ]);
      $enrollment = enrollment::find($request->EnrollmentID);
      $enrollment->Enrollment_Status = "Enrolled";
      $enrollment->save();
    return back()->with('success','Successfully Approve Student Request');
    }
}
