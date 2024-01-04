<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = DB::table('users')
            ->get();
        // add data fatch
        // $users = DB::table('users')
        //     ->orderBy('name')->get();
//         // fatch only first record
//         $users = DB::table('users')->first();
//         $users = DB::table('users')->latest();
//         $users = DB::table('users')->oldest();
//         $users = DB::table('users')->inRandomOrder();
//         $users = DB::table('users')
//             ->orderBy('name')->get();
//         $users = DB::table('users')
//             ->limit('3')->get();
//         $users = DB::table('users')
//             ->limit('3') //take rename
//             ->offset(4) //skip rename
//             ->get();
//         $users = DB::table('users')
//             ->count();
//         // particular column data fatch
//         $users = DB::table('users')
//             ->select('name', 'email as useremail')
//             ->get();

//         $users = DB::table('users')
//             ->select('name')
//             ->distinct()
//             ->get();

// // where use
//         $users = DB::table('users')
//             ->where('name', 'sourabh')
//             ->where('email', 'kumawatousourabh65@gmail.com')
//             ->get();
// //    use array where condtion
//         $users = DB::table('users')
//             ->where([
//                 ['name', '=', 'sourabh'],
//                 ['email', '=', 'sourabhkumawatousourabh65@gmail.com'],
//             ])
//             ->get();
//         // Orwhere
//         $users = DB::table('users')
//             ->where('name', '=', 'sourabh')
//             ->orWhere('name', '=', 'shiva')
//             ->get();
//         //   whereBetween
//         $users = DB::table('users')
//             ->whereBetween('id', [3, 6])
//             ->get();
//         // whereNotBetween
//         $users = DB::table('users')
//             ->whereNotBetween('id', [3, 6])
//             ->get();
//         // whereIn
//         $users = DB::table('users')
//             ->whereIn('id', [3, 6])
//             ->get();
//         // whereNotIn
//         $users = DB::table('users')
//             ->whereNotIn('id', [3, 6])
//             ->get();
//         // null value seach
//         $users = DB::table('users')
//             ->whereNull('email')
//             ->get();
//         // * not null value data fatch
//         $users = DB::table('users')
//             ->whereNotNull('email')
//             ->get();
//         // * check date
//         $users = DB::table('users')
//             ->whereDate('created_at', '2024-01-4')
//             ->get();
//         // * check month
//         $users = DB::table('users')
//             ->whereMonth('created_at', '6')
//             ->get();
//         // * check day
//         $users = DB::table('users')
//             ->whereDay('created_at', '4')
//             ->get();
//         // * check Year
//         $users = DB::table('users')
//             ->whereYear('created_at', '2024')
//             ->get();
//         // * check Time
//         $users = DB::table('users')
//             ->whereTime('created_at', '08:01:34')
//             ->get();

// // like
//         $users = DB::table('users')
//             ->where('name', 'like', 's%')
//             ->get();
//         // plunk
//         $users = DB::table('users')->pluck('name'); // return array
//         $users = DB::table('users')->pluck('name', 'email'); // return array key abd value

//         // where condition
//         $users = DB::table('users')->where('id', 10)->get();
//         //  find method
//         $users = DB::table('users')->find(4);

//         return $users;
        return view('allusers', ['data' => $users]);
    }
    public function singleUser(string $id)
    {
        $users = DB::table('users')->where('id', $id)->get();
        return view('user', ['data' => $users]);
    }
    
    
    public function addUser(Request $req)
{
    $user = DB::table('users')->insert([
        'name' => $req->input('name'),
        'email' => $req->input('email'),
        'password' => $req->input('password'),
        'created_at' => now(),
        'updated_at' => now()
    ]);

    if ($user) {
        // echo "data added";
        return redirect()->route('home');
    } else {
        echo "data not added";
    }
        
        //mutiple data insert
        // $user=DB::table('users')
        // ->insert([
        //     [
        //         'name'=>'shiva',
        //         'email'=>'shiva38833338@gmail.com',
        //         'password'=>'234',
        //         'created_at'=>now(),
        //         'updated_at'=>now()
        //     ],
        //     [
        //         'name'=>'shivani',
        //         'email'=>'shivani2323@gmail.com',
        //         'password'=>'234',
        //         'created_at'=>now(),
        //         'updated_at'=>now()
        //     ]
        // ]);
        //insertOrIgnore
//         $user=DB::table('users')
//         ->insertOrIgnore([
//             'name'=>'sourabh',
//             'email'=>'sourabhkumawat38838@gmail.com',
//             'password'=>'234',
//             'created_at'=>now(),
//             'updated_at'=>now()
//         ]);
// if($user)
// {
//     echo "data add";
// }else {
//     echo "data not add";
// }
//check unique column konsa he or uski column ki value update kr dega nhi t'
//new record update kr dega
// $user=DB::table('users')
// ->upsert([
//     'name'=>'sourabh',
//     'email'=>'abc@gmail.com',
//     'password'=>'234',
//     'created_at'=>now(),
//     'updated_at'=>now()
// ],
// ['email'],
// //third parameter dege to vh yh parameter ki value ko hi update kreg
// // ['name']
// );
// if($user)
// {
// echo "data add";
// }else {
// echo "data not add";
// }
//insertGetId return id
        // $user = DB::table('users')
        //     ->insertGetId([
        //         'name' => 'Amitabh Bachan',
        //         'email' => 'abcd@gmail.com',
        //         'password' => '234',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]
        //     );
        // return ($user);
// if($user)
// {
// echo "data add";
// }else {
// echo "data not add";
// }
    }
    public function updateUser(Request $req, $id)
    {
        $user=DB::table('users')->where('id',$id)
        ->update([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'password' => $req->input('password'),
            'created_at' => now(),
            'updated_at' => now()
            ]);
        //update and inset
        // $user=DB::table('users')->where('id',1)
        // ->updateOrInsert([
        //     'name'=>'sourabh kumawat'
        // ], [
        //     'password'=>'2222'
        // ]);
        //increment one increment hota he
        // $user=DB::table('users')
        // ->where('id',3)
        // ->increment();

        //decrement one decrement hota he
        // $user=DB::table('users')
        // ->where('id',3)
        // ->decrement();
        //incrementEach one incrementEach hota he
        // $user=DB::table('users')
        // ->where('id',3)
        // ->incrementEach(['age'=>2, 'votes'=>1]);

        if ($user) {
            echo "data add";
        } else {
            echo "data not add";
        }
    }

    public function updatePage(string $id){
        // $user=DB::table('users')->where('id', $id)->get();
        $user=DB::table('users')->find($id);
  
        // return $user;
        return view('updateuser', ['data' =>$user]);
    }
    public function deletUser(string $id)
    {
        $user = DB::table('users')->where('id', $id)->delete();
        if ($user) {
            return redirect()->route('home');
        }
    }
    public function deleteAllUser(){
        // $user=DB::table('users')->delete();
        $user=DB::table('users')->truncate();

    }
}
