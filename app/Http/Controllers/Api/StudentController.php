<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        if($students->count() > 0){
         return  $data = response()->json([
                'status'=> 200,
                'data'=> $students
            ],200);
        }
        else{
           return $data = response()->json([
                'status'=> 404,
                'data'=> 'No data found'
            ],404);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:191',
                'course' => 'required|string|max:191',
                'email' => 'required|email|max:191',
                'phone' => 'required|digits:10',
               ]

    );

        if($validator->fails()){
            return  $data = response()->json([
                'status'=> 422,
                'errors'=>$validator->messages()
            ],422);
        }
        else{
            $student  = Student::create([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone

            ]);
            if($student){
                return  $data = response()->json([
                    'status'=> 201,
                    'data'=> 'Student created successfully'
                ],201);
            }
            else{
                return  $data = response()->json([
                    'status'=> 500,
                    'data'=> 'Something went wrong'
                ]);
            }

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);

        if($student){
            return  $data = response()->json([
                'status'=> 200,
                'data'=> $student
            ],200);
        }
        else{
            return  $data = response()->json([
                'status'=> 404,
                'data'=> 'No student found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        if($student){
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:191',
                'course' => 'required|string|max:191',
                'email' => 'required|email|max:191',
                'phone' => 'required|digits:10',
            ]);
            if($validator->fails()){
                return  $data = response()->json([
                    'status'=> 422,
                    'errors'=>$validator->messages()
                ],422);
            }
            else{
               $student->update([
                    'name' => $request->name,
                    'course' => $request->course,
                    'email' => $request->email,
                    'phone' => $request->phone

                ]);
                if($student){
                    return  $data = response()->json([
                        'status'=> 201,
                        'data'=> 'Student updated successfully'
                    ],201);
                }
                else{
                    return  $data = response()->json([
                        'status'=> 500,
                        'data'=> 'No such student found'
                    ]);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $student = Student::find($id);
       if($student){
          $student->delete();
          return  $data = response()->json([
              'status'=> 200,
              'data'=> 'Student deleted successfully'
          ]);
       }
       else{
           return  $data = response()->json([
               'status'=> 404,
               'data'=> 'No student found'
           ]);
       }
    }
}
