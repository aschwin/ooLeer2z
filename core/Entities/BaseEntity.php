<?php

namespace Core\Entities;

/**
 * Class BaseEntity
 *
 * @namespace App\Core\Entities
 */
abstract class BaseEntity
{
    /**
     * getFields
     *
     * @return array
     */
    private function getFields()
    {
        return array_keys(
            get_class_vars(
                get_called_class()
            )
        );
    }

    /**
     * has
     *
     * @param $name
     *
     * @return bool
     */
    private function has($name)
    {
        return in_array(
            $name,
            $this->getFields()
        );
    }

    /**
     * setAttributes
     *
     * @param array $options
     *
     * @throws \Exception
     */
    public function setAttributes(array $options = [])
    {
        $class = get_called_class();

        foreach ($options as $field => $value) {
            $field = $this->snakeCaseToCamelCase($field);
            if ($this->has(lcfirst($field))) {

                $method = 'set'.$field;
                if (method_exists($this, $method)) {
                    $this->$method($value);
                } else {
                    throw new \Exception('All fields set using the entity create method should have a setter. ' . $class . '->' . $method . '() is missing.');
                }
            } else {
                throw new \Exception('The field ' . $field . ' is invalid for the ' . $class::ENTITY . ' entity.');
            }
        }
    }

    /**
     * getAttributes
     *
     * @return array
     *
     * @throws \Exception
     */
    public function getAttributes()
    {
        $class = get_called_class();
        $result = [];

        foreach ($this->getFields() as $field => $value) {
            $attribute = $this->snakeCaseToCamelCase($field);
            if ($this->has(lcfirst($attribute))) {

                $method = 'get' . $attribute;
                if (method_exists($this, $method)) {
                    $field = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $field));
                    $result[$field] = $this->$method($value);
                } else {
                    throw new \Exception($class.'->'.$method.'() is missing.');
                }
            } else {
                throw new \Exception($attribute.' is invalid for the '.$class::ENTITY.' entity.');
            }
        }

        return $result;
    }

    /**
     * snakeCaseToCamelCase
     *
     * @param        $input
     * @param string $separator
     * @param bool   $lcfirst
     *
     * @return mixed|string
     */
    private function snakeCaseToCamelCase($input, $separator = '_', $lcfirst = false)
    {
        $output = str_replace($separator, '', ucwords($input, $separator));

        if ($lcfirst) {
            $output = lcfirst($output);
        }

        return $output;
    }
}
