<<<<<<< .merge_file_1H6H4R
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_LmHx8n
<<<<<<< HEAD
>>>>>>> laraxot/dev
//https://github.com/larastan/larastan/issues/515

/**
=======
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_OpyDQV
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_KEISep
---
title: 'Pivot'
module: Xot
type: reference
slug: pivot
description: 'https://github.com/larastan/larastan/issues/515'
tags: [migrato-da-txt, xot]
converted_from: _pivot.txt
created: 2026-08-24
updated: 2026-08-24
---

https://github.com/larastan/larastan/issues/515

**
<<<<<<< .merge_file_1H6H4R
<<<<<<< HEAD
=======
<<<<<<< .merge_file_LmHx8n
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
=======
//https://github.com/larastan/larastan/issues/515

/**
>>>>>>> .merge_file_OpyDQV
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
//https://github.com/larastan/larastan/issues/515

/**
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_KEISep
 * @extends JsonResource<\App\User>
*/
class UserResource extends JsonResource
{
    // Other parts of the resource omitted
    public function toArray($request)
    {
        /** @var \App\User **/
        $user = $this;
        return [
              "time_to_live" => $this->whenPivotLoaded("table", function () use($user) {
                return $user->getRelationValue("pivot")->time_to_live;  // This is the line 45
            })
         ];
      }
}

<<<<<<< .merge_file_1H6H4R
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_LmHx8n
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
 //return $this->pivot->time_to_live;  // This is the line 45

getRelationValue("pivot")



$dpia = request()->route('dpias');
$dpia = app('request')->route('dpias');
///////////////////////
/**
 * @property int $id
 */
class MyCustomModel extends Model {}
////////////////////

getModel - Builder
<<<<<<< HEAD
paginate - Builder
=======

<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_OpyDQV
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_KEISep
## Appendice — contenuto migrato

---
title: "_pivot"
module: "Xot"
type: concept
tags: [pivot, 2]
created: 2026-07-14
updated: 2026-07-14
qmd: "pivot 2"
related:
  - "./eloquent-magic-properties-rule.md"
---
# _pivot

<!-- Contenuto migrato da _docs/_pivot.txt -->

https://github.com/larastan/larastan/issues/515

**
 * @extends JsonResource<\App\User>
*/
class UserResource extends JsonResource
{
    // Other parts of the resource omitted
    public function toArray($request)
    {
        /** @var \App\User **/
        $user = $this;
        return [
              "time_to_live" => $this->whenPivotLoaded("table", function () use($user) {
                return $user->getRelationValue("pivot")->time_to_live;  // This is the line 45
            })
         ];
      }
}

### Note raw residue (dump originale)

```php
//return $this->pivot->time_to_live;  // This is the line 45

getRelationValue("pivot")

$dpia = request()->route('dpias');
$dpia = app('request')->route('dpias');

/**
 * @property int $id
 */
class MyCustomModel extends Model {}
```

- `getModel` - Builder
- `paginate` - Builder
<<<<<<< .merge_file_1H6H4R
<<<<<<< .merge_file_LmHx8n
=======
=======
////////////////////

getModel - Builder
paginate - Builder
>>>>>>> .merge_file_OpyDQV
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
paginate - Builder
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_KEISep
