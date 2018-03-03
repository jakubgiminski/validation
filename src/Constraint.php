<?php declare(strict_types=1);

namespace Igni\Validation;

use Igni\Exception\BadMethodCallException;
use Igni\Validation\Message\MessageFactory;

/**
 * Builder class for possible validation rules.
 *
 * @method static Rules\Alnum alnum(int $min = null, int $max = null)
 * @method static Rules\Alpha alpha(int $min = null, int $max = null)
 * @method static Rules\Boolean boolean(int $min = null, int $max = null)
 * @method static Rules\Chain chain(Rule ...$rules)
 * @method static Rules\Date date(string $format = null, $min = null, $max = null)
 * @method static Rules\Email email()
 * @method static Rules\Falsy falsy()
 * @method static Rules\In in(...$possibleValues)
 * @method static Rules\Integer integer(int $min = null, int $max = null)
 * @method static Rules\Number number(float $min = null, float $max = null)
 * @method static Rules\Uuid uuid()
 * @method static Rules\Regex regex(string $regex)
 * @method static Rules\Text text(int $min = null, int $max = null)
 * @method static Rules\Truthy truthy()
 * @method static Rules\Group group(array $definition)
 *
 * @example:
 * Constrain::alnum(2)('test');
 *
 */
final class Constraint
{
    const RULES_NAMESPACE = '\\Igni\\Validation\\Rules\\';

    public static function __callStatic($name, $arguments): Rule
    {
        $ruleClass = self::RULES_NAMESPACE . ucfirst($name);
        if (!class_exists($ruleClass)) {
            throw new BadMethodCallException("Validator (${name}) does not exists.");
        }

        return new $ruleClass(...$arguments);
    }
}