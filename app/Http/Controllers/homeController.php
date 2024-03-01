<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\home;
use Redirect;

class homeController extends Controller
{
    // ...
   
    

    // HomeController.php

public function homepost(Request $request)
{
    // Check if the user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to add todo.');
    }

    $request->validate([
        'date' => 'required|date',
        'todo' => 'required|string',
    ]);

    // Get the authenticated user
    $user = Auth::user();

    $date = $request->input('date');
    $todo = $request->input('todo');

    // Store the submitted data into the database
    $user->todos()->create([
        'date' => $date,
        'todo_list' => $todo
    ]);

    return redirect()->route('list.post');
}


    public function list()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view todos.');
        }
    
        // Retrieve the authenticated user
        $user = Auth::user();
    
        // Retrieve the todos associated with the authenticated user
        $todos = $user->todos;
    
        if ($todos->isEmpty()) {
            return redirect()->route('home')->with('message', 'No todos found.');
        }
    
        return view('home', compact('todos'));
    }
   public function edit($id){
    $todo = Home::findorfail($id);
    return view('edit',['todo'=>$todo]);
   }
   public function editpost(Request $request)
   {
       $request->validate([
           'date-edit' => 'required|date',
           'todo-edit' => 'required|string',
       ]);
   
       $date = $request->input('date-edit');
       $todo = $request->input('todo-edit');
   
       // Fetch the todo based on the date
       $todoToUpdate = Home::where('date', $date)->first();
   
       if (!$todoToUpdate) {
           return redirect()->back()->with('error', 'Todo not found for the given date.');
       }
   
       // Update the todo with the new details
       $todoToUpdate->update([
           'todo_list' => $todo
       ]);
   
       return redirect()->route('list.post')->with('success', 'Todo updated successfully.');
   }
   public function deleteTodo($id)
{
    // Find the todo item by its ID
    $todo = Home::find($id);

    // Check if the todo item exists
    if (!$todo) {
        return redirect()->back()->with('error', 'Todo not found.');
    }

    // Delete the todo item
    $todo->delete();

    return redirect()->back()->with('success', 'Todo deleted successfully.');
}


   
}