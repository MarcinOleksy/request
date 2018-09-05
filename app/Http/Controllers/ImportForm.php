<?php

namespace App\Http\Controllers;

use Kris\LaravelFormBuilder\Form;

class ImportForm extends Form
{
	public function __construct()
	{
		$this->formOptions = [
			'method' => 'POST',
			'url' => route('excel'),
			'enctype' => 'multipart/form-data',
		];
	}
	

    public function buildForm()
    {
        $this->add('file', 'file');

        $this->add('submit', 'submit');
    }
}