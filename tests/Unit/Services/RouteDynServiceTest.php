<?php

declare(strict_types=1);
<<<<<<< .merge_file_ZLLUJv
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ubp6ek
<<<<<<< HEAD
=======
>>>>>>> 3792da0d (Check & fix styling)

=======
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======

>>>>>>> .merge_file_F7ADYj
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ZrBl46
use Modules\Xot\Services\RouteDynService;
use PHPUnit\Framework\Assert;

test('RouteDynService getMethod filtra valori non stringa e reindicizza', function (): void {
    Assert::assertSame(
        ['get', 'post'],
        RouteDynService::getMethod(['method' => ['get', 1, 'post']], null),
    );
});

test('RouteDynService getMethod torna al default se non restano metodi validi', function (): void {
    Assert::assertSame(['get', 'post'], RouteDynService::getMethod(['method' => [1, false]], null));
});
