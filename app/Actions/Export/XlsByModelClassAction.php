<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Actions\Model\GetTransKeyByModelClassAction;
<<<<<<< .merge_file_2IHQvJ
<<<<<<< HEAD
<<<<<<< HEAD
=======
// use Modules\Xot\Services\ArrayService;
>>>>>>> laraxot/dev
=======
// use Modules\Xot\Services\ArrayService;
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_91pzl2
use Modules\Xot\Exports\CollectionExport;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Webmozart\Assert\Assert;

class XlsByModelClassAction
{
    use QueueableAction;

    /**
     * Esporta i dati di un modello in Excel.
     *
<<<<<<< .merge_file_2IHQvJ
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_91pzl2
     * @param  class-string<Model>  $modelClass  Classe del modello da esportare
     * @param  array<string, mixed>  $where  Condizioni where per la query
     * @param  array<int, string>  $includes  Relazioni o campi da includere
     * @param  array<int, string>  $excludes  Campi da escludere
     * @param  callable(array<string, mixed>|Model, int): mixed|null  $callback  Callback per manipolare i dati
<<<<<<< .merge_file_2IHQvJ
=======
     * @param class-string<Model>                                   $modelClass Classe del modello da esportare
     * @param array<string, mixed>                                  $where      Condizioni where per la query
     * @param array<int, string>                                    $includes   Relazioni o campi da includere
     * @param array<int, string>                                    $excludes   Campi da escludere
     * @param callable(array<string, mixed>|Model, int): mixed|null $callback   Callback per manipolare i dati
>>>>>>> laraxot/dev
=======
     * @param string               $modelClass Classe del modello da esportare
     * @param array<string, mixed> $where      Condizioni where per la query
     * @param array<int, string>   $includes   Relazioni o campi da includere
     * @param array<int, string>   $excludes   Campi da escludere
     * @param callable|null        $callback   Callback per manipolare i dati
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_91pzl2
     */
    public function execute(
        string $modelClass,
        array $where = [],
        array $includes = [],
        array $excludes = [],
        ?callable $callback = null,
    ): BinaryFileResponse {
        // Verifichiamo che la classe del modello esista
        Assert::classExists($modelClass);
        Assert::subclassOf($modelClass, Model::class);

        $with = $this->getWithByIncludes($includes);

        // Creiamo l'istanza del modello e costruiamo la query
        /** @var Model $model */
        $model = app($modelClass);
        $query = $model->query()->with($with);

        // Applichiamo le condizioni where
        foreach ($where as $key => $value) {
            $query->where($key, $value);
        }

        // Otteniamo i risultati
        /** @var \Illuminate\Database\Eloquent\Collection<int, Model> $rows */
        $rows = $query->get();

        // Filtriamo i campi se sono specificati gli includes
<<<<<<< .merge_file_2IHQvJ
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_91pzl2
        if ($includes !== []) {
            $rows = $rows->map(static function (Model $item) use ($includes) {
=======
        if ([] !== $includes) {
            $rows = $rows->map(static function ($item) use ($includes) {
>>>>>>> 3792da0d (Check & fix styling)
                $data = [];
                foreach ($includes as $include) {
                    $data[$include] = data_get($item, $include);
                }

                return $data;
            });
        }

<<<<<<< .merge_file_2IHQvJ
<<<<<<< HEAD
<<<<<<< HEAD
        if ($excludes !== []) {
            $rows = $rows->map(function (Model|array $item) use ($excludes): Model|array {
                if ($item instanceof Model) {
=======
        // Nascondiamo i campi esclusi
        if ([] !== $excludes) {
            $rows = $rows->map(function ($item) use ($excludes) {
                if (is_object($item) && method_exists($item, 'makeHidden')) {
                    /* @var Model $item */
>>>>>>> 3792da0d (Check & fix styling)
                    return $item->makeHidden($excludes);
                }

                return $item;
            });
        }

        // Applichiamo il callback se fornito
<<<<<<< HEAD
        if ($callback !== null) {
            /** @var \Closure(Model|array<array-key, mixed>, int): mixed $mapCallback */
            $mapCallback = static function (Model|array $item, int $key) use ($callback): mixed {
                if ($item instanceof Model) {
                    return $callback($item, $key);
                }

                /** @var array<string, mixed> $data */
                $data = [];
                foreach ($item as $itemKey => $itemValue) {
                    if (is_string($itemKey)) {
                        $data[$itemKey] = $itemValue;
                    }
                }

                return $callback($data, $key);
            };
            $rows = $rows->map($mapCallback);
=======
        if ([] !== $excludes) {
=======
        if ($excludes !== []) {
>>>>>>> .merge_file_91pzl2
            $rows = $rows->map(static fn (Model|array $item): Model|array => $item instanceof Model ? $item->makeHidden($excludes) : $item);
        }

        // Applichiamo il callback se fornito
        if ($callback !== null) {
            $rows = $rows->map($this->rowCallback($callback));
<<<<<<< .merge_file_2IHQvJ
>>>>>>> laraxot/dev
=======
        if (null !== $callback) {
            $rows = $rows->map($callback);
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_91pzl2
        }

        // Otteniamo la chiave di traduzione e creiamo l'export
        $transKey = app(GetTransKeyByModelClassAction::class)->execute($modelClass);
<<<<<<< HEAD
        /** @var Collection<int|string, mixed> $exportRows */
=======
        /** @var Collection<int, mixed> $exportRows */
>>>>>>> 3792da0d (Check & fix styling)
        $exportRows = $rows;
        $collectionExport = new CollectionExport($exportRows, $transKey);
        $filename = $this->getExportName($modelClass);

        return Excel::download($collectionExport, $filename);
    }

    /**
<<<<<<< .merge_file_2IHQvJ
<<<<<<< HEAD
<<<<<<< HEAD
     * Ottiene le relazioni da caricare in base ai campi inclusi.
     *
     * @param  array<int, string>  $includes  Campi da includere
=======
     * @param callable(array<string, mixed>|Model, int): mixed $callback
     *
=======
     * @param  callable(array<string, mixed>|Model, int): mixed  $callback
>>>>>>> .merge_file_91pzl2
     * @return \Closure(Model|array<array-key, mixed>, int): mixed
     */
    private function rowCallback(callable $callback): \Closure
    {
        return static function (Model|array $item, int $key) use ($callback): mixed {
            if ($item instanceof Model) {
                return $callback($item, $key);
            }

            /** @var array<string, mixed> $data */
            $data = [];
            foreach ($item as $itemKey => $itemValue) {
                if (is_string($itemKey)) {
                    $data[$itemKey] = $itemValue;
                }
            }

            return $callback($data, $key);
        };
    }

    /**
=======
>>>>>>> 3792da0d (Check & fix styling)
     * Ottiene le relazioni da caricare in base ai campi inclusi.
     *
<<<<<<< .merge_file_2IHQvJ
     * @param array<int, string> $includes Campi da includere
     *
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<int, string>  $includes  Campi da includere
>>>>>>> .merge_file_91pzl2
     * @return array<int, string>
     */
    private function getWithByIncludes(array $includes): array
    {
        $with = [];
        foreach ($includes as $include) {
            // Assicuriamo che $include sia una stringa
            $includeStr = is_string($include) ? $include : ((string) $include);

            // Verifichiamo se contiene un punto (indicatore di relazione)
            if (! Str::contains($includeStr, '.')) {
                continue;
            }

            // Estraiamo il nome della relazione (prima parte prima del punto)
            $parts = explode('.', $includeStr);
            if (! empty($parts[0])) {
                $with[] = $parts[0];
            }
        }

        return array_unique($with);
    }

    /**
     * Genera il nome del file di export.
     *
<<<<<<< .merge_file_2IHQvJ
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $modelClass  Classe del modello
=======
     * @param string $modelClass Classe del modello
>>>>>>> laraxot/dev
=======
     * @param string $modelClass Classe del modello
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  string  $modelClass  Classe del modello
>>>>>>> .merge_file_91pzl2
     */
    private function getExportName(string $modelClass): string
    {
        return sprintf('%s %s.xlsx', Str::slug(class_basename($modelClass)), Carbon::now()->format('d-m-Y His'));
    }
}
