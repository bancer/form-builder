# form-builder (for CakePHP)

This package is a wrapper for CakePHP FormHelper.

## How to install
Execute `composer require bancer/form-builder` to install by composer.

## Why and when to use
Use this package if you would like to get a different interface for constructing HTML forms than provided by CakePHP's FormHelper class. This package wraps FormHelper class and provides builder methods instead of FormHelper method options. It does not change the behavior of FormHelper. In addition it provides methods for some common HTML element attributes. It is expected to make the construction of forms easier and less error prone due to fewer number of magic strings necessary to build form elements. An extra benefit is code autocompletion in any IDE or editor that supports autocompletion of PHP code. 

## How to use
Example in the view file:
``` php
use Bancer\FormBuilder\FormBuilder;
...
$FormBuilder = new FormBuilder($this->Form); // where $this->Form is an instance of FormHelper
$FormBuilder->newForm($user)
    ->method('post')
    ->url(['controller' => 'users', 'action' => 'edit'])
    ->encoding('UTF-8')
    ->id('edit-user')
    ->classes('narrow-form');
echo $FormBuilder->newControl('User.email')
    ->label(__('Email'))
    ->readOnly()
    ->size(50)
    ->attribute('data-validated', 1)
    ->attribute('oninvalid', 'alert('Invalid email')');
echo $FormBuilder->newControl('User.password')
    ->label(__('Password'))
    ->type('password')
    ->size(30)
    ->minLength(8)
    ->maxLength(30)
    ->required(false);
echo $FormBuilder->newSubmit(__('Submit'));
echo $FormBuilder->end();
```
