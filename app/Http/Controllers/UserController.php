<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Paket;
use App\JoinMember;
use Hash;
use App\Transaction;
use App\Daily;
use App\Referal;
use App\Wallet;
use Auth;
use Hashids;

class UserController extends Controller
{
    public function login()
    {
        if(!empty(Auth::user()->id)) {
            return redirect('memberarea');
        }
        return view('login');
    }
    public function post_login(Request $r)
    {

        $this->validate($r, [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if (Auth::attempt(['email' => $r->email, 'password' => $r->password , 'level' => 'member' ,'aktif' => '1'])) {
            return redirect()->intended('memberarea');
        }

        if (Auth::attempt(['email' => $r->email, 'password' => $r->password ,'level' => 'admin' ,'aktif' => '1'])) {
            return redirect()->intended('memberarea');
        }

        return redirect()->back()->with('error','Please try again');
        
    }
    public function register()
    {
        if(!empty(Auth::user()->id)) {
            return redirect('memberarea');
        }

        $paket = Paket::all();
        return view('register',compact('paket'));
    }
    public function post_register(Request $r)
    {
        //CEK EMAIL USER EXISTS
        $cek_usr = User::all();
        foreach ($cek_usr as $value) {
            if ($value->email == $r->email) {
                return redirect()->back()->with('warning','Sorry email has been used with another member');
            }
        }
        
        //CEK KODE SPONSOR
        $en_id  = Hashids::connection('user_id')->decode($r->kode);

        if (!empty($en_id)) {
            $kode = $en_id[0];
        }else{
            $kode = $r->kode;
        }

        $cek_kode = User::where('id',$kode)->first();
        if (empty($cek_kode)) {
            return redirect()->back()->with('error','Sponsor code unregistered');
        }

//RUMUS BONUS
            $paketnya = Paket::findOrFail($r->paket);

            //BONUS REFERAL
            $referal              = new Referal;
            $referal->member_id   = $kode;
            $referal->paket_id    = $cek_kode->paket;
            $referal->price       = ($paketnya->price*($paketnya->referal/100));
            $referal->save();

            //Wallet
            $wallet              = new Wallet;
            $wallet->member_id   = $kode;
            $wallet->type        = 'referal';
            $wallet->money       = ($paketnya->price*($paketnya->referal/100));
            $wallet->save();
//TUTUP RUMUS BONUS


        //SAVE NEW USER
        $user = new User;
        $user->email    = $r->email;
        $user->password = Hash::make($r->password);
        $user->name     = $r->nama;
        $user->paket    = $r->paket;
        $user->sejak    = date('d-m-y');
        $user->hingga   = date('d-m-y');
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


            $cekkanan = JoinMember::where('parent_id',$kode)->where('kiri','=','0')->where('kanan','=','1')->orderBy('id','DESC')->first();
            $cekkiri  = JoinMember::where('parent_id',$kode)->where('kiri','=','1')->where('kanan','=','0')->orderBy('id','DESC')->first();
            

            if (!empty($cekkanan) && $r->posisi == 'kanan') {

                $join            = new JoinMember;
                $join->kepala    = $kode;
                $join->parent_id = $cekkanan->member_id;
                $join->member_id = $usernya->id;
                $join->paket     = $r->paket;
                $join->kiri      = 0;
                $join->kanan     = 1;
                $join->save();

            }elseif(!empty($cekkiri) && $r->posisi == 'kiri'){
                $join            = new JoinMember;
                $join->kepala    = $kode;
                $join->parent_id = $cekkiri->member_id;
                $join->member_id = $usernya->id;
                $join->paket     = $r->paket;
                $join->kiri      = 1;
                $join->kanan     = 0;
                $join->save();
            }else{
                $join            = new JoinMember;
                $join->kepala    = $kode;
                $join->parent_id = $kode;
                $join->member_id = $usernya->id;
                $join->paket     = $r->paket;
                $join->kiri      = $kiri;
                $join->kanan     = $kanan;
                $join->save();
            }
        }

        return redirect('/')->with('success','Register has been success');
    }

    public function memberarea()
    {
        $user   = User::join('paket','users.paket','=','paket.id')
                        ->where('users.id',Auth::user()->id)
                        ->select('users.*','paket.nama')
                        ->first();

        //BONUS DAILY
        if (date('d-m-Y H:i:s') == date('d-m-Y 23:59:59')) {
            $paket = Paket::findOrFail(Auth::user()->paket);
            $daily              = new Daily;        
            $daily->member_id   = Auth::user()->id;        
            $daily->paket_id    = Auth::user()->paket;
            $daily->price       = ($paket->price*($paket->daily/100));
            $daily->save();

            $wallet              = new Wallet;
            $wallet->member_id   = $kode;
            $wallet->type        = 'daily';
            $wallet->money       = ($paket->price*($paket->daily/100));
            $wallet->save();
        }

        $join_today = User::where('sejak',date('Y-m-d'))->count();
        return view('user.memberarea',compact('user','join_today'));
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
        $join = JoinMember::join('users','join_member.member_id','=','users.id')
                            ->where('kepala',Auth::user()->id)
                            ->get();
                            // dd($join);

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
        $paket = Paket::all();
        // return view('user.setting',compact('user'));
            return view('user.setting-paket',compact('user','paket'));
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
    public function agentlogin($id)
    {
        if(!empty(Auth::user()->id)) {
            return redirect('memberarea');
        }

        $en_id  = Hashids::connection('user_id')->decode($id);
        $user   = User::findOrFail($en_id[0]);
        $paket  = Paket::all();
        return view('register',compact('user','paket'));
    }
    public function confirm($id)
    {
        $en_id  = Hashids::connection('user_id')->decode($id);
        $user   = User::findOrFail($en_id[0]);
        $user->aktif = 1;
        $user->save();

        return redirect()->back()->with('success','Successfully activate user');
    }
    public function edit_paket($id)
    {
        $user   = User::findOrFail(Auth::user()->id);
        $paket = Paket::findOrFail($id);
        return view('user.paket-edit',compact('user','paket'));
    }
    public function post_paket(Request $r,$id)
    {
        $paket = Paket::findOrFail($id);
        $paket->nama            = $r->nama;
        $paket->price           = $r->price;
        $paket->daily           = $r->daily;
        $paket->monthly         = $r->monthly;
        $paket->contract        = $r->contract;
        $paket->total_benefit   = $r->total_benefit;
        $paket->referal         = $r->referal;
        $paket->pairing         = $r->pairing;
        $paket->max_pairing     = $r->max_pairing;
        $paket->save();

        return redirect()->back()->with('success','Successfully edit package');

    }
}
