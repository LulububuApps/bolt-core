<?php

declare(strict_types=1);

namespace Bolt\Entity\Field;

use Bolt\Common\Str;
use Bolt\Entity\Field;
use Bolt\Entity\FieldInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class TextField extends Field implements Excerptable, FieldInterface
{
    public const TYPE = 'text';

    /**
     * Returns the default value option
     */
    public function getDefaultValue()
    {
        $defaultValue = $this->getDefinition()->get('default', null);

        if ($defaultValue === 'password') {
            return Str::generatePassword();
        }

        return $defaultValue;
    }
}
