---
title: "pivot 1"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "pivot 1"
issues: []
discussions: []
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
