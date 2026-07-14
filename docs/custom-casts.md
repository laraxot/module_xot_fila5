---
title: "Custom Casts"
module: "Xot"
type: concept
tags: [custom, casts]
created: 2026-07-14
updated: 2026-07-14
qmd: "custom casts"
related:
  - "./eloquent-magic-properties-rule.md"
---

php artisan make:cast Address

https://medium.com/@SlyFireFox/laravel-models-3-common-custom-cast-examples-6d0518ecd799

https://dev.to/slyfirefox/laravel-models-3-common-custom-cast-examples-2com




DB::table(‘orders’)
    ->where(‘address->postalCode’, ‘30582–0378’)
    ->get();


$table->json('address')->nullable();