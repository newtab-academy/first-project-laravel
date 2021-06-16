<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;
use Mail;

class TaskController extends Controller {

    public function index() {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create() {
        $employees = Employee::all();
        return view('tasks.create', compact('employees'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'employee_id' => 'required',
        ]);

        $task = new Task([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'employee_id' => $request->get('employee_id')
        ]);

        $task->save();

        $this->sendMail($task);

        return redirect('/tasks')->with('success', 'Tarefa Criada!');
    }

    public function edit($id) {
        $task = Task::find($id);
        $employees = Employee::all();
        return view('tasks.edit', compact('task', 'employees'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'employee_id' => 'required',
        ]);

        $task = Task::find($id);
        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->employee_id = $request->get('employee_id');
        $task->save();

        return redirect('/tasks')->with('success', 'Tarefa Atualizada!');
    }

    public function destroy($id) {
        $task = Task::find($id);
        $task->delete();
        return redirect('/tasks')->with('success', 'Tarefa Excluída!');
    }

    public function sendMail($task) {
        $data = array(
            'title' => $task->title,
            'description' => $task->description,
            'email' => $task->employee->email
        );

        Mail::send(['text' => 'mail.new_task'], $data, function($message) {
            $message->to('destinatario@teste.com', 'Destinatário')->subject
                ('Nova Task Adicionada');
            $message->from('remetente@teste.com','Remetente');
        });
    }
}
