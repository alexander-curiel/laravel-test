<?php

use Illuminate\Support\MessageBag;

class AuthController extends BaseController {

	public function getLogin() {
		return View::make('auth.login');
	}

	public function postLogin() {



/*
		$credentials = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
			);

		if(Auth::attempt($credentials)) {
			return "El usuario ha sido identificado correctamente";
		} else {
			return Redirect::back()->with_input();
		}
		*/


		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
			);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
			} else {

			// create our user data for the authentication
				$credentials = array(
					'email' 	=> Input::get('email'),
					'password' 	=> Input::get('password')
					);

			// attempt to do the login
				if (Auth::attempt($credentials)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
					return "Te has identificado como " . Auth::user()->real_name;
					// return Redirect::to('account')->with('alert-success', 'You are now logged in.');

				} else {

				// validation not successful, send back to form
					$errors = new MessageBag(['password' => ['Email y/o password incorrecto.']]);
					return Redirect::to('login')						
					->withErrors($errors)
					->withInput(Input::except('password'));

				}

			}





		}

		public function getLogout() {
			Auth::logout();

			return Redirect::to('');
		}

	}