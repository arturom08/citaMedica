<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PatientController extends Controller
{
    
    public function index()
    {   
        $patients = User::patients()->get();
        return view('patients.index', compact('patients'));
    }

    
    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {        
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:8',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre del paciente es obligatorio',
            'name.min' => 'El nombre del paciente debe tener más de 3 caracteres',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'cedula.required' => 'La cédula es obligatorio',
            'cedula.digits' => 'La cédula debe tener 10 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name','email','cedula','address','phone')
            + [
                'role' => 'paciente',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'El paciente se ha registrado correctamente.';
        return redirect('/pacientes')->with(compact('notification'));
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $patient = User::Patients()->findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, string $id)
    {         
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:8',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre del paciente es obligatorio',
            'name.min' => 'El nombre del paciente debe tener más de 3 caracteres',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'cedula.required' => 'La cédula es obligatorio',
            'cedula.digits' => 'La cédula debe tener 8 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);
        $user = User::Patients()->findOrFail($id);

        $data = $request->only('name','email','cedula','address','phone');
        $password = $request->input('password');

        if($password)
            $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();
        
        $notification = 'La información del paciente se actualizo correctamente.';
        return redirect('/pacientes')->with(compact('notification'));

    }

    public function destroy(string $id)
    {
        $user = User::Patients()->findOrFail($id);
        $PacienteName = $user->name;
        $user->delete();

        $notification = "El médico $PacienteName se elimino correctamente";
        return redirect('/pacientes')->with(compact('notification'));
    }
}
