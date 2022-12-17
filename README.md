## Laravel Model Form Package

This is package is for create dynamic crud forms for model.

* **Laravel 9** is supported

This avantages is

- Create Dynamic Forms from Model file with one function
- Create Rules in Model file with one function
- Automaticaly Creates Forms which you want
- You can change the class names and can add more than one class name into form element

#### Inserting Trait to Model

```php
class Product extends Model
{
    use HasCrudForm;
}

```

#### Abstract Functions

*setRootName() and setRules() is a mandatory functions for models that extends HasCrudForm trait*
<p>You have to override this functions for form post and request validation. If
you set root name as product the form action will be route with names:
</p>

* product.store
* product.update(id)

It automaticaly get the model data id from your send with form function

```php
private function setRootName()
    {
        return "product";
    }
    
private function setRules()
    {
        return [
            'name'=>"required"
        ];
    }
```

#### Make Form Fields

There is a function for create form *formFields()* and returns an array. You can create form like this.

```php
protected function formFields()
    {
        return [
            "name" => $this->setInputField('name', 'text', 'form-control', true, ''),
            "gender" => $this->setInputField('gender', 'radio', 'form-control', true, '', ["male" => 'Male', "female" => "Female"]),
            "phone" => $this->setInputField('phone', 'text', 'form-control phone-mask', true, ''),
            "detail" => $this->setTextAreaField('detail', 'form-control richtext', true, ''),
            "status" => $this->setSelectField('status', 'form-control', true, '', ['True', 'False']),
            "date" => $this->setInputField('date', 'date', 'form-control', true, ''),
            "time" => $this->setInputField('time', 'time', 'form-control', true, ''),

        ];
    }
```

There is three type of element and full type of this elements in form. You can set className into array and required
true or false.
In select filed you have to set array into array that values in it.

### Call Form Function

```php
$model = new Product();
```

Into your blade file *form()* function returns a views that composer form of Model.

```php
{{$model->form()}}
```

### Rules Usage

After define rules you can use validation with this rule array

```php
public function store(Request $request)
    {
        $model = new Product();
        $request->validate($model->getRules());
    }
```

## License

This package is developed by Rashid Hamidov for Laravel framework [MIT license](https://opensource.org/licenses/MIT).

