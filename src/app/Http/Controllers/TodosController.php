<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => ['required', 'max:255', 'min:1'],
        ]);

        $formFields['user_id'] = auth()->id();

        Todo::create($formFields);

        return redirect('/')->with('message', 'Todo created successfully!');
    }

    public function destroy(Todo $todo) {
        if($todo->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $todo->delete();

        return redirect('/')->with('message', 'Todo deleted successfully');
    }
}
