<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Tree;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Contracts\HasRecursiveRelationshipsContract;
use Spatie\QueueableAction\QueueableAction;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Collection as TreeCollection;

class GetTreeOptionsByModelClassAction
{
    use QueueableAction;

    /** @var array<int|string, string> */
    public array $options = [];

    /**
<<<<<<< .merge_file_RmcL8i
     * @param  class-string<HasRecursiveRelationshipsContract>  $class
=======
<<<<<<< HEAD
     * @param  class-string<HasRecursiveRelationshipsContract>  $class
=======
     * @param class-string<HasRecursiveRelationshipsContract> $class
     *
>>>>>>> laraxot/dev
>>>>>>> .merge_file_waul86
     * @return array<int|string, string>
     */
    public function execute(string $class, Model|callable|null $_where = null): array
    {
        /** @var HasRecursiveRelationshipsContract $model */
<<<<<<< .merge_file_RmcL8i
        $model = new $class;
=======
<<<<<<< HEAD
        $model = new $class;
=======
        $model = new $class();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_waul86

        /** @var TreeCollection<int, Model&HasRecursiveRelationshipsContract> $collection */
        $collection = $model->newQuery()->get();
        $rows = $collection->toTree();

        foreach ($rows as $row) {
            if (! $row instanceof HasRecursiveRelationshipsContract) {
                continue;
            }
            $key = $row->getKey();
            $this->options[SafeStringCastAction::cast($key)] = $row->getLabel();
            $this->parse($row);
        }

        return $this->options;
    }

    public function parse(HasRecursiveRelationshipsContract $model): void
    {
        foreach ($model->children as $child) {
            /** @var HasRecursiveRelationshipsContract $child */
            $key = $child->getKey();
            $this->options[SafeStringCastAction::cast($key)] =
                Str::repeat('---', $child->depth).'   '.$child->getLabel();
        }
    }
}
