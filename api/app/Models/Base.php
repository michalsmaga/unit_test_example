<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Base extends Model
{

    /**
     * Validation rules.
     * @var array
     */
    protected $validationRules = [];

    /**
     * Errors.
     * @var array
     */
    protected $errors = [];

    /**
     * Validate model attributes.
     *
     * @return bool
     */
    public function validate(): bool
    {
        $validator = Validator::make($this->getAttributes(), $this->validationRules);

        if ($validator->fails()) {
            $this->errors = $validator->errors()->toArray();
            return false;
        }

        return true;
    }

    /**
     * Return validation errors.
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}

