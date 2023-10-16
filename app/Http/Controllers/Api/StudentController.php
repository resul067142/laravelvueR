<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $student = Student::query()->get();
        return response()->json($student);
    }

    public function store(StudentRequest $request) {

        $student = Student::create(
            [
                'name' => $request->name,
                'surname' => $request->surname,
                'number' => $request->number,
                'class' => $request->class
            ]
        );

        return response()->json($student);
    }

    public function show($id) {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function update(StudentRequest $request, $id) {
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return response()->json($student);
    }
    public function destroy($id) {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Ögrenci bulunamadı'], 404);
        }

        $student->delete();

        return response()->json(['message' => $student->name . ' isimli ögrenci silindi']);
    }
}

