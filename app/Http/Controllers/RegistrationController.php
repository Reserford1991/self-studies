<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create() {
        return view('registration.create');
    }

    public function store(RegistrationForm $form){

        $form->persist();

        session()->flash('message', 'You signed up successfully');

        // Redirect users to home page

        return redirect()->home();
    }
}
