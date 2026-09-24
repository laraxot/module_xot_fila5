<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

interface PdfBuilderContract
{
    public function format(string $format): self;

    public function name(string $filename): self;

    public function download(): self;

    /**
<<<<<<< HEAD
     * @param  \Closure(object): void  $callback
=======
     * @param \Closure(object): void $callback
>>>>>>> laraxot/dev
     */
    public function withBrowsershot(\Closure $callback): self;

    public function base64(): string;
}
