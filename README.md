## Laravel Model Form Package

This is package is for create dynamic crud forms for model.

* **Laravel 8** is supported
```
composer require rashidhamidov/model-form
```
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
* product.update

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
            "gender" => $this->setInputField('gender', 'radio', 'form-control', true, '', ["Male" => 'male', "Female" => "female"]),
            "phone" => $this->setInputField('phone', 'text', 'form-control phone-mask', false, ''),
            "detail" => $this->setTextAreaField('detail', 'form-control richtext', false, ''),
            "status" => $this->setSelectField('status', 'form-control', true, '', ['True'=>1, 'False'=>0]),
            "user" => $this->setForeignField('id','email','user_id', 'form-control', true, '', User::all()->toArray()),
            "date" => $this->setInputField('date', 'date', 'form-control', false, ''),
            "time" => $this->setInputField('time', 'time', 'form-control', false, ''),
        ];
    }
```

There are three type of elements and full type of those elements in form. You can also set className into array and required fields.
In select filed you have to set array into array that values in it.

### Call Form Function

```php
$model = new Product();
```

Into your blade file *form()* function returns a views that comprise form of Model.

```php
{{$model->form()}}
```

For Model Update Form you have to send model as variable 
which you
want to change.

```php
$model = Product::find($id);
$model->form($model);
```
Before use *form()* function you have to define in your
web.php file Model Controller Route resource or store and update
routes  for store and
update routes

```php
Route::resource('product',ProductController::class);
//or
Route::post('/product',[ProductController::class,'store'])->name('product.store')
Route::put('/product/{product}',[ProductController::class,'update'])->name('product.store')
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

