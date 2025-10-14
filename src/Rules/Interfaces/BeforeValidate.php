<?php

namespace Magewirephp\Validation\Rules\Interfaces;

interface BeforeValidate
{
    /**
     * Before validate hook
     *
     * @return void
     */
    public function beforeValidate();
}
