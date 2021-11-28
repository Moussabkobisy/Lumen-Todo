<?php

namespace App\Http\Controllers;

use App\Classes\Todo\GetTodo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    protected $user_id;
    public function __construct()
    {
        $this->user_id = Auth::user()->id;
    }

    public function GetAllOrByDate(Request $request)
    {
        try {
            $get_todos = GetTodo::newByUserId($this->user_id);
            if (isset($request->year)&& !isset($request->month)){
                $data = $get_todos->getByYear($request->year);
            }
            else if (isset($request->month) && !isset($request->day)){
                $data = $get_todos->getByYearMonth($request->year,$request->month);
            }
            else if (isset($request->day)){
                $data = $get_todos->getByYearMonthDay($request->year,$request->month,$request->day);
            }
            else{
                $data = $get_todos->getAll();
            }
            return response()->json(['status' => 'success', 'message' => 'todos list','data'=>$data]);
        } catch (\Exception $e) {
            // log $e->getMessage() in log store
            return response()->json(['status' => 'error', 'message' => 'something went wrong']);
        }
    }

    public function GetByCategoryStatus(Request $request)
    {
        try {
            $get_todos = GetTodo::newByUserId($this->user_id);
            $data = $get_todos->GetByCategoryStatus($request->category_id,$request->status);
            return response()->json(['status' => 'success', 'message' => 'todos list','data'=>$data]);
        } catch (\Exception $e) {
            // log $e->getMessage() in log store
            dd($e->getMessage());

            return response()->json(['status' => 'error', 'message' => 'something went wrong']);
        }
    }
    public function GetByCategory(Request $request)
    {
        try {
            $get_todos = GetTodo::newByUserId($this->user_id);
            $data = $get_todos->getByCategoryId($request->category_id);
            return response()->json(['status' => 'success', 'message' => 'todos list','data'=>$data]);
        } catch (\Exception $e) {
            // log $e->getMessage() in log store
            return response()->json(['status' => 'error', 'message' => 'something went wrong']);
        }        }
    public function GetByStatus(Request $request)
    {
        try {
            $get_todos = GetTodo::newByUserId($this->user_id);
            $data = $get_todos->GetByStatus($request->status);
            return response()->json(['status' => 'success', 'message' => 'todos list','data'=>$data]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            // log $e->getMessage() in log store
            return response()->json(['status' => 'error', 'message' => 'something went wrong']);
        }
    }
}
