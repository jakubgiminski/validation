<?php declare(strict_types=1);

namespace Igni\Validation\Rules;

use Igni\Validation\Rule;

class Uuid extends Rule
{
    private const REGEX_UUID = '/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/';

    protected function assert($input): bool
    {
        return $input === '00000000-0000-0000-0000-000000000000' || (bool) preg_match(self::REGEX_UUID, $input);
    }
}
