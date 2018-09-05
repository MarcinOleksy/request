<?php

namespace App\Http\Controllers;

use Kris\LaravelFormBuilder\Form;

class ExampleForm extends Form
{
	public function __construct()
	{
		$this->formOptions = [
			'method' => 'POST',
			'url' => route('send'),
			'enctype' => 'multipart/form-data',
		];
	}

    public function buildForm()
    {
        $this->add('name', 'text');

        $this->add('surname', 'text');

        $this->add('submit', 'submit');
    }
}