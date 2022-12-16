<?php

namespace RashidHamidov\ModelForm\Models;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

trait HasCrudForm
{
    /**
     * @return array
     * Fieldset of Model for sending form build
     */
    protected function formFields()
    {
        return [];
    }

    /**
     * @param string|null $name
     * @param string|null $type
     * @param string|null $className
     * @param string|null $required
     * @param string|null $defaultValue
     * @param array $values
     * @return array
     */
    protected function setInputField(
        string $name = null,
        string $type = null,
        string $className = null,
        string $required = null,
        string $defaultValue = null,
        array  $values = [],
    )
    {
        return [
            "element" => "input",
            "name" => $name,
            "type" => $type,
            "className" => $className,
            "required" => $required,
            "defaultValue" => $defaultValue,
            "values" => $values,
        ];
    }

    /**
     * @param string|null $name
     * @param string|null $className
     * @param string|null $required
     * @param string|null $defaultValue
     * @return array
     */
    protected function setTextAreaField(
        string $name = null,
        string $className = null,
        string $required = null,
        string $defaultValue = null,
    )
    {
        return [
            "element" => "textarea",
            "name" => $name,
            "className" => $className,
            "required" => $required,
            "defaultValue" => $defaultValue,
        ];
    }

    /**
     * @param string|null $name
     * @param string|null $className
     * @param string|null $required
     * @param string|null $defaultValue
     * @param array $selectOptions
     * @return array
     */
    protected function setSelectField(
        string $name = null,
        string $className = null,
        string $required = null,
        string $defaultValue = null,
        array  $selectOptions = [],
    )
    {
        return [
            "element" => "select",
            "name" => $name,
            "className" => $className,
            "required" => $required,
            "defaultValue" => $defaultValue,
            "selectOptions" => $selectOptions,
        ];
    }

    /**
     * @return mixed
     * must return any string value
     * if you sign the route name product the form action will be
     * route('product.store') and route('product.update',['id'=>$data->id])
     */
    abstract private function setRootName();

    /**
     * @return string
     * To get model form root name
     */
    private function getRootName()
    {
        return $this->setRootName();
    }

    /**
     * @return mixed
     * For set rules of model for validation must return an array
     */
    abstract private function setRules();

    /**
     * @return mixed
     * For get rules of model for validation must return an array
     */
    public function getRules()
    {
        return $this->setRules();
    }


    /**
     * @param $data
     * @return Application|Factory|View
     * The model form view function return a view of form component. If update must send model as data
     */
    public function form($data = null)
    {
        return view('model-form::components.form', [
            'data' => $data,
            'route_name' => $this->getRootName(),
            'fields' => $this->formFields(),
        ]);
    }

}
