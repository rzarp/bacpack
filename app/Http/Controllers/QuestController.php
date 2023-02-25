<?php

namespace App\Http\Controllers;

use App\Quest;
use App\CommentQuest;
use App\CommentBlog;
use App\CommentGaleri;
use App\CommentTour;
use App\User;
use App\Blog;
use App\Galeri;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use Auth;
use File;

class QuestController extends Controller
{
   
    
    public function index()
    {
        $data['quest'] = DB::table('quests')->latest()->get();
        return view('dashboard.quest',$data);
    }

    public function inputquest()
    {
        return view('dashboard.input-quest');
    }
   

   
    
    public function storequest(Request $request)
    {
        $request->validate ([
            'title'     => 'required',
            'gambar'    => 'max:1000|file|image',
            'deskripsi' => ' ',
        ]);
        

        $path = null;
        if($request->hasFile('gambar')) {
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'gambar-'.time().".".$extFile;
            $path = $request->gambar->move('img/quest', $namaFile);
           
        }

        DB::table('quests')
        ->insert([
            'title'             => $request->title,
            'gambar'            => $path,
            'deskripsi'         => $request->deskripsi,
            'slug'              => Str::slug($request->title),
            'user_id'           => auth()->id(),
        ]);
        
        return redirect(route('input.quest'))->with('pesan','Data Berhasil ditambahkan');
    }

    public function detail_quest($slug) {
        // $data['quest'] = DB::select('select * from quests where slug = ?', [$slug]);
        $quest = Quest::where('slug',$slug)->get();
        $quest = Quest::with(['comments', 'comments.child'])->where('slug', $slug)->first();
        return view('dashboard.detail-quest',compact('quest'));
    }

    public function comment_quest(Request $request) {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        CommentQuest::create([
            'quest_id' => $request->id,
            //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
            'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
            'comment' => $request->comment
        ]);

        return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);
    }

    public function data() {
        $data['quest']  = DB::table('quests')->where('user_id', Auth::id())->get();
        $data['blog']  = DB::table('blogs')->where('user_id', Auth::id())->get();
        $data['galeri']  = DB::table('galeris')->where('user_id', Auth::id())->get();
        $data['tour']  = DB::table('tours')->where('user_id', Auth::id())->get();
        return view('dashboard.lihat-data',$data);
    }



    // quest data

    public function edit_quest($id) {
        $quest = Quest::find($id);
        // dd($quest);
        return view('dashboard.edit-quest',['quest'=>$quest]);
    }

    public function update_quest(Request $request, $id) 
    {

        // dd($request);
        $quest = Quest::find($id);
        $request->validate ([
            'title'             => 'required',
            'deskripsi'         => 'required',
         ]);

        $quest = Quest::find($id);
        if (isset($request->gambar)) {
            $request->validate ([
            'gambar'  => 'nullable',
        ]);

        if($request->hasFile('gambar')) {
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'gambar-'.time().".".$extFile;
            $gambar = $request->gambar->move('img/quest', $namaFile);
        }
    }

    
        DB::table('quests')
        ->where('id', $id)
        ->update([
            'title'       => $request->title,
            'deskripsi'   => $request->deskripsi,
            'slug'        => Str::slug($request->title),
            'gambar'      => (isset($gambar) ? $gambar : $quest->gambar),
            
        ]);

        return redirect(route('data.detail',$id))->with('pesan','Data Berhasil diupdate');
    }
    

    public function destroy_data($id)
    {
        $quest = DB::table('quests')->where('id',$id)->first();
        if($quest->gambar != 'img/quest/noimage.png') {
            File::delete($quest->gambar);
        }

        DB::table('quests')->where('id',$id)->delete();

        return redirect(route('data.detail'))->with('pesan','Data Berhasil dihapus!');
    }

    // blog data

     public function edit_blog($id) {
        $blog = Blog::find($id);
        // dd($quest);
        return view('dashboard.edit-blog',['blog'=>$blog]);
    }

    public function update_blog(Request $request, $id) 
    {

        $blog = Blog::find($id);
        $request->validate ([
            'title'             => 'required',
            'deskripsi'         => 'required',
         ]);

        $blog = Blog::find($id);
        if (isset($request->gambar)) {
            $request->validate ([
            'gambar'  => 'nullable',
        ]);

        if($request->hasFile('gambar')) {
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'gambar-'.time().".".$extFile;
            $gambar = $request->gambar->move('img/blog', $namaFile);
        }
    }

    
        DB::table('blogs')
        ->where('id', $id)
        ->update([
            'title'       => $request->title,
            'deskripsi'   => $request->deskripsi,
            'slug'        => Str::slug($request->title),
            'gambar'      => (isset($gambar) ? $gambar : $quest->gambar),
            
        ]);

        return redirect(route('data.detail',$id))->with('pesan','Data Berhasil diupdate');
    }
    

    public function destroy_blog($id)
    {
        $blog = DB::table('blogs')->where('id',$id)->first();
        if($blog->gambar != 'img/blog/noimage.png') {
            File::delete($blog->gambar);
        }

        DB::table('blogs')->where('id',$id)->delete();

        return redirect(route('data.detail'))->with('pesan','Data Berhasil dihapus!');
    }

    // galeri data


     public function edit_galeri($id) {
        $galeri = Galeri::find($id);
        // dd($quest);
        return view('dashboard.edit-galeri',['galeri'=>$galeri]);
    }

    public function update_galeri(Request $request, $id) 
    {
        if($request->hasFile('gambar')) {
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'gambar-'.time().".".$extFile;
            $path = $request->gambar->move('img/galeri', $namaFile);
            DB::table('galeris')
            ->where('id', $id)
            ->update([
                'title'             => $request->title,
                'gambar'            => $path,
                'deskripsi'         => $request->deskripsi,
                'slug'              => Str::slug($request->title),
                
            ]);

        return redirect(route('data.detail'))->with('pesan','Data Berhasil diupdate');
        }
    }
    

    public function destroy_galeri($id)
    {
        $galeri = DB::table('galeris')->where('id',$id)->first();
        if($galeri->gambar != 'img/galeri/noimage.png') {
            File::delete($galeri->gambar);
        }

        DB::table('galeris')->where('id',$id)->delete();

        return redirect(route('data.detail'))->with('pesan','Data Berhasil dihapus!');
    }

    // tour data

    public function edit_tour($id) {
        $tour = Tour::find($id);
        // dd($quest);
        return view('dashboard.edit-tour',['tour'=>$tour]);
    }

    public function update_tour(Request $request, $id) 
    {
        if($request->hasFile('gambar')) {
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'gambar-'.time().".".$extFile;
            $path = $request->gambar->move('img/tour', $namaFile);
            DB::table('tours')
            ->where('id', $id)
            ->update([
                'title'             => $request->title,
                'gambar'            => $path,
                'deskripsi'         => $request->deskripsi,
                'slug'              => Str::slug($request->title),
                
            ]);

        return redirect(route('data.detail'))->with('pesan','Data Berhasil diupdate');
        }
    }
    

    public function destroy_tour($id)
    {
        $tour = DB::table('tours')->where('id',$id)->first();
        if($tour->gambar != 'img/tour/noimage.png') {
            File::delete($tour->gambar);
        }

        DB::table('tours')->where('id',$id)->delete();

        return redirect(route('data.detail'))->with('pesan','Data Berhasil dihapus!');
    }


    // setting
    public function setting() {
        $data['user']= DB::table('users')->where('id', Auth::id())->get();
        return view ('dashboard.setting',$data);
    }

    public function edit_setting ($id) {
        $data['user'] = User::find($id);
        // dd ($data);
        return view('dashboard.edit-setting',$data);  
    }

    public function update_setting(Request $request, $id)
    {

        $request->validate ([
            'name'     => 'required',
            'email'    => 'required',
            'password' => ' ',
        ]);

        $data = 
        [
            'name'        => $request->name,
            'email'       => $request->email,
        ];

        if($request->hasFile('gambar')) {
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'gambar-'.time().".".$extFile;
            $path = $request->gambar->move('img/setting', $namaFile);
            $data['gambar'] = $path;
        }

        if($request->password) 
        {
            $data['password'] = Hash::make($request->password);
        }
         
        
        DB::table('users')
            ->where('id', $id)
            ->update($data);
       

        // dd($request);
        return redirect(route('setting.user'))->with('pesan','Data Berhasil Disimpan');
    }

    // blog
    public function blog_index()
    {   
        $data['blog'] = DB::table('blogs')->latest()->get();
        return view('dashboard.blog',$data);
    }
    public function inputblog()
    {
        return view('dashboard.input-blog');
    }

    public function storeblog(Request $request)
    {

        // dd($request);
        $request->validate ([
            'title'     => 'required',
            'gambar'    => 'max:1000|file|image',
            'deskripsi' => '',
        ]);

        $gambar = null;
        
        if($request->hasFile('gambar')) {
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'gambar-'.time().".".$extFile;
            $gambar = $request->gambar->move('img/blog', $namaFile);
            
        }

        DB::table('blogs')
            ->insert([
                'title'             => $request->title,
                'gambar'            => $gambar,
                'deskripsi'         => $request->deskripsi,
                'slug'              => Str::slug($request->title),
                'user_id'           => auth()->id(),
            ]);
        return redirect(route('input.blog'))->with('pesan','Data Berhasil ditambahkan');
    }

    public function detail_blog($slug) 
    {
        $blog = Blog::where('slug',$slug)->get();
                            
        $blog = Blog::with(['commentsblog', 'commentsblog.childblog'])->where('slug', $slug)->first();
        return view('dashboard.detail-blog',compact('blog'));
    }


     public function comment_blog(Request $request) {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        CommentBlog::create([
            'blog_id' => $request->id,
            //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
            'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
            'comment' => $request->comment
        ]);

        return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);
    }


    // Galeri

    public function galeri_index()
    {   
        $data['galeri'] = DB::table('galeris')->latest()->get();
        return view('dashboard.galeri',$data);
    }

    public function inputgaleri()
    {
        return view('dashboard.input-galeri');
    }

    public function storegaleri(Request $request)
    {
        $request->validate ([
            'title'     => 'required',
            'gambar'    => 'max:1000|file|image',
            'deskripsi' => ' ',
        ]);
        
        if($request->hasFile('gambar')) {
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'gambar-'.time().".".$extFile;
            $path = $request->gambar->move('img/galeri', $namaFile);
            DB::table('galeris')
                ->insert([
                    'title'             => $request->title,
                    'gambar'            => $path,
                    'deskripsi'         => $request->deskripsi,
                    'slug'              => Str::slug($request->title),
                    'user_id'           => auth()->id(),
                ]);
                
                return redirect(route('input.galeri'))->with('pesan','Data Berhasil ditambahkan');
        }
    }

     public function detail_galeri($slug) 
    {
        $galeri = Galeri::where('slug',$slug)->get();
                            
        $galeri = Galeri::with(['commentsgaleri', 'commentsgaleri.childgaleri'])->where('slug', $slug)->first();
        return view('dashboard.detail-galeri',compact('galeri'));
    }


    public function comment_galeri(Request $request) {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        CommentGaleri::create([
            'galeri_id' => $request->id,
            //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
            'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
            'comment' => $request->comment
        ]);

        return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);
    }

    // tour
    public function tour_index()
    {   
        $data['tour'] = DB::table('tours')->latest()->get();
        return view('dashboard.tour',$data);
    }

     public function inputtour()
    {
        return view('dashboard.input-tour');
    }

    public function storetour(Request $request)
    {
        $request->validate ([
            'title'     => 'required',
            'gambar'    => 'max:1000|file|image',
            'deskripsi' => ' ',
        ]);
        

        $gambar = null;
        if($request->hasFile('gambar')) {
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'gambar-'.time().".".$extFile;
            $gambar = $request->gambar->move('img/tour', $namaFile);
           
        }

        DB::table('tours')
        ->insert([
            'title'             => $request->title,
            'gambar'            => $gambar,
            'deskripsi'         => $request->deskripsi,
            'slug'              => Str::slug($request->title),
            'user_id'           => auth()->id(),
        ]);
        
        return redirect(route('input.quest'))->with('pesan','Data Berhasil ditambahkan');
    }

     public function detail_tour($slug) 
    {
        $tour = Tour::where('slug',$slug)->get();
                            
        $tour = Tour::with(['commentstour', 'commentstour.childtour'])->where('slug', $slug)->first();
        return view('dashboard.detail-tour',compact('tour'));
    }

    public function comment_tour(Request $request) {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        CommentTour::create([
            'tour_id' => $request->id,
            //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
            'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
            'comment' => $request->comment
        ]);

        return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);
    }

    
}
