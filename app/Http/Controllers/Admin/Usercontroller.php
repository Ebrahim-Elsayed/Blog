<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

use UxWeb\SweetAlert\SweetAlert;
use App\Http\Controllers\Controller;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\trait\PDFGenerator;
use App\Http\Controllers\Admin\trait\Exports\UserExport;


class Usercontroller extends Controller
{
    use PDFGenerator;
    use UserExport;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::all();
        // return $users;
        return view('admin.user.all' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles= Role::all();

        return view('admin.user.create' , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SweetAlert::message();

        $data = $request -> all();
        $rules = [
            'name' => 'required|min:4|string',
            'email' => ["required", "unique:App\Models\User,email", "string"],
            'password' => ["required","min:8"],
            'role' => ["required"],
        ];

        $validator = Validator::make( $data, $rules);
        if(!$validator -> fails()){

            User::create([
                'name' => $request -> name,
                'email' => $request -> email,
                'password' => Hash::make($request -> password),
                'role_id' => $request -> role,
            ]);
            alert()->success('Success Message', 'User created Successfully')->autoclose(6000);
            return Redirect::back();

        }if($validator -> fails()){


            alert()->error('error Message', 'insert input correctly' );
            return Redirect::back()->withErrors($validator)->withInput($data);
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.user.show' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.user.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        SweetAlert::message();
        //
        $data = $request->all();
        $rules = [
            'name' => ['required' ,'min:4' , 'max:25'] ,

            'email' => ['required' , 'unique:users'] ,

            'password' => ['required' , 'unique:users' , 'password' , 'confirmed'] ,
        ];



        $validator =Validator::make($data , $rules) ;
        if(!$validator->fails() ){

            $user = User::findOrFail($id);
            if ($request->password == $user -> password) {
                $user->update([
                    "name" => $request->name ,
                    "email" =>$request->email,
                    "password" =>$request->password
                ]);
                alert()->success('Success Message', 'User updated Successfully')->autoclose(6000);
                return Redirect::back();

            }
            $user->update([
                "name" => $request->name ,
                "email" =>$request->email,
                "password" =>$request->password
            ]);
            alert()->success('Success Message', 'User updated Successfully')->autoclose(6000);
            return Redirect::back();

        }if($validator->fails()){
            alert()->error('error Message', 'insert input correctly' );
            return Redirect::back()->withErrors($validator)->withInput($data);
        }

        // echo $request->password;
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
        $user = User::findOrFail($id);
        $user->delete();


        return Redirect::back();
        return redirect()->back();



        // <script>
        //     swal("are you sure","you are about to delete this user","warning",{buttons:["no","yes "]});
        // </script>

        // $user->delete();
        // swal({
        //     title: "Are you sure?",
        //     text: "Once deleted, you will not be able to recover this imaginary file!",
        //     icon: "warning",
        //     buttons: true,
        //     dangerMode: true,
        //   })
        //   .then((willDelete) => {
        //     if (willDelete) {
        //       swal("Poof! Your imaginary file has been deleted!", {
        //         icon: "success",
        //       });
        //     } else {
        //       swal("Your imaginary file is safe!");
        //     }
        //   });



    }
}
