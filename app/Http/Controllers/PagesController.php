<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\subject;
use enrollment;
use App\student;
use App\user;
use DB;


class PagesController extends Controller
{
    //
    public function StudentSubjects(){
      $Subjects = DB::table('enrollments')->rightJoin('subjects','enrollments.FK_SubjectID','=','subjects.id')->get();
      $CurrentUserInformation = Session::get('CurrentUser');
      $CurrentStudentInformation = Session::get('CurrentStudent');

      // print_r($Subjects);
      return view('navigation/student/subjects',['CurrentStudentInformation'=>$CurrentStudentInformation,'CurrentUserInformation'=>$CurrentUserInformation,'Subjects'=>$Subjects]);
    }

    public function StudentProfile(){
      $CurrentUserInformation = Session::get('CurrentUser');
      $CurrentStudentInformation = Session::get('CurrentStudent');

      $Enrollments = DB::table('enrollments')
                      ->join('subjects','enrollments.FK_SubjectID','=','subjects.id')
                      ->join('students','enrollments.FK_StudentID','=','students.id')
                      ->join('users','users.FK_StudentID','=','students.id')
                      ->where([['enrollments.Enrollment_Status','=','Enrolled'],['enrollments.FK_StudentID','=',$CurrentStudentInformation['id']]])
                      ->get();
      return view('navigation/student/dashboard',['CurrentStudentInformation'=>$CurrentStudentInformation,'CurrentUserInformation'=>$CurrentUserInformation,'Enrollments'=>$Enrollments]);
    }

    public function CollabotorAcceptStudentRequest(){
      $CurrentUserInformation = Session::get('CurrentUser');
      $CurrentStudentInformation = Session::get('CurrentStudent');

      $Enrollments = DB::table('enrollments')
                      ->join('subjects','enrollments.FK_SubjectID','=','subjects.id')
                      ->join('students','enrollments.FK_StudentID','=','students.id')
                      ->join('users','users.FK_StudentID','=','students.id')
                      ->where('enrollments.Enrollment_Status','=','Enrolled')
                      ->get();

      return view('navigation/collaborator/studentrequest',['CurrentStudentInformation'=>$CurrentStudentInformation,'CurrentUserInformation'=>$CurrentUserInformation,'Enrollments'=>$Enrollments]);
    }

    public function CollaboratorAddStudentToSubject(){
      $CurrentUserInformation = Session::get('CurrentUser');
      $CurrentStudentInformation = Session::get('CurrentStudent');
      $Enrollments = DB::table('enrollments')
                      ->join('subjects','enrollments.FK_SubjectID','=','subjects.id')
                      ->join('students','enrollments.FK_StudentID','=','students.id')
                      ->join('users','users.FK_StudentID','=','students.id')
                      ->where('enrollments.Enrollment_Status','=','Pending for Approval')
                      ->get();
    // print_r($Enrollments);

      return view('navigation/collaborator/addstudenttosubject',['CurrentStudentInformation'=>$CurrentStudentInformation,'CurrentUserInformation'=>$CurrentUserInformation,'Enrollments'=>$Enrollments]);
    }

    public function AdminDashBoard(){
      $CurrentUserInformation = Session::get('CurrentUser');
      $UserCount = user::where('User_AccessLevel','=','Coordinator')->count();
      $Coordinators = user::where('User_AccessLevel','=','Coordinator')->get();

    // print_r($Enrollments);

      return view('navigation/admin/dashboard',['CurrentUserInformation'=>$CurrentUserInformation,'UserCount'=>$UserCount,'Coordinators'=>$Coordinators]);
    }

    public function AdminStudents(){
      $CurrentUserInformation = Session::get('CurrentUser');
      $StudentsCount = student::count();
      $Students = DB::table('students')
      ->join('users','users.FK_StudentID','=','students.id')
      ->get();

    // print_r($Enrollments);

      return view('navigation/admin/students',['CurrentUserInformation'=>$CurrentUserInformation,'StudentsCount'=>$StudentsCount,'Students'=>$Students]);
    }

    public function AdminSubjects(){
      $CurrentUserInformation = Session::get('CurrentUser');
      $SubjectsCount = subject::count();
      $Subjects = subject::all();

    // print_r($Enrollments);

      return view('navigation/admin/subjects',['CurrentUserInformation'=>$CurrentUserInformation,'SubjectsCount'=>$SubjectsCount,'Subjects'=>$Subjects]);
    }

}
