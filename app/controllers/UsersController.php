<?php

class UsersController extends BaseController {

	public function __construct() {
		//parent::__construct();

		$this->beforeFilter('auth', array('except' => array('getLogin', 'postLogin')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return View::make('users.index') -> with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
/*		$user = new User;

		$user->real_name = Input::get('real_name');
		$user->email = Input::get('email');
		$user->password = Input::get('password');

		$user->save();

		return Redirect::to('users');*/

		$rules = array(
			'real_name' => 'required|max:50',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:5'
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// create a user
		$user = new User;

		$user->real_name = Input::get('real_name');
		$user->email = Input::get('email');
		$user->password = Input::get('password');

		$user->save();

		return Redirect::toAction('users@index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		if(is_null($user)) {
			return Redirect::to('users');
		}

		return View::make('users.edit')->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);

		if(is_null($user)) {
			return Redirect::to('users');
		}

		$user->real_name = Input::get('real_name');
		$user->email = Input::get('email');

		if(Input::has('password')) {
			$user->password = Input::get('password');
		}

		$user->save();

		return Redirect::to('users');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);

		if(is_null($user)) {
			return Redirect::to('users');
		}

		$user->delete();

		return Redirect::to('users');
	}


}
