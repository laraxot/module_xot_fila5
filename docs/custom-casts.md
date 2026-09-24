<<<<<<< .merge_file_u3RtIZ
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_I3XCCy
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ZpaCMd
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_C4iIKV
---
title: "Custom casts"
type: reference
status: active
created: 2026-08-27
updated: 2026-08-27
note: "Convertito da custom_casts.txt (documento) da convert-docs-txt-to-md.py."
---

# custom_casts

<!-- Contenuto migrato da _docs/custom_casts.txt -->
<<<<<<< .merge_file_u3RtIZ
<<<<<<< HEAD
=======
<<<<<<< .merge_file_I3XCCy
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ZpaCMd
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_C4iIKV
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

php artisan make:cast Address

https://medium.com/@SlyFireFox/laravel-models-3-common-custom-cast-examples-6d0518ecd799

https://dev.to/slyfirefox/laravel-models-3-common-custom-cast-examples-2com

<<<<<<< .merge_file_u3RtIZ
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD



=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_I3XCCy
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_ZpaCMd



>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
=======



<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_C4iIKV
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
DB::table(‘orders’)
    ->where(‘address->postalCode’, ‘30582–0378’)
    ->get();

<<<<<<< HEAD
<<<<<<< .merge_file_u3RtIZ
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_I3XCCy
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_ZpaCMd

<<<<<<< HEAD
>>>>>>> laraxot/dev
$table->json('address')->nullable();
=======
$table->json('address')->nullable();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
=======

$table->json('address')->nullable();
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

$table->json('address')->nullable();
>>>>>>> 3792da0d (Check & fix styling)
=======

$table->json('address')->nullable();
>>>>>>> .merge_file_C4iIKV
=======
=======

$table->json('address')->nullable();
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
