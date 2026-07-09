<?php

declare(strict_types=1);

namespace Modules\Xot\Datas\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\User\Contracts\TeamContract;
use Modules\User\Contracts\TenantContract;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Webmozart\Assert\Assert;

use function Safe\realpath;

trait XotDataProfileThemeAccessors
{
    public function getHomeController(): string
    {
        return 'Modules\\'.$this->main_module.'\Http\Controllers\HomeController';
    }

    public function getProfileModelByUserId(string $user_id): ProfileContract
    {
        $profileClass = $this->getProfileClass();
        /** @var Model&ProfileContract $profile */
        $profile = app($profileClass);

        Assert::isInstanceOf($profile, Model::class);
        Assert::isArray($profile->getFillable(), 'getFillable() must return array');

        if (! in_array('user_id', $profile->getFillable(), true)) {
            throw new \Exception('add user_id to fillable on class '.$profileClass);
        }

        /** @var ProfileContract */
        $res = $profile->firstOrCreate(['user_id' => $user_id]);
        Assert::implementsInterface($res, ProfileContract::class);

        return $res;
    }

    public function getProfileByEmail(string $email): ProfileContract
    {
        $user = $this->getUserByEmail($email);

        return $this->getProfileModelByUserId((string) $user->id);
    }

    /**
     * Verifica se l'utente autenticato è un super amministratore.
     */
    public function iAmSuperAdmin(): bool
    {
        $user = Auth::user();
        if (null === $user) {
            return false;
        }

        if (! method_exists($user, 'hasRole')) {
            return false;
        }

        // Utilizziamo un'asserzione per garantire che hasRole restituisca un booleano
        $result = $user->hasRole('super-admin');

        return true === $result;
    }

    public function getProfileModel(): ProfileContract
    {
        if (null !== $this->profile) {
            return $this->profile;
        }

        $user_id = (string) authId();
        $this->profile = $this->getProfileModelByUserId((string) $user_id);
        Assert::implementsInterface(
            $this->profile,
            ProfileContract::class,
            '['.__LINE__.']['.class_basename($this).']',
        );

        return $this->profile;
    }

    /**
     * Update the XotData instance.
     *
     * @param array<string, mixed> $data
     */
    public function update(array $data): self
    {
        foreach ($data as $k => $v) {
            $this->{$k} = $v;
        }

        // $this->save();
        return $this;
    }

    public function save(): void
    {
        dddx('wip');
    }

    public function getPubThemeViewPath(string $key = ''): string
    {
        $path0 = base_path('Themes/'.$this->pub_theme.'/resources/views/'.$key);

        try {
            return realpath($path0);
        } catch (\Exception $e) {
            throw new \Exception('realpath not find dir['.$path0.']'.PHP_EOL.'['.$e->getMessage().']');
        }
    }

    public function getPubThemePublicPath(string $key = ''): string
    {
        return public_path('themes/'.$this->pub_theme.'/'.$key);
    }

    public function getPubThemePublicAsset(string $key = ''): string
    {
        return asset('themes/'.$this->pub_theme.'/'.$key);
    }

    public function getMailHtmlLayoutPath(string $key = ''): string
    {
        return base_path('Themes/'.$this->pub_theme.'/resources/mail-layouts/'.$key);
    }

    /**
     * @return class-string<Model&UserContract>
     */
    public function getUserClassByType(string $type): string
    {
        $user_class = $this->getUserClass();
        $userInstance = app($user_class);

        if (! is_object($userInstance) || ! method_exists($userInstance, 'getChildTypes')) {
            throw new \Exception('getChildTypes method not found in class '.$user_class);
        }

        $types = $userInstance->getChildTypes();
        if (! is_array($types) && ! ($types instanceof \ArrayAccess)) {
            throw new \Exception('getChildTypes must return array or ArrayAccess');
        }
        $class = Arr::get($types, $type);
        if (is_null($class)) {
            throw new \Exception('type '.$type.' not found in class '.$user_class);
        }

        Assert::classExists($class, '['.__LINE__.']['.class_basename($this).']');
        Assert::isAOf($class, Model::class, '['.__LINE__.']['.class_basename($this).']['.$class.']');
        Assert::implementsInterface(
            $class,
            UserContract::class,
            '['.__LINE__.']['.class_basename($this).']['.$class.']',
        );

        /* @var class-string<Model&UserContract> $class */
        return $class;
    }

    public function getUserResourceClassByType(string $type): string
    {
        $class = $this->getUserClassByType($type);

        // Extract the module name from the class namespace
        $moduleName = Str::before(Str::after($class, 'Modules\\'), '\\');

        // Build the resource class path
        $resourceClass = Str::of($class)
            ->replace('\\Models\\', '\\Filament\\Resources\\')
            ->append('Resource')
            ->toString();

        // If missing, fallback (still PSR-4: NEVER put literal "app\" in the PHP namespace segment)
        if (! class_exists($resourceClass)) {
            $resourceClass =
                'Modules\\'.$moduleName.'\\Filament\\Resources\\'.class_basename($class).'Resource';
        }

        if (! class_exists($resourceClass)) {
            throw new \RuntimeException("Resource class not found for type: {$type}. Tried: {$resourceClass}");
        }

        return $resourceClass;
    }

    /**
     * Get user child types.
     *
     * @return array<int, mixed>
     */
    public function getUserChildTypes(): array
    {
        $enum_class = $this->getUserChildTypeClass();

        if (! enum_exists($enum_class)) {
            return [];
        }

        return $enum_class::cases();
        // $userInstance = app($user_class);
        // return $userInstance->getChildTypes();
    }

    public function getUserChildTypeClass(): string
    {
        $user_class = $this->getUserClass();
        $user_instance = app($user_class);

        if (! is_object($user_instance) || ! method_exists($user_instance, 'getCasts')) {
            throw new \Exception('getCasts method not found in class '.$user_class);
        }

        $castsResult = $user_instance->getCasts();
        if (! is_array($castsResult) && ! ($castsResult instanceof \ArrayAccess)) {
            throw new \Exception('getCasts must return array or ArrayAccess');
        }

        // $enum_class = Arr::get($user_class::casts(),'type',null);
        $enum_class = Arr::get($castsResult, 'type', null);
        if (null === $enum_class) {
            $enum_class = Str::of($user_class)
                ->replace('\\Models\\', '\\Enums\\')
                ->append('TypeEnum')
                ->toString();
        }
        Assert::stringNotEmpty($enum_class, 'enum_class is empty');

        return $enum_class;

        // $userInstance = app($user_class);
        // return $userInstance->getChildTypes();
    }

    /**
     * Get the project namespace dynamically.
     */
    public function getProjectNamespace(): string
    {
        return 'Modules\\'.$this->main_module;
    }

    public function forceSSL(): bool
    {
        if (! $this->force_ssl) {
            return false;
        }
        if (isset($_SERVER['SERVER_NAME']) && 'localhost' === $_SERVER['SERVER_NAME']) {
            return false;
        }
        if (isset($_SERVER['SERVER_NAME']) && '127.0.0.1' === $_SERVER['SERVER_NAME']) {
            return false;
        }
        // AWS ELB
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO']) {
            return true;
        }

        // if(isset($_SERVER['SERVER_NAME']) && Str::endsWith($_SERVER['SERVER_NAME'],'.local')){
        //    return false;
        // }
        // if(isset($_SERVER['REQUEST_SCHEME']) && 'https' == $_SERVER['REQUEST_SCHEME']){
        //    return false;
        // }
        return true;
    }
}
