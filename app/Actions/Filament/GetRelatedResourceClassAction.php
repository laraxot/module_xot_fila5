<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament;

<<<<<<< .merge_file_ueETE9
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
<<<<<<< .merge_file_8KDXH9
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> .merge_file_EyPVSz
>>>>>>> laraxot/dev
=======
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> laraxot/dev
>>>>>>> 8d801bbe (Check & fix styling)
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> .merge_file_FWomDI
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Spatie\QueueableAction\QueueableAction;

/**
 * Risolve la XotBaseResource del model MOSTRATO da una pagina
 * XotBaseManageRelatedRecords (il model della relazione, mai quello della
 * Resource proprietaria della pagina).
 *
 * Perche' non riusa GetResourceClassNameByModelClassAction: quella usa
 * Filament::getModelResource(), scoped al pannello corrente — verificato dal
 * vivo che torna NULL per model di un altro modulo, e per QuestionChart
 * risolverebbe una Resource diversa da quella che la pagina dichiara
 * esplicitamente in $relatedResource.
 *
 * Perche' non riusa XotBaseRelationManager::getResourceClass(): quel metodo
 * deriva la Resource dal namespace del RelationManager stesso, che per
 * convenzione vive dentro {RelatedResource}\RelationManagers\. Una pagina
 * XotBaseManageRelatedRecords vive invece dentro {OwnerResource}\Pages\:
 * applicare la stessa risalita di namespace risolverebbe la Resource
 * proprietaria, non quella della relazione.
 *
 * @see Modules/Xot/docs/app/Actions/Filament/GetRelatedResourceClassAction.php.md
 * @see Modules/Xot/docs/stories/xotbasemanagerelatedrecords-convention-over-configuration.story.md
 */
class GetRelatedResourceClassAction
{
    use QueueableAction;

    /**
     * @return class-string<XotBaseResource>|null
     */
    public function execute(object $page): ?string
    {
        if (method_exists($page, 'getRelatedResource')) {
            /** @var class-string<XotBaseResource>|null $relatedResource */
            $relatedResource = $page::getRelatedResource();
<<<<<<< .merge_file_ueETE9
<<<<<<< HEAD
<<<<<<< HEAD
            if ($relatedResource !== null) {
=======
<<<<<<< .merge_file_8KDXH9
            if ($relatedResource !== null) {
=======
            if (null !== $relatedResource) {
>>>>>>> .merge_file_EyPVSz
>>>>>>> laraxot/dev
=======
            if ($relatedResource !== null) {
>>>>>>> 8d801bbe (Check & fix styling)
=======
            if ($relatedResource !== null) {
>>>>>>> .merge_file_FWomDI
                return $relatedResource;
            }
        }

        if (! method_exists($page, 'getModelClass')) {
            return null;
        }

<<<<<<< .merge_file_ueETE9
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var class-string<Model> $modelClass */
=======
<<<<<<< .merge_file_8KDXH9
<<<<<<< HEAD
        /** @var class-string<\Illuminate\Database\Eloquent\Model> $modelClass */
=======
<<<<<<< HEAD
=======
>>>>>>> 8d801bbe (Check & fix styling)
        /** @var class-string<\Illuminate\Database\Eloquent\Model> $modelClass */
=======
        /** @var class-string<Model> $modelClass */
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        /** @var class-string<Model> $modelClass */
>>>>>>> .merge_file_EyPVSz
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
        /** @var class-string<Model> $modelClass */
>>>>>>> .merge_file_FWomDI
        $modelClass = $page->getModelClass();
        $moduleName = Str::between($modelClass, 'Modules\\', '\Models\\');
        $modelName = class_basename($modelClass);
        $guess = 'Modules\\'.$moduleName.'\Filament\Resources\\'.$modelName.'Resource';

        if (class_exists($guess) && is_subclass_of($guess, XotBaseResource::class)) {
<<<<<<< .merge_file_ueETE9
<<<<<<< HEAD
<<<<<<< HEAD
            /** @var class-string<XotBaseResource> $guess */
=======
<<<<<<< .merge_file_8KDXH9
            /** @var class-string<XotBaseResource> $guess */
=======
            /* @var class-string<XotBaseResource> $guess */
>>>>>>> .merge_file_EyPVSz
>>>>>>> laraxot/dev
=======
            /** @var class-string<XotBaseResource> $guess */
>>>>>>> 8d801bbe (Check & fix styling)
=======
            /** @var class-string<XotBaseResource> $guess */
>>>>>>> .merge_file_FWomDI
            return $guess;
        }

        return null;
    }
}
