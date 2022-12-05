<?php

declare(strict_types=1);

namespace User\Form\Auth;

use Laminas\Captcha\Image;
use Laminas\Form\Element;
use Laminas\Form\Form;

class ForgotForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('lost password');
        $this->setAttribute('method', 'post');

        # email input field
        $this->add([
            'type' => Element\Email::class,
            'name' => 'email',
            'options' => [
                'label' => 'Email Address',
            ],
            'attributes'=> [
                'required' => true,
                'size' => 40,
                'maxlength' => 128,
                'pattern' => '^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$',
                'autocomplete' => false,
                'class' => 'form-control',
                'title' => "Provide your account's email address",
                'placeholder'=> 'Enter your email address'
            ],
        ]);

		# captcha field
		$this->add([
			'type' => Element\Captcha::class,
			'name' => 'turing',
			'options' => [
				'label' => 'Verify that you are human?',
				'captcha' => new Image([
					'font' => DOOR . DS . 'fonts/ubi.ttf',
					'fsize' => 55,
					'wordLen' => 6,
					'imgAlt' => 'image captcha',
					'height' => 100,
					'width' => 300,
					'dotNoiseLevel' => 220,
					'lineNoiseLevel' => 18,
				]),
			],
			'attributes' => [
				'size' => 40,
				'required' => true,
				'maxlength' => 6,
				'pattern' => '^[a-zA-Z0-9]+$',
				'class' => 'custom-control',
				'data-toggle' => 'tooltip',
				'title' => 'Provide text displayed',
				'placeholder' => 'Type in characters displayed',
				'captcha' => (new Element\Captcha())->getInputSpecification(), # validation
			],
		]);

		# csrf field
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
			'type' => Element\Submit::class,
			'name' => 'forgot_password',
			'attributes' => [
				'value' => 'Send Message',
				'class' => 'btn btn-primary'
			]
		]);
    }
}