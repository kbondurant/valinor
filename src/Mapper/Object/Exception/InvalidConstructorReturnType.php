<?php

declare(strict_types=1);

namespace CuyZ\Valinor\Mapper\Object\Exception;

use CuyZ\Valinor\Definition\FunctionDefinition;
use CuyZ\Valinor\Type\Types\UnresolvableType;
use LogicException;

/** @internal */
final class InvalidConstructorReturnType extends LogicException
{
    public function __construct(FunctionDefinition $function)
    {
        $returnType = $function->returnType();

        if ($returnType instanceof UnresolvableType) {
            $message = $returnType->getMessage();
            $previous = $returnType;
        } else {
            $message = "Invalid return type `{$returnType->toString()}` for constructor `{$function->signature()}`, it must be a valid class name.";
            $previous = null;
        }

        parent::__construct($message, 1659446121, $previous);
    }
}
