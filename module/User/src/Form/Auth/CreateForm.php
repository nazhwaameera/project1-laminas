<?php

declare(strict_types=1);

namespace User\Form\Auth;

use Laminas\Form\Form;
use Laminas\Form\Element;

class CreateForm extends Form
{
    public function __construct()
    {
        parent::__construct('new_account');
        $this->setAttribute('method', 'post');

        # Username input field
        $this->add([
            'type' => Element\Text::class,
            'name' => 'username',
            'options' => [
                'label' => 'Username'
            ],
            'attributes' => [
                'required' => true,
                'size' => 40,
                'maxlength' => 25,
                'pattern'=> '^[a-zA-Z0-9]+$',
                'data-toggle' => 'tooltip',
                'class' => 'form-control',
                'title' => 'Username must consist of alphanumeric characters only',
                'placeholder' => 'Enter Your Username'
            ]
        ]);

        # Email address input field
        $this->add([
            'type' => Element\Email::class,
            'name' => 'email',
            'options' => [
                'label' => 'Email Address'
            ],
            'attributes' => [
                'required' => true,
                'size' => 40,
                'maxlength' => 128,
                'pattern' => '^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$',
                'autocomplete' => false,
                'data-toggle' => 'tooltip',
                'class' => 'form-control',
                'title' => 'Provide a valid and working email address',
                'placeholder' => 'Enter Your Email Address'

            ]
        ]);

        # confirm email addresss
        $this->add([
            'type' => Element\Email::class,
            'name' => 'confirm_email',
            'options' => [
                'label' => 'Verify Email Address'
            ],
            'attributes' => [
                'required' => true,
                'size' => 40,
                'maxlength' => 128,
                'pattern' => '^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$',
                'autocomplete' => false,
                'data-toggle' => 'tooltip',
                'class' => 'form-control',
                'title' => 'Email address must match that provided above',
                'placeholder' => 'Enter Your Email Address Again'

            ]
        ]);

         # password input text field
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
                'autocomplete' => false,
                'data-toggle' => 'tooltip',
                'class' => 'form-control',
                'title' => 'Password must have between 8 and 25 characters',
                'placeholder' => 'Enter Your Password'
            ]
        ]);

        # confirm password input field
        $this->add([
            'type' => Element\Password::class,
            'name' => 'confirm_password',
            'options' => [
                'label' => 'Verify Password'
            ],
            'attributes' => [
                'required' => true,
                'size' => 40,
                'maxlength' => 25,
                'autocomplete' => false,
                'data-toggle' => 'tooltip',
                'class' => 'form-control',
                'title' => 'Password must match that provided above',
                'placeholder' => 'Enter Your Password Again'
            ]
        ]);

        # cross-site-request forgery (csrf) field
        $this->add([
            'type' => Element\Csrf::class,
            'name' => 'csrf',
            'options' => [
                'csrf_options' => [
                    'timeout' => 600,
                ]
            ]
        ]);

        # submit button
        $this->add([
            'type' => Element\Submit::class,
            'name' => 'create_account',
            'attributes' => [
                'value' => 'Create Account',
                'class' => 'btn btn-primary'
            ]
        ]);

    }
}