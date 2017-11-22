<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
class CheckoutController extends Controller
{
    public function login()
    {
    	return view('checkout.login');
   	}

   	public function postLogin(Requests\CheckoutLoginRequest $request)
	{
		$email = $request->get('email');
		$password = $request->get('checkout_password');
		$is_guest = $request->get('is_guest') > 0;
		if ($is_guest) {
			return $this->guestCheckout($email);
		}
		return $this->authenticatedCheckout($email, $password);
	}	

	protected function authenticatedCheckout($email, $password)
	{
			return 'logic untuk authenticated checkout belum dibuat';
	}

	protected function guestCheckout($email)
	{
	// check if user exist, if so, ask login
	if ($user = User::where('email', $email)->first()) {
		if ($user->hasPassword()) {
			$errors = new MessageBag();
			$errors->add('checkout_password', 'Alamat email "' . $email . '" sudah\
			terdaftar, silahkan masukan password.');
			// redirect and change is_guest value
			return redirect('checkout/login')->withErrors($errors)
			->withInput(compact('email') + ['is_guest' => 0]);
		}
		// show view to request new password
		session()->flash('email', $email);
		return view('checkout.reset-password');
	}
	// save user data to session
	session(['checkout.email' => $email]);
		return redirect('checkout/address');
	}
	
	public function address()
	{
		return view('checkout.address');
	}

	public function postAddress(Request $request)
	{
	if (Auth::check()) return $this->authenticatedAddress($request);
		return $this->guestAddress($request);
	}

	protected function authenticatedAddress(CheckoutAddressRequest $request)
	{
		return "Akan diisi untuk logic authenticated address";
	}

	protected function guestAddress(Request $request)
	{
	$this->saveAddressSession($request);
		return redirect('checkout/payment');
	}

	protected function saveaddresssession(Request $request)
	{
	session([
	'checkout.address.name' => $request->get('name'),
	'checkout.address.detail' => $request->get('detail'),
	'checkout.address.province_id' => $request->get('province_id'),
	'checkout.address.regency_id' => $request->get('regency_id'),
	'checkout.address.district_id' => $request->get('district_id'),
	'checkout.address.phone' => $request->get('phone')
	]);
	}
}

