<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Modello tenant di un pannello che decide da solo chi ne fa parte.
 *
 * Di default i tenant dei pannelli sono `XotData::getTenantClass()` e l'appartenenza e' la pivot
 * del modulo User (`HasTenants::tenants()`). Un pannello che usa un altro modello tenant
 * (`XotBasePanelProvider::$tenantModel`, es. la sede di un ristorante) implementa questo contratto:
 * `HasTenants` delega qui la lista dello switcher e il controllo d'accesso sull'URL.
 *
 * @see https://filamentphp.com/docs/5.x/users/tenancy
 */
interface PanelTenantContract
{
    /**
     * Tenant del pannello accessibili all'utente (alimenta lo switcher di Filament).
     *
     * @return Collection<int, Model>
     */
    public static function getTenantsOfUser(Model $user): Collection;

    /**
     * Controllo di sicurezza: l'utente puo' entrare in questo tenant (anche cambiando l'URL).
     */
    public function hasTenantMember(Model $user): bool;
}
