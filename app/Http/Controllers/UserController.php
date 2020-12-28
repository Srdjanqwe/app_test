<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth')
                ->only(['create','store','edit','update','destroy']);
        }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            return view('users.index',['users' =>User::all()]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('users.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(StorePost $request)
        {
            $validatedData = $request->validated();
            $userPost = User::create($validatedData);
            // User::create($validatedData);

            $request->session()->flash('status', 'was created');

            return redirect()->route('users.show', ['user',$userPost->id]);
        }


        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            return view('users.show', ['user' =>User::findOrFail($id)]);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $user = User::find($id);

            // if (Gate::denies('update-user', $user)) {
            //     abort(403, "You can't edit post");
            // };

            return view('users.edit', ['user'=>$user]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(StorePost $request, $id)
        {
            $user = User::findOrFail($id);

            // if (Gate::denies('update-user', $user)) {
            //     abort(403, "You can't edit post");
            // };

            $validated = $request->validated();
            $user->fill($validated);
            $user->save();
            $request->session()->flash('status', 'was updated');

            return redirect()->route('users.show',['user' =>$user->id]);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
}
