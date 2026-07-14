---
title: "Scope"
module: "Xot"
type: concept
tags: [scope]
created: 2026-07-14
updated: 2026-07-14
qmd: "scope"
related:
  - "./eloquent-magic-properties-rule.md"
---
Calling some fields from a specific table in a more organized way - Laravel

If you want to call some fields from a specific table in a more organized way, you can write this function in Model :-

public function scopeDoctorFields($query)
{
$query->select('name');
}

then call function inside Controller :-

$doctors = User::doctorFields()->paginate(100);

--------------------------------------------------------------------------------------