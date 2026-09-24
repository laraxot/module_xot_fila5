<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Artisan;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Spatie\QueueableAction\QueueableAction;

/**
 * Replaces Modules\Xot\Services\ArtisanService::exe().
 *
 * Runs a single artisan command via the Artisan facade and returns its
 * output wrapped in a `<pre>` block, or the exception message on failure.
 */
class RunArtisanCommandAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $arguments
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $arguments
=======
     * @param array<string, mixed> $arguments
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
     */
    public function execute(string $command, array $arguments = []): string
    {
        try {
            Artisan::call($command, $arguments);

            return '[<pre>'.Artisan::output().'</pre>]';
<<<<<<< HEAD
        } catch (Exception $exception) {
=======
<<<<<<< HEAD
        } catch (Exception $exception) {
=======
        } catch (\Exception $exception) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            return '[<pre>'.$exception->getMessage().'</pre>]';
        }
    }
}
