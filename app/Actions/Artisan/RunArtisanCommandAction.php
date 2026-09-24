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
<<<<<<< .merge_file_m8xSec
<<<<<<< HEAD
     * @param  array<string, mixed>  $arguments
=======
=======
<<<<<<< .merge_file_313Wdf
     * @param  array<string, mixed>  $arguments
=======
<<<<<<< HEAD
     * @param  array<string, mixed>  $arguments
=======
>>>>>>> .merge_file_BBkq3m
<<<<<<< .merge_file_KJTBr5
<<<<<<< HEAD
     * @param  array<string, mixed>  $arguments
=======
     * @param array<string, mixed> $arguments
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $arguments
>>>>>>> .merge_file_hPYTqt
>>>>>>> laraxot/dev
<<<<<<< .merge_file_m8xSec
=======
>>>>>>> .merge_file_npqqBK
>>>>>>> .merge_file_BBkq3m
     */
    public function execute(string $command, array $arguments = []): string
    {
        try {
            Artisan::call($command, $arguments);

            return '[<pre>'.Artisan::output().'</pre>]';
<<<<<<< .merge_file_m8xSec
=======
<<<<<<< .merge_file_313Wdf
        } catch (Exception $exception) {
=======
>>>>>>> .merge_file_BBkq3m
<<<<<<< HEAD
        } catch (Exception $exception) {
=======
<<<<<<< .merge_file_KJTBr5
<<<<<<< HEAD
        } catch (Exception $exception) {
=======
        } catch (\Exception $exception) {
>>>>>>> laraxot/dev
=======
        } catch (\Exception $exception) {
>>>>>>> .merge_file_hPYTqt
>>>>>>> laraxot/dev
<<<<<<< .merge_file_m8xSec
=======
>>>>>>> .merge_file_npqqBK
>>>>>>> .merge_file_BBkq3m
            return '[<pre>'.$exception->getMessage().'</pre>]';
        }
    }
}
