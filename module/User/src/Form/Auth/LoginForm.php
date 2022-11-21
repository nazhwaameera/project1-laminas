<?php

declare(strict_types=1);

namespace User\Form\Auth;

use Laminas\Form\Element;
use Laminas\Form\Form;

class LoginForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('sign in');
        $this->setAttribute('method', 'post');

        # email address input field
		$this->add([
			'type' => Element\Email::class,
			'name' => 'email',
			'options' => [
				'label' => 'Email Address',
			],
			'attributes' => [
				'required' => true,
				'size' => 40,
				'maxlength' => 128,
				'pattern' => '^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$',
				'autocomplete' => false,
				'data-toggle' => 'tooltip',
				'class' => 'form-control',
				'title' => 'Provide your email address',
				'placeholder' => 'Enter Your Email Address',
			],
		]);

		# password input field
		$this->add([
			'type' => Element\Password::class,
			'name' => 'password',
			'options' => [
				'label' => 'Password'
			],
			'attributes' => [
				'required' => true,
				'size' => 40,
				'maxlength' => 25,
				'data-toggle' => 'tooltip',
				'class' => 'form-control',
				'title' => 'Provide your password',
				'placeholder' => 'Enter Your Password',
			]
		]);

        # remember me checkbox
		$this->add([
			'type' => Element\Checkbox::class,
			'name' => 'recall',
			'options' => [
				'label' => 'Remember me?',
				'label_attributes' => [
					'class' => 'custom-control-label'
				],
				'use_hidden_element' => true,
				'checked_value' => "1", 
				'unchecked_value' => "0",
			],
			'attributes' => [
				'value' => "0",
				'id' => 'recall', 
				'class' => 'custom-control-input'
			]
		]);

        # csrf hidden field
        $this->add([
            'type' => Element\Csrf::class,
            'name' => 'csrf',
            'options' => [
                'csrf_options' => [
                    'timeout' => 600,
                ],
            ],
        ]);

        # submit button
        $this->add([
            'type' => element\Submit::class,
            'name' => 'account_login',
            'attributes' => [
                'value' => 'Account Login',
                'class' => 'btn btn-primary'
            ],
        ]);
    }
}