<<<<<<< HEAD
---
name: contracts
description: "<!-- Contenuto migrato da docs/contracts.txt -->"
metadata:
  type: documentation
---

=======
>>>>>>> laraxot/dev
# contracts

<!-- Contenuto migrato da _docs/contracts.txt -->

//--- Illuminate\Database\Eloquent\Relations\relation (abstract class Relation)
->getRelated()

//--- Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithPivotTable (trait InteractsWithPivotTable) - BelongsToMany
->detach()
->attach()

//---- Illuminate\Database\Eloquent\Concerns\QueriesRelationships (trait QueriesRelationships)
public function whereHas($relation, Closure $callback = null, $operator = '>=', $count = 1)

//---- Illuminate\Database\Eloquent\Builder  (class Builder)
 public function getModel()
