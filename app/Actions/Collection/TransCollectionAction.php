<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Collection;

<<<<<<< HEAD
<<<<<<< HEAD
=======
// use Modules\Xot\Services\ArrayService;

>>>>>>> laraxot/dev
=======
// use Modules\Xot\Services\ArrayService;

>>>>>>> 8d801bbe (Check & fix styling)
use Illuminate\Support\Collection;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action per la traduzione di elementi di una collezione.
 */
class TransCollectionAction
{
    use QueueableAction;

    public ?string $transKey;

    /**
     * Esegue la traduzione di una collezione.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Collection<int|string, mixed>  $collection
=======
     * @param Collection<int|string, mixed> $collection
     *
>>>>>>> laraxot/dev
=======
     * @param Collection<int|string, mixed> $collection
     *
>>>>>>> 8d801bbe (Check & fix styling)
     * @return Collection<int|string, string>
     */
    public function execute(Collection $collection, ?string $transKey): Collection
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if ($transKey === null) {
=======
        if (null === $transKey) {
>>>>>>> laraxot/dev
=======
        if (null === $transKey) {
>>>>>>> 8d801bbe (Check & fix styling)
            return $collection->map(SafeStringCastAction::cast(...));
        }

        $this->transKey = $transKey;

        return $collection->map($this->trans(...));
    }

    /**
     * Traduce un singolo elemento.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  mixed  $item  L'elemento da tradurre
=======
     * @param mixed $item L'elemento da tradurre
     *
>>>>>>> laraxot/dev
=======
     * @param mixed $item L'elemento da tradurre
     *
>>>>>>> 8d801bbe (Check & fix styling)
     * @return string L'elemento tradotto o l'elemento originale se la traduzione non esiste
     */
    public function trans(mixed $item): string
    {
        // Converte l'item in stringa se non lo è già
        if (! \is_string($item)) {
            $item = SafeStringCastAction::cast($item);
        }

<<<<<<< HEAD
<<<<<<< HEAD
        if (empty($item) || $this->transKey === null) {
=======
        if (empty($item) || null === $this->transKey) {
>>>>>>> laraxot/dev
=======
        if (empty($item) || null === $this->transKey) {
>>>>>>> 8d801bbe (Check & fix styling)
            return $item;
        }

        // Prima prova la traduzione diretta
        $key = $this->transKey.'.'.$item;
        $trans = trans($key);

        // Se la traduzione esiste ed è una stringa, la restituisce
        if ($trans !== $key && \is_string($trans)) {
            return $trans;
        }

        // Seconda prova: sostituisce i punti con underscore
        $itemWithUnderscore = str_replace('.', '_', $item);
        $keyWithUnderscore = $this->transKey.'.'.$itemWithUnderscore;
        $transWithUnderscore = trans($keyWithUnderscore);

        // Se la traduzione con underscore esiste ed è una stringa, la restituisce
        if ($transWithUnderscore !== $keyWithUnderscore && \is_string($transWithUnderscore)) {
            return $transWithUnderscore;
        }

        // Se nessuna traduzione è stata trovata, restituisce l'elemento originale
        return $item;
    }
}
