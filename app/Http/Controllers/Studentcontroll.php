<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\student;
use App\branch;
use App\course;
use App\fee;
use Session;
use Illuminate\Support\Facades\DB;

class Studentcontroll extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        $branches = branch::all();
        $courses = course::all();
        return view('studentregister',compact(['branches','courses']));
    }

   
    public function store(Request $request)
    {
        
        $student = Student::create( $request->all());

        // $student->sname = $request->sname;
        // $student->fname = $request->fname;
        // $student->class = $request->class;
        // $student->email = $request->email;
        // $student->course_id = $request->course_id;
        // $student->branch_id = $request->branch_id;
        // $student->image = $request->file('image')->getClientOriginalName();
        // $student->save();

        $request->image->move(public_path('images'),$student->image);

        if($student){
            session::flash('addMsg','Record Inserted Successfully');
            return redirect('studentregisterform');

        }else{

        }
        //$student = new student;
        //return dd($student);
    }

    
    public function show(Request $request)
    {
        $student_cols = $request->param;
        //dd($student_cols);

        if($student_cols){

            $student = student::select('id','sname');
            //dd($student);

            foreach ($student_cols as $key => $value) {
                $student->addselect($value);
            }

            $students = $student->paginate(4);

        }else
            $students = student::select('id','sname')->paginate(4);
            return view('studentdetails',compact('students'));
        
    }


     public function show2(Request $request)
    {
        if($request->ajax()){

        $student_cols = $request->get('filter');

        if($student_cols){
            $columns = explode(',', $student_cols);
            $student = student::select('id','sname');
            foreach ($columns as $key => $value) {
                $student->addselect($value);
            }
            
            $students = $student->paginate(4);
            return view('studentdetails_ajax', compact('students'));
        }
        else{
            $students = student::select('id','sname')->paginate(4);
            return view('studentdetails_ajax',compact('students'));
        }
    }
        else{
            $students = student::select('id','sname')->paginate(4);
            return view('studentdetails',compact('students'));
        }
        
    }

    public function ajax_show(Request $request)
    {
        if($request->ajax()){
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $search = $request->get('search');
            $search = str_replace(" ", "%", $search);

            $students = student::where('sname', 'like', '%'.$search.'%')
                          ->orWhere('fname', 'like', '%'.$search.'%')
                          ->orderBy($sort_by, $sort_type)
                          ->paginate(3);

            return view('studentdetails_ajax', compact('students'));
        }
    }

   
    public function edit($id)
    {
        //dd($id);
        $students = student::find($id);
       // dd($student);
        return view('studentedit',compact('students'));
    }

    
    public function update(Request $request, $id)
    {
        $students = student::find($id);
        $students->sname = $request->input('sname');
        $students->fname = $request->input('fname');
        $students->class = $request->input('class');
        $students->phnum = $request->input('phnum');
        $students->email = $request->input('email');
        
        $students->save();

        return redirect('studentdetails');
    }

   
    public function destroy($id)
    {
       $student = student::find($id);
       $student->delete();
       return redirect('studentdetails');
    }

    public function courses(Request $request){

        $id = $request->id;
        $data['courses'] = course::where("branch_id",$id)->get();
        // echo "<pre>";
        // print_r($data['courses']);
        // exit;
        echo json_encode($data);
    }

     public function single_student(Request $request){
        $id = $request->id;
        $student = student::where(['id'=>$id])->get();
        //  $student = student::select('*')
        // ->join('fees','students.id','fees.student_id')
        // ->where('students.id',$id)
        // ->get();

        // echo "<pre>";
        // print_r($student);
        // exit;
        //print_r($student[0]['id']);exit();
        return view('student_show',compact('student'));
    }

    public function fee_form(Request $request){
        $id = $request->id;
        $fees = Fee::where(['student_id'=>$id])->get();
        //dd($id);
        return view('feeform',compact(['fees','id']));
    }

    public function feeadd(Request $request){
        
        $fee = fee::create( $request->all());
        $id = $request->student_id;
        $link = 'student-fee?id='.$id;
       

        if($fee)
        session::flash('msg','Fee added successfully');
        return redirect('student-fee?id='.$id);
        //return redirect(route('student.fee', ['id' => $id]));
    }
}
