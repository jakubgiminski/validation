<?php declare(strict_types=1);

namespace IgniTest\Functional\Validation\Rules;

use Igni\Utils\TestCase;
use Igni\Validation\Rules\Chain;
use Igni\Validation\Rules\Email;
use Igni\Validation\Rules\Text;

class ChainTest extends TestCase
{
    public function testPass(): void
    {
        $validator = new Chain(new Text(), new Email());
        self::assertTrue($validator('d@w.com'));
        self::assertTrue($validator('test@domain.com'));
    }

    public function testFailure(): void
    {
        $validator = new Chain(new Text(), new Email());
        self::assertFalse($validator('1'));
        self::assertFalse($validator('true'));
        self::assertFalse($validator('false'));
        self::assertFalse($validator(1));
    }
}
