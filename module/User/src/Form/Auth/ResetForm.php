<?php

declare(strict_types=1);

namespace User\Form\Auth;

use Laminas\Form\Element;
use Laminas\Form\Form;

class ResetForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('alter_password');
        $this->setAttribute('method', 'post');

        # new password input text field
        $this->add([
            'type' => Element\Password::class,
            'name' => 'new_password',
            'options' => [
                'label' => 'New Password'
            ],
            'attributes' => [
                'required' => true,
                'size' => 40,
                'maxlength' => 25,
                'autocomplete' => false,
                'data-toggle' => 'tooltip',
                'class' => 'form-control',
                'title' => 'Password must have between 8 and 25 characters',
                'placeholder' => 'Enter Your New Password'
            ]
        ]);
    
        # confirm new password input field
        $this->add([
            'type' => Element\Password::class,
            'name' => 'confirm_new_password',
            'options' => [
                'label' => 'Verify New Password'
            ],
            'attributes' => [
                'required' => true,
                'size' => 40,
                'maxlength' => 25,
                'autocomplete' => false,
                'data-toggle' => 'tooltip',
                'class' => 'form-control',
                'title' => 'Password must match that provided above',
                'placeholder' => 'Enter Your New Password Again'
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
            'name' => 'reset_password',
            'attributes' => [
                'value' => 'Reset Password',
                'class' => 'btn btn-primary'
            ]
        ]);
    }
}