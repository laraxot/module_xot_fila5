---
title: "custom casts"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "custom casts"
issues: []
discussions: []
---


php artisan make:cast Address

https://medium.com/@SlyFireFox/laravel-models-3-common-custom-cast-examples-6d0518ecd799

https://dev.to/slyfirefox/laravel-models-3-common-custom-cast-examples-2com




DB::table(‘orders’)
    ->where(‘address->postalCode’, ‘30582–0378’)
    ->get();


$table->json('address')->nullable();
