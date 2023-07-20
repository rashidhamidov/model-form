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
    abstract protected function formFields(): array;

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
    ): array
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
    ): array
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
    ): array
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
     * @param string $foreignKey
     * @param string $foreignName
     * @param string|null $name
     * @param string|null $className
     * @param string|null $required
     * @param string|null $defaultValue
     * @param array $foreignOptions
     * @return array
     */
    protected function setForeignField(
        string $foreignKey,
        string $foreignName,
        string $name = null,
        string $className = null,
        string $required = null,
        string $defaultValue = null,
        array  $foreignOptions = [],
    ): array
    {
        return [
            "element" => "foreign",
            "name" => $name,
            "className" => $className,
            "required" => $required,
            "defaultValue" => $defaultValue,
            "foreignOptions" => $foreignOptions,
            "foreignKey" => $foreignKey,
            "foreignName" => $foreignName,
        ];
    }

    /**
     * @return mixed
     * must return any string value
     * if you sign the route name product the form action will be
     * route('product.store') and route('product.update',['id'=>$data->id])
     */
    abstract protected function setRootName(): string;

    /**
     * @return string
     * To get model form root name
     */
    public function getRootName(): string
    {
        return $this->setRootName();
    }


    /**
     * @return array
     * To set rules of model when store request is send
     */
    abstract protected function setRulesStore(): array;

    /**
     * @return array
     * To set rules of model when update request is send
     */
    abstract protected function setRulesUpdate(): array;

    /**
     * @return array
     * For get rules  of model for validation must return an array
     */
    public function getRulesStore(): array
    {
        return $this->setRulesStore();
    }


    /**
     * @return array
     * For get rules  of model for validation must return an array
     */
    public function getRulesUpdate(): array
    {
        return $this->setRulesUpdate();
    }

    /**
     * @param $data
     * @return Application|Factory|View
     * The model form view function return a view of form component. If update must send model as data
     */
    public function form($data = null): View|Factory|Application
    {
        return view('model-form::components.form', [
            'data' => $data,
            'route_name' => $this->getRootName(),
            'fields' => $this->formFields(),
        ]);
    }

}
