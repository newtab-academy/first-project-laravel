<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Notifications\Slack;

class EmployeeController extends Controller {

    public function index() {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create() {
        return view('employees.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $employee = new Employee([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => null
        ]);

        $employee->save();

        $message = "O funcionário $employee->email foi criado!";

        \Notification::route('slack', env('LOG_SLACK_WEBHOOK_URL'))
            ->notify(new Slack($message));

        return redirect('/employees')->with('success', 'Funcionário(a) Criado(a)!');
    }

    public function edit($id) {
        $employee = Employee::find($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);

        $employee = Employee::find($id);
        $employee->name = $request->get('name');
        $employee->email = $request->get('email');
        $employee->save();

        $message = "O funcionário $employee->email foi atualizado!";

        \Notification::route('slack', env('LOG_SLACK_WEBHOOK_URL'))
            ->notify(new Slack($message));

        return redirect('/employees')->with('success', 'Funcionário(a) Atualizado(a)!');
    }

    public function destroy($id) {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/employees')->with('success', 'Funcionário(a) Excluído(a)!');
    }
}
