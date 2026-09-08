<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Panel;

<<<<<<< HEAD
use Exception;
use Illuminate\Support\Facades\Log;
use Filament\Panel;
=======
use Filament\Panel;
use Illuminate\Support\Facades\Log;
>>>>>>> c7fd73eb (.)
use Modules\Xot\Datas\MetatagData;
use Spatie\QueueableAction\QueueableAction;

class ApplyMetatagToPanelAction
{
    use QueueableAction;

    public function execute(Panel &$panel): Panel
    {
        try {
            $metatag = MetatagData::make();
<<<<<<< HEAD
            return $panel
                // @phpstan-ignore argument.type
                ->colors($metatag->getColors())
=======

            return $panel
                ->colors($metatag->getFilamentColors())
>>>>>>> c7fd73eb (.)
                ->brandLogo($metatag->getBrandLogo())
                ->brandName($metatag->getBrandName())
                ->darkModeBrandLogo($metatag->getDarkModeBrandLogo())
                ->brandLogoHeight($metatag->getBrandLogoHeight())
                ->favicon($metatag->getFavicon());
<<<<<<< HEAD
        } catch (Exception $e) {
            // Log l'errore ma non bloccare l'applicazione
            Log::error('Error applying metatag to panel: ' . $e->getMessage());
=======
        } catch (\Exception $e) {
            // Log l'errore ma non bloccare l'applicazione
            Log::error('Error applying metatag to panel: '.$e->getMessage());

>>>>>>> c7fd73eb (.)
            return $panel;
        }
    }
}
