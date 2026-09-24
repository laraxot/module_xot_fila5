<<<<<<< .merge_file_R0M1Ut
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_yPoW4E
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HGzKOu
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_Wmh2h8
---
title: "Type hinting"
type: reference
status: active
created: 2026-08-27
updated: 2026-08-27
note: "Convertito da type_hinting.txt (documento) da convert-docs-txt-to-md.py."
---

# type_hinting

<!-- Contenuto migrato da _docs/type_hinting.txt -->

<<<<<<< .merge_file_R0M1Ut
<<<<<<< HEAD
=======
<<<<<<< .merge_file_yPoW4E
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HGzKOu
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Wmh2h8
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
https://mlocati.github.io/articles/php-type-hinting.html
https://howto.webarea.it/php/type-hinting-php-e-controllo-wake-strict-mode_170
https://wiki.php.net/rfc/scalar_type_hints
https://wiki.php.net/rfc/return_types

https://packagist.org/packages/maksi/laravel-idea-type-hinting

<<<<<<< .merge_file_R0M1Ut
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_yPoW4E
<<<<<<< HEAD

=======
>>>>>>> .merge_file_HGzKOu
=======

>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Wmh2h8
=======
=======

>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
/** @var $post Post */

/** @var $posts Post[] */

/**
     * @Route("/types")
     */

<<<<<<< HEAD
<<<<<<< .merge_file_R0M1Ut
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_yPoW4E
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HGzKOu
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Wmh2h8
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

declare(strict_types = 1);


<<<<<<< HEAD
<<<<<<< .merge_file_R0M1Ut
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_yPoW4E
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
declare(strict_types = 1);

>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HGzKOu
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Wmh2h8
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
protected ClassName $classType;

 // Types are also legal on static properties
    public static iterable $staticProp;

  // Types can also be used with the "var" notation
    var bool $flag;

  // Typed properties may have default values (more below)
    public string $str = "foo";
    public ?string $nullableStr = null;

Scalar types

Boolean (bool | boolean)
Integer (int | integer)
Float (float | double)
String (string)

Compound types

array
object
callable
iterable

unction callACallable(
  callable $f
): int {
  return $f('thephp.website');
}

function iterable_map(iterable $list, callable $operation) : iterable
{
  foreach ($list as $k => $v) {
    yield $operation($k, $v);
  }
}

<<<<<<< .merge_file_R0M1Ut
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_yPoW4E
<<<<<<< HEAD

=======
>>>>>>> .merge_file_HGzKOu
=======

>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Wmh2h8
=======
=======

>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
public static function byArray(iterable $data)
    {
        $results = [];

        foreach($data as $name) {
            $results[] = self::byString($name);
        }

        return $results;
    }

    public static function byString(string $name)
    {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
        $slug = strtolower($slug);

        return $slug;
    }

<<<<<<< .merge_file_R0M1Ut
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD



=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_yPoW4E
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_HGzKOu



>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
=======



<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Wmh2h8
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
https://sodocumentation.net/it/php/topic/504/classi-e-oggetti

 private static $instance = null;

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new self();
        }

        return self::$instance;
    }

<<<<<<< .merge_file_R0M1Ut
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD



=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_yPoW4E
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_HGzKOu



>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
=======



<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Wmh2h8
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
class ClassName
{
    public function foo(): self
    {
        return new ClassName();
    }
}

$instance = new ClassName();
$instance->foo();

<<<<<<< .merge_file_R0M1Ut
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_yPoW4E
<<<<<<< HEAD

=======
>>>>>>> .merge_file_HGzKOu
=======

>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Wmh2h8
=======
=======

>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
ublic function foo(): ?stdClass
    {
        return new stdClass();
    }

    public function bar(): ?stdClass
    {
        return null;
    }

<<<<<<< .merge_file_R0M1Ut
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_yPoW4E
<<<<<<< HEAD

=======
>>>>>>> .merge_file_HGzKOu
=======

>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Wmh2h8
=======
=======

>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
function foo(): object
{
    return new stdClass();
}

<<<<<<< .merge_file_R0M1Ut
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD


=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_yPoW4E
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_HGzKOu


>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
=======


<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Wmh2h8
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
Relazioni
https://github.com/larastan/larastan/issues/689

"types have capital letter: HasOne, BelongsTo, HasMany, etc
if using return types, remember to reference them at the beginning with:
use Illuminate\Database\Eloquent\Relations\HasOne;".

esempio:
public function articles(): HasMany {
    return $this->hasMany(Article::class);
}

<<<<<<< HEAD
<<<<<<< .merge_file_R0M1Ut
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_Wmh2h8



https://github.com/oucil/Code-Hint-Aggregator
<<<<<<< .merge_file_R0M1Ut
=======
https://github.com/oucil/Code-Hint-Aggregator
>>>>>>> laraxot/dev
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_yPoW4E
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_HGzKOu



<<<<<<< HEAD
https://github.com/oucil/Code-Hint-Aggregator
<<<<<<< HEAD
=======
https://github.com/oucil/Code-Hint-Aggregator
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> da9ae01a0 (.)
=======



https://github.com/oucil/Code-Hint-Aggregator
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_Wmh2h8
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
