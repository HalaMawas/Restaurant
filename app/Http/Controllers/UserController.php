<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\eventTrigger;
use App\Notifications\NewItem;
use Illuminate\Support\Facades\Notification;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // if(!auth()->user()->hasPermissionTo('user_show')){
        //     return redirect('oops')->with('error','لاتملك صلاحية للوصول لهذه الصفحة');
        // }
        $users=User::all();
        return view('user.index',['users'=>$users]);
    }
    public function create(){
        // if(!auth()->user()->hasPermissionTo('user_insert')){
        //     return redirect('oops')->with('error','لاتملك صلاحية للوصول لهذه الصفحة');
        // }
        $roles=Role::all();
        return view('user.create',['roles'=>$roles]);
    }
    public function store(Request $request){
        // if(!auth()->user()->hasPermissionTo('user_insert')){
        //     return redirect('oops')->with('error','لاتملك صلاحية للوصول لهذه الصفحة');
        // }
         try {
            $user=User::where('email',$request->email)->first();
            if(isset($user)){
                return redirect()->back()->with("error", 'هذا المستخدم موجود مسبقاً');

            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;

            $user->password = bcrypt($request->password);

             $permissions=DB::table('role_has_permissions')->where('role_id', $request->role_id)->pluck('permission_id');
             $user->syncRoles($request->role_id);
             $user->syncPermissions($permissions);
            if ($user->save()) {
                return redirect()->back()->with("success", "تمت الاضافة بنجاح");

            } else {
                return redirect()->back()->with("error", 'حدث خطأ اثناء الحفظ');
            }

        } catch (\Exception $e) {

            return redirect()->back()->with("error", $e->getMessage());

        }
    }
    public function edit(User $user)
    {
        // if(!auth()->user()->hasPermissionTo('user_edit')){
        //     return redirect('oops')->with('error','لاتملك صلاحية للوصول لهذه الصفحة');
        // }
        $roles=Role::all();


        return view('user.edit',['user'=>$user,'roles'=>$roles]);


    }
    public function update(Request $request,User $user){
        // if(!auth()->user()->hasPermissionTo('user_edit')){
        //     return redirect('oops')->with('error','لاتملك صلاحية للوصول لهذه الصفحة');
        // }


          try {


              $user->name = $request->name;
              $user->email = $request->email;
              if ($request->passwordCheck == 'on') {

                  $user->password = bcrypt($request->password);
              }

              $permissions=DB::table('role_has_permissions')->where('role_id', $request->role_id)->pluck('permission_id');
              $user->syncRoles($request->role_id);
              $user->syncPermissions($permissions);
              $userRole=\DB::table('model_has_roles')->where('model_id',$user->id)->update(['role_id' => $request->role_id]);

              if ($user->save()) {
                  return redirect('users')->with("success", "تم التعديل بنجاح");

              } else {
                  return redirect()->back()->with("error", 'حدث خطأ اثناء الحفظ');
              }

          } catch (\Exception $e) {

              return redirect()->back()->with("error", $e->getMessage());

          }
     // }


//else {
   // return redirect()->back()->with("error", 'لايمكنك تعديل معلومات مستخدم آخر');
//}
    }
    public function confirmpassword(Request $request){




        // return $request;
$user=User::find($request->userid);

if(Hash::check($request->oldpassword, $user->password)){
if($request->password==$request->password_confirmation){
    if($request->password==$request->oldpassword){
        return redirect()->back()->with("error", 'كلمة السر لم تتغير!!');
    }
    $this->validate(
        $request,
        ['password' => 'min:8'],
        ['password.min' => 'ثمانية حروف على الأقل']
    );







    $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with("success", 'تم التعديل بنجاح');

}
else{
    return redirect()->back()->with("error", 'لا يوجد تطابق بين الحقلين');
}


}else{
    return redirect()->back()->with("error", 'كلمة السر غير صحيحة');
}
    }
    public function password(Request $request){
        return view('auth/passwords.reset',['id'=>$request->id]);
    }
    // public function changepassword(Request $request){


    // }
    public function destroy(User $user){
        if(!auth()->user()->hasPermissionTo('user_delete')){
            return redirect('oops')->with('error','لاتملك صلاحية للوصول لهذه الصفحة');
        }
        if($user->id=1){
            return 'admin';
        }
        else{
            $user->delete();
            return 'success';
        }


        // session()->flash('success','تم الحذف بنجاح');
    }
    public function changepassword(){
      return view('user.changepassword');
    }
    public function changeUserPassword(Request $request){
      dd($request->input());
    }
}
