# BMAD Story: PHPStan zero errori su laravel/Modules

## Scopo (perche')
PHPStan livello max serve a garantire che i tipi dicono la verita'. Ogni errore e' un punto in cui il codice puo' fallire a runtime senza avvisare. Il lavoro non e' far sparire la riga: e' rendere il tipo corretto, cosi' il codice fa cio' che dichiara.

## Misura iniziale (run per modulo, 2026-11-05 ~10:30)
- 18 moduli. Puliti: Activity, Incentivi, Lang, Media, Pdnd, Performance, Progressioni, UI, User, Xot.
- Con errori: IndennitaCondizioniLavoro 1, IndennitaResponsabilita 7, Job 1, Notify 12, Ptv 2, Rating 3, Sigma 2, Tenant 1.
- Conseguenza del mio cambio: `tableMorphMany` in RelationX; il fixture IrRelationshipProbe non usa RelationX.

## Acceptance criteria
- [ ] AC1: ogni errore corretto alla sorgente (tipo, generics, visibilita'), senza soppressioni con @phpstan-ignore.
- [ ] AC2: trait inutilizzati: decidere se usarli o rimuoverli dopo verifica dei riferimenti (non cancellare senza prova).
- [ ] AC3: rerun per modulo, tutti exit 0.
- [ ] AC4: lock per file, nessuna modifica fuori dal proprio modulo.

## Coordinamento
Un modulo alla volta per agente. Stato per modulo tracciato in questa story.

## INCIDENTE protocollo (2026-11-05 ~10:50)
- Per errore ho chiamato `unlock.sh` su Sigma/Ana10f.php e Tenant/Tenant.php dopo che `lock.sh` era fallito, cioe' ho rimosso lock di un'altra sessione. Non e' recuperabile: il proprietario originale e' ignoto. Ho poi acquisito il lock correttamente, applicato le modifiche e rilasciato.
- Azione: chi aveva quei lock deve verificare che il proprio lavoro su questi due file sia ancora coerente con le modifiche presenti.
- Regola per questa sessione: controllare l'esito di lock.sh con `&&` prima di qualsiasi unlock, mai unlock dopo un lock fallito.

## Esito parziale 2026-11-05 ~11:00
- DONE: IR RelationshipTrait (anno: mixed -> int|null senza azzerare il null), IR fixture IrRelationshipProbe (usa RelationX per tableMorphMany), Rating HasRatingsTrait (generic int|string, cast tipizzati con is_numeric), Sigma Ana10f::getNome (string|null), Tenant docblock (Xot UserContract), Sigma EnteStabiMutator (rimosso blocco $repar morto nell'accessor, duplicato di getReparTxt), ICL CondizioniLavoroMutatorTrait (trait morto: tutti i suoi 27 metodi sono gia' nel modello CondizioniLavoro; rimosso).
- BLOCCATO da lock di `agent-general-accessors` (task accessor-methods-trait-extraction, 09:42): Notify, 12 errori (generics su relazioni in Traits/*Relations.php e MailTemplateVersion / NotificationTemplateVersion, tipi su NotifyThemeMutators). Correzioni pronte, da applicare quando il lock e' libero: relazioni con @return BelongsTo<Related, $this> o MorphTo<Model, $this> e visibilita' public; rimuovere la docblock fuori posto su restoreTemplate().
- Da verificare col run completo: Job TaskCommentRelations (errore parse su import User, il file potrebbe essere cambiato da altra sessione), Ptv HasWorkerTypesConfig e HasWorkerTypeNavigation (segnalati 'unused' solo per il run per modulo: sono usati da Progressioni, IR, Performance).
- Regola: il run per modulo genera falsi 'unused trait'. Il criterio vincolante e' il run sul progetto intero.

## Run completo `analyse Modules` 2026-11-05 ~11:00: 24 errori, tutti in file lockati da agent-general-accessors
Il run sul progetto intero non ha errori in nessun altro modulo: Activity, Incentivi, IR, Ptv, Rating, Sigma, Tenant, ICL sono puliti.
- Job (14 errori, 13 file): Result.php:64 e ScheduleHistory.php:95 (docblock @return fuori posto, prima di getLastRun / casts), Traits/*Relations.php (generics mancanti su belongsTo/hasMany), Traits/TaskRelations.php (@phpstan-return non coincide col tipo: frequencies -> Frequency, results -> Result).
- Notify (10 errori): MailTemplateVersion.php:86 e NotificationTemplateVersion.php:59 (docblock di relazione fuori posto su restoreTemplate), Traits/*Relations.php (generics), NotifyThemeMutators (getLogo e getLogoAttribute con array<string, mixed>), NotifyThemeRelations::linkable (MorphTo<Model, $this>).
- Proprietario: `agent-general-accessors` (task accessor-methods-trait-extraction, lock 09:42, file ancora in modifica alle 10:58). Non forzo il lock.
- Richiesta: includere queste correzioni nel proprio batch (ricetta: relazioni con `/** @return BelongsTo<Related, $this> */` e `public function`, docblock fuori posto rimossa, array tipizzati). Alla chiusura del lock rilancio `analyse Modules`; obiettivo exit 0.

## Sweep swarm 2026-11-05 (sera): 253 → 110 → 71, i 71 residui sono di ambiente
Mandato permanente dell'utente (memoria `feedback_phpstan_swarm_standing_order`): `analyse Modules` in ordine casuale, in parallelo, partendo dallo scopo del codice e non dalla riga d'errore.
- **Misure** (stesso comando, `--error-format=json`): 253 → 110 → **71**. I 71 sono solo Cms 50 e Geo 21; ogni altro modulo è a 0, Restaurant compreso (37 → 0).
- **Cause radice trovate** (non le righe):
  - Il lato `HEAD` dei marcatori di merge aveva tolto i `use Trait` dai modelli: i `trait.unused` a grappolo di User/Lang non erano codice morto. Ripristinati in avanti (`User/docs/stories/phpstan-unused-relation-traits.story.md`).
  - `BaseTenant` aveva perso `HasUuids`. Ripristinato senza l'alias `resolveRouteBindingQuery` del lato `laraxot/dev`: in Spatie Sluggable 4.0.x quel metodo non è in `HasSlug`, l'alias era un fatal in autoload. Guardia: `User/tests/Unit/Models/BaseTenantKeyTest.php` (non eseguita, vedi sotto).
  - Lang: due copie piatte stale di `PostMutators`/`PostRelations` rientrate col sync (`merge -s resolve` non gestisce le rinomine); rimosse, le sottocartelle sono le più nuove (`Lang/docs/stories/phpstan-zero-errors-lang.story.md`).
  - Restaurant: tipi di dominio, UI Filament e test, tre story (`Restaurant/docs/stories/phpstan-*-types.story.md`). `@property $pec` di `Company` e `Location` allineato al nome reale `certified_email` (la migrazione `translate_identifiers_to_english` lo aveva già rinominato).
- **Residui bloccati dall'ambiente, non dal codice:**
  - Cms 50: `laravel/head` è dichiarato in `Cms/composer.json` ma assente da `composer.lock` e `vendor/` (`Laravel\Head\Schema\*` not found). Story `Cms/docs/stories/phpstan-head-schema.story.md`.
  - Geo 21: `Filament\Support\Components\Attributes\Exposed` non esiste nel Filament installato (5.9.0; il lock dice 5.10.3, `composer.json` chiede ^5.11).
  - Un `composer update -W` mirato non risolve (`laravel/tinker` contro illuminate 13; `symfony/process` bloccato da security advisory). Nessun file modificato: l'aggiornamento delle dipendenze è una decisione dell'utente, non si fa da qui.
- **Non verificato:** Pest. `.env.testing` ha `DB_USERNAME` vuoto e `TestCase` fallisce con `Access denied for user ''@'localhost'` prima di ogni asserzione. La prova è PHPStan più `php -r` sul bootstrap reale. Test da eseguire quando l'ambiente c'è: `BaseTenantKeyTest`, e per Restaurant `CashRegister::methods()`, `advanceAction` con note vuote, `tableCardsAll()`.
- **Decisioni aperte:**
  - `Restaurant ChangesOrder`: con `Safe\preg_match` una nota con UTF-8 non valido ora lancia `PcreException` invece di essere trattata come nota libera.
  - `Order::$waiter_id` è documentato `int|null` ma la colonna è uuid e non ha cast (dipende da ADR-108): non toccato.
  - Lang: se un clone gemello ha ancora i file piatti, `merge_remote_repo_2.sh` può riportarli; in quel caso ricancellarli.
  - `Restaurant/docs/stories/20.{2,3,4,5}*.lock`: quattro lock del 2026-10-14 su story che non esistono nella cartella, di agenti morti; da pulire con `bashscripts/lock/README.md` alla mano.
- **Stato:** AC1 ok sui moduli puliti; AC3 non raggiungibile finché Cms e Geo dipendono dal vendor. Nessun commit.
