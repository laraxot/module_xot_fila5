<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Forms\Components;

use Filament\Forms\Components\Field;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

/**
<<<<<<< HEAD
 * Base class for form components.
 *
 * @method static static make(string $name) Create a new instance of the component
 */
abstract class XotBaseFormComponent extends Field
{
    /**
     * Get the component name.
     */
=======
 * Base class for custom form components.
 *
 * @method static static make(string $name)
 */
abstract class XotBaseFormComponent extends Field
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrated(true)->required(false);
    }

>>>>>>> c7fd73eb (.)
    public function getName(): string
    {
        $name = parent::getName();
        Assert::stringNotEmpty($name, 'Component name cannot be empty');

        return $name;
    }

<<<<<<< HEAD
    /**
     * Get the component label.
     */
    public function getLabel(): string
    {
        $label = parent::getLabel();
        if ($label === null) {
            return Str::title($this->getName());
        }
=======
    public function getLabel(): string
    {
        $label = parent::getLabel();

        if (null === $label) {
            return Str::title($this->getName());
        }

>>>>>>> c7fd73eb (.)
        if ($label instanceof Htmlable) {
            return $label->toHtml();
        }

        return (string) $label;
    }

    /**
<<<<<<< HEAD
     * Configure the component.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrated(true)->required(false);
    }

    /**
     * Get the validation rules.
     *
=======
>>>>>>> c7fd73eb (.)
     * @return array<string, mixed>
     */
    public function getValidationRules(): array
    {
        /** @var array<string, mixed> $rules */
        $rules = parent::getValidationRules();
<<<<<<< HEAD
        Assert::isArray($rules);
=======
>>>>>>> c7fd73eb (.)

        return $rules;
    }
}
