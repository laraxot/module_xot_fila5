<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Livewire\Wireable;
use Modules\User\Contracts\TeamContract;
use Modules\User\Contracts\TenantContract;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;
use Webmozart\Assert\Assert;

/**
 * Class Modules\Xot\Datas\XotData.
 * ----.
 */
class XotData extends Data implements Wireable
{
    use WireableData;
    use Concerns\XotDataProfileThemeAccessors;

    public string $main_module = '';

    public string $param_name = 'noset';

    public string $adm_home = '01';

    public ?string $adm_theme = ''; // ' => 'AdminLTE',

    // public bool $enable_ads;//' => '1',
    public string $primary_lang = 'it';

    public string $pub_theme;

    // ' => 'One',
    public string $search_action = 'it/videos';

    public bool $show_trans_key = false;

    public string $register_type = '0';

    public string $verification_type = '';

    public bool $login_verified = false;

    public bool $force_ssl = false;

    public bool $disable_frontend_dynamic_route = false;

    public bool $disable_admin_dynamic_route = false;

    public bool $disable_database_notifications = true;

    public bool $register_adm_theme = false;

    public bool $register_pub_theme = false;

    public bool $register_collective = false;

    public string $team_class = 'Modules\User\Models\Team'; // = Team::class;

    public string $tenant_class = 'Modules\User\Models\Tenant'; // = Team::class;

    public string $membership_class = 'Modules\User\Models\Membership'; // = Membership::class;

    public string $tenant_pivot_class = 'Modules\User\Models\TenantUser'; // = Membership::class;

    public ?string $super_admin = null;

    public string $video_player = 'html5';

    private static ?self $instance = null;

    private ?ProfileContract $profile = null;

    public static function make(): self
    {
        if (! self::$instance) {
            $data = app(\Modules\Tenant\Actions\Config\GetTenantConfigArrayAction::class)->execute('xra');

            self::$instance = self::from($data);
        }

        return self::$instance;
    }

    public function isSuperAdmin(): bool
    {
        $profile = $this->getProfileModel();
        if ($profile->isSuperAdmin()) {
            return true;
        }

        return false;
    }

    /**
     * @return class-string<Model&UserContract>
     */
    public function getUserClass(): string
    {
        $class = config('auth.providers.users.model');
        Assert::stringNotEmpty($class, 'check config auth');
        Assert::classExists($class, '['.$class.'] check config auth');
        Assert::implementsInterface(
            $class,
            UserContract::class,
            'class '.$class.' not implements UserContract['.__LINE__.']['.class_basename($this).']',
        );
        Assert::isAOf($class, Model::class, '['.__LINE__.']['.class_basename($this).']['.$class.']');

        /* @var class-string<Model&UserContract> $class */
        return $class;
    }

    public function getUserByEmail(string $email): UserContract
    {
        $user_class = $this->getUserClass();
        $userInstance = new $user_class();
        if (! in_array('email', $userInstance->getFillable(), true)) {
            throw new \Exception("Attribute 'email' not found in model ".$userInstance::class);
        }

        /** @var (Model&UserContract)|null $user */
        $user = $user_class::query()->where('email', $email)->first();

        if (null === $user) {
            throw new \Exception('user not found for email '.$email);
        }

        Assert::implementsInterface($user, UserContract::class, '['.__LINE__.']['.class_basename($this).']');

        return $user;
    }

    public function findUserByEmail(string $email): ?UserContract
    {
        $userClass = $this->getUserClass();

        /** @var (Model&UserContract)|null $user */
        $user = $userClass::query()->where('email', $email)->first();

        return $user;
    }

    /**
     * @return class-string<Model&TeamContract>
     */
    public function getTeamClass(): string
    {
        Assert::classExists($this->team_class, '['.__LINE__.']['.class_basename($this).']');
        // Assert::isInstanceOf($team_class, Model::class, '['.__LINE__.']['.class_basename($this).']');
        Assert::isAOf(
            $this->team_class,
            Model::class,
            '['.__LINE__.']['.class_basename($this).']['.$this->team_class.']',
        );
        Assert::implementsInterface(
            $this->team_class,
            TeamContract::class,
            '['.$this->team_class.']['.__LINE__.']['.class_basename($this).']',
        );

        /** @var class-string<Model&TeamContract> $teamClass */
        $teamClass = $this->team_class;

        return $teamClass;
    }

    /**
     * Undocumented function.
     *
     * @return class-string<Model&TenantContract>
     */
    public function getTenantClass(): string
    {
        Assert::classExists(
            $this->tenant_class,
            '['.$this->tenant_class.']['.__LINE__.']['.class_basename($this).']',
        );
        // Assert::isInstanceOf($class, Model::class, '['.__LINE__.']['.class_basename($this).']');
        // Assert::isAOf($class, Model::class, '['.__LINE__.']['.class_basename($this).']['.$class.']');
        Assert::implementsInterface(
            $this->tenant_class,
            TenantContract::class,
            '['.$this->tenant_class.']['.__LINE__.']['.class_basename($this).']',
        );
        Assert::isAOf(
            $this->tenant_class,
            Model::class,
            '['.__LINE__.']['.class_basename($this).']['.$this->tenant_class.']',
        );

        /** @var class-string<Model&TenantContract> $tenantClass */
        $tenantClass = $this->tenant_class;

        return $tenantClass;
    }

    /**
     * @return class-string
     */
    public function getTenantResourceClass(): string
    {
        $class = Str::of($this->tenant_class)
            ->replace('\Models\\', '\Filament\Resources\\')
            ->append('Resource')
            ->toString();
        Assert::classExists($class, '['.$class.']['.__LINE__.']['.class_basename($this).']');

        return $class;
    }

    public function getTenantPivotClass(): string
    {
        Assert::classExists($this->tenant_pivot_class, '['.__LINE__.']['.class_basename($this).']');

        return $this->tenant_pivot_class;
    }

    public function getMembershipClass(): string
    {
        Assert::classExists($this->membership_class, '['.__LINE__.']['.class_basename($this).']');

        return $this->membership_class;
    }

    /**
     * @return class-string<Model&ProfileContract>
     */
    public function getProfileClass(): string
    {
        $class = 'Modules\\'.$this->main_module.'\Models\Profile';

        // Verifica che la classe esista
        Assert::classExists($class, '['.$class.']['.__LINE__.']['.class_basename($this).']');

        // Verifica che sia un Model e implementi ProfileContract
        Assert::isAOf($class, Model::class, '['.__LINE__.']['.class_basename($this).']['.$class.']');
        Assert::implementsInterface(
            $class,
            ProfileContract::class,
            '['.__LINE__.']['.class_basename($this).']['.$class.']',
        );

        /* @var class-string<Model&ProfileContract> $class */
        return $class;
    }
}
