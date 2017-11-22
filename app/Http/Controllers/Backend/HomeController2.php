 <?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Uuid;
use App\Models\Payment;
use App\Models\AbstractPaper;
use Intervention\Image\Facades\Image;

class HomeController2 extends BackendController
{
 
    public function index(Request $request)
    {
    	$user = $request->user();
        if ($user->hasRole('participant')){

        }
        elseif ($user->hasRole(['localspeaker','internationalspeaker']))
        {

        }
        return view('backend.home.index');
    } 
    //edit profile
    public function edit(Request $request)
    {
        $user = $request->user();

        return view('backend.home.edit', compact('user'));
    }
    //update profile
    public function update(Requests\AccountUpdateRequest $request)
    {
        $user = $request->user();

        $user->update($request->all());

        return redirect()->back()->with("message","Acount was update successfully!");
    } 
}      