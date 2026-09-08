<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Generate;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Class\GetFilenameByClassnameAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GenerateModelByModelClass
{
    use QueueableAction;

<<<<<<< HEAD
=======
    /** @var array<string, string> */
>>>>>>> c7fd73eb (.)
    public array $replaces = [];

    /**
     * Execute the function with the given model class.
     *
<<<<<<< HEAD
     * @param string $model_class the class name of the model
     *
     * @return string
=======
     * @param  string  $model_class  the class name of the model
>>>>>>> c7fd73eb (.)
     */
    public function execute(string $model_class): string
    {
        Assert::classExists($model_class);

        $namespace = str_replace('\\', '/', $model_class);
        Assert::string($namespace, 'Namespace must be a string');

        $this->generate($model_class);
        $filename = app(GetFilenameByClassnameAction::class)->execute($model_class);

        $content_old = File::get($filename);
        $content = $content_old;
        foreach ($this->replaces as $k => $v) {
<<<<<<< HEAD
            if (method_exists($this, 'replace' . $k)) {
                $content = $this->{'replace' . $k}($v, $content);
=======
            if (method_exists($this, 'replace'.$k)) {
                $content = $this->{'replace'.$k}($v, $content);
>>>>>>> c7fd73eb (.)
            }

            // $content=$this->replace($content,$k,$v);
        }
<<<<<<< HEAD
        $content = str_replace(' extends Model', ' extends BaseModel', $content);
        $content = str_replace('use HasFactory;', '', $content);
        Assert::string($content, '[' . __LINE__ . '][' . class_basename($this) . ']');
=======
        $content = is_string($content) ? str_replace(' extends Model', ' extends BaseModel', $content) : $content;
        $content = is_string($content) ? str_replace('use \Modules\Xot\Models\Traits\HasXotFactory;', '', $content) : $content;
        Assert::string($content, '['.__LINE__.']['.class_basename($this).']');
>>>>>>> c7fd73eb (.)

        if ($content !== $content_old) {
            File::put($filename, $content);
        }

        return $namespace;
    }

    public function replaceDummyTable(string $value, string $content): string
    {
        $table_start = mb_strpos($content, 'protected $table');
        Assert::integer(
            $fillable_start = mb_strpos($content, 'protected $fillable'),
<<<<<<< HEAD
            '[' . __LINE__ . '][' . class_basename($this) . ']',
        );
        $fillable_end = mb_strpos($content, '];', $fillable_start);
        if (false === $table_start) {
            $before = mb_substr($content, 0, $fillable_end + 2);
            $after = mb_substr($content, $fillable_end + 2);
            $content = $before . PHP_EOL . '    protected $table = "' . $value . '";' . PHP_EOL . $after;
=======
            '['.__LINE__.']['.class_basename($this).']',
        );
        $fillable_end = mb_strpos($content, '];', $fillable_start);
        if ($table_start === false) {
            $before = mb_substr($content, 0, $fillable_end + 2);
            $after = mb_substr($content, $fillable_end + 2);
            $content = $before.PHP_EOL.'    protected $table = "'.$value.'";'.PHP_EOL.$after;
>>>>>>> c7fd73eb (.)
        }

        return $content;
    }

    /**
     * Create a factory for the given model class.
     *
<<<<<<< HEAD
     * @param string $model_class The class name of the model to create the factory for
     *
     * @return void
=======
     * @param  string  $model_class  The class name of the model to create the factory for
>>>>>>> c7fd73eb (.)
     */
    public function generate(string $model_class): void
    {
        $model_name = class_basename($model_class);
        $module_name = Str::of($model_class)->between('Modules\\', '\Models\\')->toString();
        $artisan_cmd = 'module:make-model';
        $artisan_params = ['model' => $model_name, 'module' => $module_name];
        $res = Artisan::call($artisan_cmd, $artisan_params);

        /*
         * $output=Artisan::output();
         *
         * dddx(
         * [
         * 'res'=>$res,
         * 'output'=>$output,
         * 'model_name'=>$model_name,
         * 'module_name'=>$module_name,
         * 'artisan_cmd'=>$artisan_cmd,
         * 'artisan_params'=>$artisan_params,
         * ]
         * );
         */
    }

<<<<<<< HEAD
=======
    /**
     * @param  array<string, string>  $replaces
     */
>>>>>>> c7fd73eb (.)
    public function setCustomReplaces(array $replaces): self
    {
        $this->replaces = array_merge($this->replaces, $replaces);

        return $this;
    }
}
