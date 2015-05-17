<?php namespace App\Http\Controllers;

use App\Commands\RegisterUserCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Input;
use Larabook\Forms\RegistrationFormRequest;

/**
 * @property  registrationFormRequest
 */
class RegistrationController extends Controller {

    public function create()
    {
        return view('registration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RegistrationFormRequest $request)
    {


        extract(Input::only('username', 'email', 'password'));

        $user =  Bus::dispatch(new RegisterUserCommand($username, $email, $password));


        Auth::login($user);


        return redirect()->route('home');
    }




}
