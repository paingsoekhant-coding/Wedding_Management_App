<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function profilePage()
    {
        return view('Admin.account.profile');
    }

    public function editProfilePage()
    {
        return view('Admin.account.edit');
    }

    public function update($id , Request $request)
    {
        // dd($request->toArray());
        // $this->accountValidationCheck($request);
        $updateData = $this->getUserData($request);
        // dd($updateData);
        User::where('id',$id)->update($updateData);
        return redirect()->route('admin#profilePage')->with(['updateSuccess' => 'ကိုယ်ရေးအချက်အလက်ပြင်ဆင်မှုအောင်မြင်ပါသည်။']);

    }
    public function changePasswordPage()
    {
        return view('Admin.account.change');
    }

    public function changePassword(Request $request)
    {
        $this->passwordValidationCheck($request);

        $currentUserId = Auth::user()->id;
        $user = User::select('password')->where('id', $currentUserId)->first();
        $dbPassword =$user->password;//hash value

        if(Hash::check($request->oldPassword,$dbPassword)){
            $data = [
                'password' => Hash::make($request->newPassword)
            ];
            User::where('id',Auth::user()->id)->update($data);

            Auth::guard('web')->logout();

            return redirect()->route('auth#loginPage')->with('status', 'စကားဝှက်ကို အောင်မြင်စွာ ပြောင်းလိုက်ပါပြီ! ကျေးဇူးပြု၍ သင့်စကားဝှက်အသစ်ဖြင့် ဝင်ရောက်လိုက်ပါ။');

        }
        return back()->with(['notMatch' => 'စကားဝှက်ဟောင်း မကိုက်ညီပါ။ ထပ်မံကြိုးစားပါ။']) ;

    }

    public function adminListPage()
    {
        $admin = User::get();
        return view('Admin.customer.adminList',compact('admin'));
    }

    private function getUserData($request){
        return [
            'name' => $request-> userName,
            'email' => $request-> email,
            'phone' => $request-> phone,
            'updated_at' => Carbon::now()
        ];
    }

    //password Validation check
    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword' =>'required | min:6' ,
            'newPassword' =>'required | min:6'  ,
            'confirmPassword' =>'required |min:6| same:newPassword'
        ])->validate();
    }

    private function accountValidationCheck($request){
        Validator::make($request->all(),[
            'name' => 'required' ,
            'email' => 'required' ,
            'phone' => 'required' ,
        ])->validate();
    }

}
