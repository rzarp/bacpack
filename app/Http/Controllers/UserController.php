<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Quest;
use App\Galeri;
use DB;
use Auth;
use File;
use DataTables;
use Js;

class UserController extends Controller
{
    public function index()
    {
        $data['user'] = User::all();
        return view('admin.user.user',$data);
    }

    public function create()
    {
        $data['is_admin'] = [1];
        return view('admin.user.input-user',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'is_admin' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect(route('input-user'))->with('pesan','Data Berhasil Ditambahkan');
    }


    public function show(Request $request)
    {

       
        if ($request->ajax()) {
            $data = User::where('id', '!=', Auth::id())->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($user) {
                        return [
                        'display' => e($user->created_at->format('d/m/Y H:i:s')),
                        'timestamp' => $user->created_at->timestamp
                        ];
                    })
                    ->editColumn('updated_at', function ($user) {
                        return [
                        'display' => ($user->updated_at->format('d/m/Y H:i:s')),
                        'timestamp' => $user->updated_at->timestamp
                        ];
                    })
                    ->addColumn('action', function($row)
                    {
   
                        $btn = 

                       '';
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.user.user');
    }

    public function index_qa()
    {
        $data['quest'] = Quest::all();
        return view('admin.data.data-quest',$data);
    }

    public function show_qa(Request $request)
    {
        if ($request->ajax()) {
            $data = Quest::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($user) {
                        return [
                        'display' => e($user->created_at->format('d/m/Y H:i:s')),
                        'timestamp' => $user->created_at->timestamp
                        ];
                    })
                    ->editColumn('updated_at', function ($user) {
                        return [
                        'display' => ($user->updated_at->format('d/m/Y H:i:s')),
                        'timestamp' => $user->updated_at->timestamp
                        ];
                    })
                    ->addColumn('action', function($row)
                    {
   
                        $btn = 

                        '<a href="'.route('v1.qa.qa.destroy_qa',['id' => $row->id]).'" class="btn btn-danger btn-action trigger--fire-modal-2 delete-confirm" data-toggle="tooltip" title=""data-original-title="Delete"><i class="fas fa-trash"></i></a>';
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.data.data-quest');
    }

    public function destroy_qa($id)
    {
        $quest = DB::table('quests')->where('id',$id)->first();
        if($quest->gambar != 'img/quest/noimage.png') {
            File::delete($quest->gambar);
        }
        DB::table('quests')->where('id',$id)->delete();

        return redirect(route('v1.qa.qa.index_quest'))->with('pesan','Data Berhasil dihapus!');
    }

    public function index_ga()
    {
        $data['galeri'] = Galeri::all();
        return view('admin.data.data-galeri',$data);
    }

    public function show_ga(Request $request)
    {
        if ($request->ajax()) {
            $data = Galeri::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($user) {
                        return [
                        'display' => e($user->created_at->format('d/m/Y H:i:s')),
                        'timestamp' => $user->created_at->timestamp
                        ];
                    })
                    ->editColumn('updated_at', function ($user) {
                        return [
                        'display' => ($user->updated_at->format('d/m/Y H:i:s')),
                        'timestamp' => $user->updated_at->timestamp
                        ];
                    })
                    ->addColumn('action', function($row)
                    {
   
                        $btn = 

                        '<a href="'.route('v1.ga.ga.destroy_ga',['id' => $row->id]).'" class="btn btn-danger btn-action trigger--fire-modal-2 delete-confirm" data-toggle="tooltip" title=""data-original-title="Delete"><i class="fas fa-trash"></i></a>';
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.data.data-galeri');
    }

    public function destroy_ga($id)
    {
        $galeri = DB::table('galeris')->where('id',$id)->first();
        if($galeri->gambar != 'img/galeris/noimage.png') {
            File::delete($galeri->gambar);
        }
        DB::table('galeris')->where('id',$id)->delete();

        return redirect(route('v1.ga.ga.index_ga'))->with('pesan','Data Berhasil dihapus!');
    }
}
