<?php

namespace App\Http\Controllers;

use Excel;
use FormBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RequestController extends Controller
{
	public function show()
	{
		$model = new Example();

		$form = FormBuilder::create(ExampleForm::class);

		return view('example.show', compact('form'));
	}

	public function send(Request $request)
	{
		$model = new Example($request->all());

		$form = FormBuilder::create(ExampleForm::class, compact('model'));

		if(!$form->isValid())
			return redirect()->back()->withErrors(['error', 'Błąd']);

		$model->save();

		return redirect()->back()->withErrors(['success', 'Udało się']);
	}

	public function excelForm()
	{
		$form = FormBuilder::create(ImportForm::class);

		return view('example.excelForm', compact('form'));
	}

	public function excel(Request $request)
	{
		$form = FormBuilder::create(ImportForm::class);

		$file = Input::file('file');

		$data = Excel::load($file,function($reader){})->get();
		
		dd($data['items']);
		return $this->excelModify($data);
	}

	public function excelModify($data)
	{

	}

	public function request()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => route('send'),
		    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		           
		    )
		));
		
		$resp = curl_exec($curl);

		curl_close($curl);
	}
}