<<<<<<< HEAD
=======
---
title: "scope"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "scope"
issues: []
discussions: []
---

>>>>>>> laraxot/dev
Calling some fields from a specific table in a more organized way - Laravel

If you want to call some fields from a specific table in a more organized way, you can write this function in Model :-

public function scopeDoctorFields($query)
{
$query->select('name');
}

then call function inside Controller :-

$doctors = User::doctorFields()->paginate(100);

--------------------------------------------------------------------------------------
