<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    function login(Request $request)
    {
        $validation = $request->validate([
            "username" => "required",
            "password" => "required",
        ]);

        $admin = Admin::where([
            ['name', "=", $request->username],
            ['password', "=", $request->password],
        ])->first();

        if (!$admin) {
            $validation = $request->validate([
                "admin" => "required",
            ], [
                "admin.required" => "Admin Credentials Invalid",
            ]);
        }

        Session::put('adminSession', $admin);
        return redirect('dashboard');
    }

    function dashboard()
    {
        $admin = Session::get('adminSession');
        $totalUsers = User::count();
        $totalAdmin = Admin::count();
        $totalCategories = Category::count();
        $totalQuestions = Mcq::count();
        $totalQuiz = Quiz::count();
        $quizCompleted = Record::where('status', '2')->count();
        $quizIncompleted = Record::where('status', '1')->count();
        if ($admin) {
            $user = User::orderBy('id', 'desc')->get();
            return view('all-users', [
                "adName" => $admin->name,
                "user" => $user,
                'totalUsers' => $totalUsers,
                'totalAdmin' => $totalAdmin,
                'totalCategories' => $totalCategories,
                'totalQuestions' => $totalQuestions,
                'totalQuiz' => $totalQuiz,
                'quizCompleted' => $quizCompleted,
                'quizIncompleted' => $quizIncompleted,
            ]);
        } else {
            return redirect('admin-login');
        }
    }

    function categories()
    {
        $categories = Category::get();
        $admin = Session::get('adminSession');
        if ($admin) {
            return view('categories', ["adName" => $admin->name, "getCategories" => $categories]);
        } else {
            return redirect('admin-login');
        }
    }

    function logout()
    {
        $admin = Session::forget('adminSession');
        return redirect('admin-login');
    }

    function addCategories(Request $request)
    {
        $validation = $request->validate(
            [
                "category_name" => "required | min:3 | unique:categories,name",
            ],
            [
                "category_name.required" => "Category is Empty",
            ]
        );
        $admin = Session::get('adminSession');
        $category = new Category();             //Category Model 
        $category->name = $request->category_name; // input name  is save to db from model obj
        $category->creator = $admin->name;
        if ($category->save()) {
            Session::flash('category', "Data Added Successfully..."); //To display msg 
        }
        return redirect('admin-categories');
    }

    function deleteCategories($id)
    {
        $removed = Category::find($id)->delete();
        if ($removed) {
            Session::flash('category', "Data Deleted Successfully...");
            return redirect('admin-categories');
        }
    }

    function showAddQuiz()
    {
        $categories = Category::get();
        $admin = Session::get('adminSession');
        $quizList = Quiz::get();
        if ($admin) {
            //Check if quizSession already exists
            if (Session::has('quizSession')) {
                Session::flash('quizInfo', 'You have an unfinished quiz. Resuming...');
                return redirect('/add-mcq'); // Resume the unfinished quiz
            }
            //show fresh quiz form
            return view('add-quiz', ["adName" => $admin->name, "categories" => $categories, 'quizList' => $quizList]);
        } else {
            return redirect('admin-login');
        }
    }



    function addQuiz(Request $request)
    {
        $validation = $request->validate(
            [
                "quiz_name" => "required | min:3 ",
            ],
        );
        $categories = Category::get();
        $admin = Session::get('adminSession');
        if ($admin) {
            $quizName = request('quiz_name');
            $category_id = request('quiz_category');

            if ($quizName && $category_id) {

                $existingQuiz = Quiz::where('name', $quizName)
                    ->where('category_id', $category_id)
                    ->first();

                if ($existingQuiz) {
                    Session::flash('quizErr', 'Name Already Exists...');
                } else {
                    //create new quiz
                    $quiz = new Quiz();
                    $quiz->name = $quizName;
                    $quiz->category_id = $category_id;
                    if ($quiz->save()) {
                        Session::flash('quizSec', 'Quiz Creatd successfully.');
                        Session::put('quizSession', $quiz);
                        Session::put('mcq_no', 1); //Initializing 1
                        return redirect('/add-mcq');
                    }
                }
            }
            return view('add-quiz', ["adName" => $admin->name, "categories" => $categories]);
        } else {
            return redirect('admin-login');
        }
    }

    function showAddMCQ()
    {
        $admin = Session::get('adminSession');
        $quiz = Session::get('quizSession');
        $mcqNo = Session::get('mcq_no', 1);
        if ($quiz) {
            return view('add-mcq', ["quizName" => $quiz->name, "adName" => $admin->name, "mcqNo" => $mcqNo]);
        } else {
            return redirect('add-quiz');
        }
    }

    function addMCQ(Request $request)
    {
        $admin = Session::get('adminSession');
        $quiz = Session::get('quizSession');
        $mcq = new Mcq();
        $mcq->category_id = $quiz->category_id;
        $mcq->quiz_id = $quiz->id;
        $mcq->admin_id = $admin->id;
        $mcq->question = $request->question;
        $mcq->option_a = $request->option_a;
        $mcq->option_b = $request->option_b;
        $mcq->option_c = $request->option_c;
        $mcq->option_d = $request->option_d;
        $mcq->correct_ans = $request->correct_ans;
        if ($mcq->save()) {
            if ($request->submit == "next") {
                $currentNo = Session::get('mcq_no', 1);
                Session::put('mcq_no', $currentNo + 1);
                return redirect(url()->previous());
            } else {
                Session::forget('quizSession');
                Session::forget('mcq_no');
                Session::flash('quizSec', 'All MCQs submitted.');
                return redirect('/add-quiz');
            }
        }
    }

    function showMCQ($id, $quizName)
    {
        $admin = Session::get('adminSession');
        $quiz = Session::get('quizSession');
        $mcqs =  Mcq::where('quiz_id', $id)->get();
        if ($admin) {
            return view('show-mcq', ["adName" => $admin->name, "quizName" => $quizName, "mcqs" => $mcqs]);
        } else {
            return redirect('admin-login');
        }
    }

    function showQuizList($id, $category)
    {
        $admin = Session::get('adminSession');
        if ($admin) {
            $quizList = Quiz::where('category_id', $id)->get();
            return view('quiz-list', ["adName" => $admin->name, "quizList" => $quizList, "category" => $category]);
        } else {
            return redirect('admin-login');
        }
    }

    function deleteQuizList($id)
    {
        $removed = Quiz::find($id)->delete();
        if ($removed) {
            return redirect()->back()->with('category', 'Quiz deleted.'); //Flash msg with session
        }

        return redirect()->back()->with('category', 'Quiz not found.');
    }

    function editMCQ($id, $quizName)
    {
        $admin = Session::get('adminSession');
        if (!$admin) return redirect('admin-login');

        $mcq = Mcq::findOrFail($id);
        return view('edit-mcq', ['mcq' => $mcq, 'quizName' => $quizName, "adName" => $admin->name,]);
    }

    function updateMCQ(Request $request, $id, $quizName)
    {
        $mcq = Mcq::findOrFail($id);
        $mcq->question = $request->question;
        $mcq->option_a = $request->option_a;
        $mcq->option_b = $request->option_b;
        $mcq->option_c = $request->option_c;
        $mcq->option_d = $request->option_d;
        $mcq->correct_ans = $request->correct_ans;

        $mcq->save();

        Session::flash('quizInfo', 'MCQ updated successfully.');
        return redirect('/show-mcq/' . $mcq->quiz_id . '/' . $quizName);
    }

    function deleteMCQ($id, $quizName)
    {
        $mcq = Mcq::findOrFail($id);
        $quizId = $mcq->quiz_id;
        $mcq->delete();

        Session::flash('quizInfo', 'MCQ deleted successfully.');
        return redirect('/show-mcq/' . $quizId . '/' . $quizName);
    }
}
