<<<<<<< .merge_file_gSulsh
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_0Uao75
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
<<<<<<< .merge_file_gSulsh
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_0Uao75
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
