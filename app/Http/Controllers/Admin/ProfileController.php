<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが扱えるようになる
use App\Profile;
use App\Profilehistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
  public function add()
  {
      return view('admin.profile.create');
  }

  public function create(Request $request)
   {

      // 以下を追記 ここがおそらくcreateメソッド
      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();

      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      // if (isset($form['image'])) {
      //   $path = $request->file('image')ω->store('public/image');
      //   $profile->image_path = basename($path);
      // } else {
      //     $profile->image_path = null;
      // }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      // unset($form['image']);

      // データベースに保存する
      $profile->fill($form);
      $profile->save();
    return redirect('admin/profile/create');
 }


 public function index(Request $request)
 {
     $cond_title = $request->cond_title;
     if ($cond_title != '') {
         // 検索されたら検索結果を取得する
         $posts = Profile::where('title', $cond_title)->get();
     } else {
         // それ以外はすべてのニュースを取得する
         $posts = Profile::all();
     }
     return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
 }


 public function edit(Request $request)
 {
     // Profile Modelからデータを取得する
     $profile = Profile::find($request->id);
     if (empty($profile)) {
         abort(404);
     }
    //  dd($profile);

     return view('admin.profile.edit', ['profile_form' => $profile]);
     dump($profile_form);
 }


 public function update(Request $request)
 {
     // Validationをかける
     $this->validate($request, Profile::$rules);
     // News Modelからデータを取得する
     $profile = Profile::find($request->id);
     // 送信されてきたフォームデータを格納する
     $profile_form = $request->all();
     unset($profile_form['_token']);

     // 該当するデータを上書きして保存する
     $profile->fill($profile_form)->save();

     $profilehistory = new Profilehistory;
     $profilehistory->profile_id = $profile->id;
     $profilehistory->edited_at = Carbon::now();
     $profilehistory->save();

     return redirect('admin/profile');
 }


 public function delete(Request $request)
 {
     // 該当するNews Modelを取得
     $profile = Profile::find($request->id);
     // 削除する
     $profile->delete();
     return redirect('admin/profile/');
 }
}