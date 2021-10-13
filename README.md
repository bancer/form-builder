# form-builder (for CakePHP)

This package is a wrapper for CakePHP FormHelper.

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
    ->size(50);
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
