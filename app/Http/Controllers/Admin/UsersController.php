<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//use Request;

use App\User;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		//dd($request->get('name'));

		$users = User::name($request->get('name'))->orderBy('id','DESC')->paginate();
		
		//$users = User::paginate();

		return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUsersRequest $request)
	{
		//////////////////$data = Request::all();

		/*$rules = array{
			'first_name'	=> 'required',
			'last_name' 	=> 'required',, 
			'email'			=> 'required',, 
			'password'		=> 'required',,
			'type'			=> 'required',
		}*/


	
		///////Validator::make($data, $rules);

	///////////	if($v->fails())
		////////////7{
			//dd($v->errors());
			///////////7return redirect()->back()
				///////////77->withErrors($v->errors())
				//////////////->withInput(Request::except('password');
				//->withInput(Request::all(); Para regresar todos los datos
		///}

		//dd(Request::all());

		/*Primer forma
		$user = new User(Request::all());
		$user->save();
		*/

		/*Segunda forma
		$user = new User();
		$user->fill(Request::all());
		$user->save()
		*/



		$user = User::create(Request::all());
		

		return redirect()->route('admin.users.index');

		//\Redirect::route('admin.users.index');
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
		$user = User::findOrFail($id);

		return view('admin.users.edit', compact('user'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		//$user->fill(Request::all());
		$user->fill($request->all());

		$user->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		

		$user = User::findOrFail($id);

		$user->delete();
		//dd("Eliminar ". $id);

		//User::destroy($id);

		$message = $user->full_name .' El registro fue eliminado';


		//Session::flash('message', $user->full_name .' El registro fue eliminado');

		Session::flash('message',  $message);

		return redirect()->route('admin.users.index');
	}

}
