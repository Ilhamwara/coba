<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Paket;
use App\JoinMember;
use Hash;
use App\Transaction;
use Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function post_login(Request $r)
    {

        $this->validate($r, [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if (Auth::attempt(['email' => $r->email, 'password' => $r->password , 'level' => 'member'])) {
            return redirect()->intended('memberarea');
        }

        if (Auth::attempt(['email' => $r->email, 'password' => $r->password ,'level' => 'admin'])) {
            return redirect()->intended('memberarea');
        }

        return redirect()->back()->with('error','Worng input password or your email please try again');
        
    }
    public function register()
    {
        $paket = Paket::all();
        return view('register',compact('paket'));
    }
    public function post_register(Request $r)
    {
        //CEK KODE SPONSOR
        $cek_kode = User::where('id',$r->kode)->first();
        if (empty($cek_kode)) {
            return redirect()->back()->with('error','Sponsor code unregistered');
        }

        //SAVE NEW USER
        $user = new User;
        $user->email    = $r->email;
        $user->password = Hash::make($r->password);
        $user->name     = $r->nama;
        $user->paket    = $r->paket;
        $user->level    = 'member';
        $user->save();

        $usernya = User::orderBy('id','DESC')->first();
        


        //CEK POSISI PENUH 
        if (!empty($r->posisi)) {

            if ($r->posisi == 'kiri') {
                $kiri = 1;
            }else{
                $kiri = 0;
            }

            if($r->posisi == 'kanan'){
                $kanan = 1;
            }else{
                $kanan = 0;
            }

            $cekkanan = JoinMember::where('parent_id',$r->kode)->where('kiri','=','0')->where('kanan','=','1')->orderBy('id','DESC')->first();
            $cekkiri  = JoinMember::where('parent_id',$r->kode)->where('kiri','=','1')->where('kanan','=','0')->orderBy('id','DESC')->first();
            // dd($cekkanan);

            if (!empty($cekkanan) && $r->posisi == 'kanan') {
                $join            = new JoinMember;
                $join->kepala    = $r->kode;
                $join->parent_id = $cekkanan->member_id;
                $join->member_id = $usernya->id;
                $join->paket     = $r->paket;
                $join->kiri      = $kiri;
                $join->kanan     = $kanan;
                $join->save();
            }elseif(!empty($cekkiri) && $r->posisi == 'kiri'){
                $join            = new JoinMember;
                $join->kepala    = $r->kode;
                $join->parent_id = $cekkiri->member_id;
                $join->member_id = $usernya->id;
                $join->paket     = $r->paket;
                $join->kiri      = $kiri;
                $join->kanan     = $kanan;
                $join->save();
            }else{
                $join            = new JoinMember;
                $join->kepala    = $r->kode;
                $join->parent_id = $r->kode;
                $join->member_id = $usernya->id;
                $join->paket     = $r->paket;
                $join->kiri      = $kiri;
                $join->kanan     = $kanan;
                // $join->save();
            }
        }
        

        return redirect('/')->with('success','Register has been success');
    }

    public function memberarea()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('user.memberarea',compact('user'));
    }
    public function profile()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('user.profile',compact('user'));
    }
    public function editprofile(Request $r)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->name      = $r->name;
        $user->email     = $r->email;
        $user->address   = $r->address;
        $user->phone     = $r->phone;
        $user->utility   = $r->utility;
        $user->wallet    = $r->wallet;
        $user->passport  = $r->passport;

        if (!empty($r->pass)) {
            $user->password = $r->pass;
        }

        $user->save();

        return redirect()->back()->with('success','Success update your profile');
    }
    public function wallet()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('user.wallet',compact('user'));
    }
    public function edit()
    {
         $user = User::findOrFail(Auth::user()->id);
        return view('user.edit',compact('user'));
    }
    public function withdraw()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('user.withdraw',compact('user'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success','Your account has been logout');
    }
    public function downline()
    {
        $user = User::findOrFail(Auth::user()->id);
        $join = JoinMember::where('parent_id',Auth::user()->id)->get();

        return view('user.downline',compact('user','join'));
    }
    public function history()
    {
        $user = User::findOrFail(Auth::user()->id);
        $trans = Transaction::where('user_id',Auth::user()->id)->get();
        return view('user.history',compact('user','trans'));
    }
    public function setting()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('user.setting',compact('user'));
    }
    public function member()
    {
        $user   = User::findOrFail(Auth::user()->id);
        $member = User::join('paket','users.paket','=','paket.id')
                        ->where('level','!=','admin')
                        ->select('users.*','paket.nama')
                        ->get();
        return view('user.member',compact('user','member'));
    }
}
