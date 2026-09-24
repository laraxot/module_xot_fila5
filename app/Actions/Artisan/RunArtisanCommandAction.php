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
<<<<<<< .merge_file_WGjb5l
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_KJTBr5
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
     * @param  array<string, mixed>  $arguments
=======
     * @param array<string, mixed> $arguments
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
     * @param array<string, mixed> $arguments
>>>>>>> .merge_file_hPYTqt
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $arguments
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_AkpzR9
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
     */
    public function execute(string $command, array $arguments = []): string
    {
        try {
            Artisan::call($command, $arguments);

            return '[<pre>'.Artisan::output().'</pre>]';
<<<<<<< HEAD
<<<<<<< .merge_file_WGjb5l
<<<<<<< HEAD
        } catch (Exception $exception) {
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< HEAD
<<<<<<< .merge_file_KJTBr5
=======
>>>>>>> 930f8146 (Check & fix styling)
<<<<<<< HEAD
        } catch (Exception $exception) {
=======
        } catch (\Exception $exception) {
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
        } catch (\Exception $exception) {
>>>>>>> .merge_file_hPYTqt
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        } catch (\Exception $exception) {
>>>>>>> laraxot/dev
>>>>>>> 3792da0d (Check & fix styling)
=======
        } catch (Exception $exception) {
>>>>>>> .merge_file_AkpzR9
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
            return '[<pre>'.$exception->getMessage().'</pre>]';
        }
    }
}
