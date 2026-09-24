<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> 3792da0d (Check & fix styling)
/**
 * --- usata ricorsivamente.
 */

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class UpdateAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_boQCQO
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
     * @param  array<string, mixed>  $rules
=======
     * @param array<string, mixed> $data
     * @param array<string, mixed> $rules
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $data
     * @param array<string, mixed> $rules
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  array<string, mixed>  $data
     * @param  array<string, mixed>  $rules
>>>>>>> .merge_file_OqA87I
     */
    public function execute(Model $model, array $data, array $rules): Model
    {
        $validator = Validator::make($data, $rules);
        $validator->validate();

        $keyName = $model->getKeyName();
        // $data['updated_by'] = authId();
<<<<<<< .merge_file_boQCQO
<<<<<<< HEAD
<<<<<<< HEAD
        if ($model->getKey() === null) {
=======
        if (null === $model->getKey()) {
>>>>>>> laraxot/dev
=======
        if (null === $model->getKey()) {
>>>>>>> 3792da0d (Check & fix styling)
=======
        if ($model->getKey() === null) {
>>>>>>> .merge_file_OqA87I
            $key = $data[$keyName];
            /** @var array<string, mixed> $data */
            $data = collect($data)->except($keyName)->toArray();

            if (method_exists($model, 'withTrashed')) {
                $model = $model->withTrashed();
            }
            Assert::isInstanceOf($model, Model::class);
            $where = [$keyName => $key];
            $model = $model->firstOrCreate($where, $data);
        }

        $model->update($data);

        app(__NAMESPACE__.'\\Update\RelationAction')->execute($model, $data);

        // $msg = 'aggiornato! ['.$model->getKey().']!';

        // Session::flash('status', $msg); // .

        return $model;
    }
}
