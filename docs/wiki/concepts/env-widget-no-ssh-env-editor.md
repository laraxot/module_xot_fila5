---
title: "EnvWidget — editor .env da pannello admin, nessun SSH/FTP richiesto"
type: concept
status: canonical
module: Xot
created: 2026-09-17
updated: 2026-09-17
tags: [env, widget, filament, config, deploy, no-ssh, artisan-commands-manager]
qmd: "EnvWidget EnvData env editor no ssh no ftp config cache artisan commands manager sms_driver"
related:
  - ../../../../Notify/docs/wiki/concepts/sms-channel-driver-selection.md
  - ./artisan-migrate-no-force.md
---

# `EnvWidget` — modificare il `.env` di produzione senza SSH/FTP

## Problema che risolve

Su un server di produzione senza accesso SSH/FTP, non c'è modo di aprire il file
`.env` a mano. `EnvWidget` (`Modules\Xot\Filament\Widgets\EnvWidget`) è un widget
Filament che legge e riscrive `.env` **dal processo PHP della richiesta web
stessa** — chi ha accesso al pannello admin può cambiare variabili d'ambiente
senza toccare il filesystem del server con altri strumenti.

## Come funziona

- [`EnvData`](../../../app/Datas/EnvData.php) (`Spatie\LaravelData\Data`) dichiara un
  set **fisso** di proprietà pubbliche (una per variabile esposta, minuscolo:
  `app_url`, `debugbar_enabled`, `google_maps_api_key`, `telegram_bot_token`,
  `sms_driver`, `netfun_token`, …).
  - `EnvData::make()` legge `$_ENV`, abbassa le chiavi e costruisce l'istanza
    via `self::from($data)` — Spatie Data ignora le chiavi non dichiarate come
    proprietà, quindi **solo le variabili con una proprietà dedicata sono
    leggibili/scrivibili**, non tutto `.env`.
  - `EnvData::update(array $data)` confronta ogni valore passato con quello
    corrente e, se diverso, riscrive la riga `CHIAVE=valore` dentro
    `base_path('.env')` (`File::get()` + `File::put()`), o la aggiunge in coda
    se la chiave non esiste ancora. I valori stringa vengono scritti tra
    doppi apici (`CHIAVE="valore"`) — sintassi valida per dotenv.
- [`EnvWidget`](../../../app/Filament/Widgets/EnvWidget.php) espone un form
  Filament sopra `EnvData`. `getFormSchema()` costruisce **tutti** i campi
  possibili in `$all`, poi filtra con la proprietà pubblica `only` (passata da
  chi istanzia il widget) — così ogni pagina mostra solo il sottoinsieme
  pertinente. `submit()` chiama `EnvData::make()->update($this->data)` e
  mostra una notifica di conferma.
- Ogni modulo con una pagina "Impostazioni" (`XotBasePage`) monta il widget con
  il proprio `only`, es. [`Notify\SettingPage`](../../../../Notify/app/Filament/Pages/SettingPage.php):

  ```php
  public function getHeaderWidgets(): array
  {
      $only = ['debugbar_enabled', 'telegram_bot_token', 'sms_driver', 'netfun_token'];

      return [EnvWidget::make(['only' => $only])];
  }
  ```

## Aggiungere una nuova variabile editabile

Non basta che la chiave esista in `.env`: va dichiarata esplicitamente, in tre punti.

1. **`EnvData`** — nuova proprietà pubblica, minuscolo, stesso nome della
   variabile (`SMS_DRIVER` → `sms_driver`). Valore di default sensato (di
   solito stringa vuota) per il caso in cui la variabile non sia ancora nel
   `.env`.
2. **`EnvWidget::getFormSchema()`** — nuova voce nell'array `$all`, chiave
   uguale alla proprietà. Preferire un `Select` con opzioni chiuse quando il
   valore valido è un enum applicativo (es. `sms_driver`: solo i driver
   effettivamente mappati in `SmsActionFactory`) — un `TextInput` libero
   permette refusi che rompono silenziosamente la funzionalità solo al primo
   invio reale.
3. **La pagina `SettingPage` del modulo interessato** — aggiungere la chiave
   al proprio array `only`. Senza questo passo il campo esiste nel widget ma
   non compare in nessuna pagina.

Esempio reale: `sms_driver` aggiunto il 2026-09-17 per permettere di cambiare
`config('sms.default')` (`SMS_DRIVER`, vedi
[Notify — sms-channel-driver-selection](../../../../Notify/docs/wiki/concepts/sms-channel-driver-selection.md))
dal pannello admin di Notify, perché il `.env` di produzione non è
raggiungibile via SSH/FTP. Punto di partenza: [issue module_quaeris_fila5#38](https://github.com/laraxot/module_quaeris_fila5/issues/38).
Stesso giorno, aggiunto anche `netfun_token` (`TextInput` semplice, non un
`Select`: il valore è una stringa libera fornita dal provider, non un enum
applicativo) — stesso motivo pratico: senza SSH, l'unico modo per **verificare**
cosa c'è oggi in `NETFUN_TOKEN` in produzione (non solo per scriverlo) è
vederlo pre-compilato in questo campo, dato che `mount()` carica sempre il
valore corrente da `$_ENV` prima che l'utente tocchi nulla.

**Nota sicurezza**: `netfun_token` (come già `telegram_bot_token` prima)
compare in chiaro nel form, senza mascheramento — coerente con gli altri
campi-segreto già esposti da questo widget, ma da tenere presente: chiunque
abbia accesso alla pagina Impostazioni di Notify vede il token in chiaro.

## Dopo il salvataggio: la config cache

`EnvWidget` scrive il `.env` su disco, ma se in produzione è stato eseguito
`php artisan config:cache`, Laravel legge la configurazione dal file cache
compilato, **non** da `.env` — la modifica resta invisibile finché la cache
non viene rigenerata.

Stesso vincolo di accesso: nessun SSH per lanciare `php artisan config:cache`
a mano. Soluzione già disponibile — [`ArtisanCommandsManager`](../../../app/Filament/Pages/ArtisanCommandsManager.php)
(modulo Xot) ha un bottone **"config:cache"** che esegue il comando reale
tramite [`ExecuteArtisanCommandAction`](../../../app/Actions/ExecuteArtisanCommandAction.php)
(whitelist fissa di comandi consentiti, nessun input arbitrario). Sequenza
completa senza SSH/FTP per cambiare una variabile d'ambiente in produzione:

1. Pagina Impostazioni del modulo (usa `EnvWidget`) → cambia il valore → Salva.
2. `Artisan Commands Manager` (Xot) → bottone **config:cache**.

Il bottone è idempotente e sicuro anche se la config non era cache-ata in
produzione — rigenera comunque la cache dal `.env` corrente.

## Limiti noti

- Il set di variabili editabili è **statico e cablato in `EnvData`/`EnvWidget`**,
  non uno scanner generico di `.env` — coerente con la scelta di sicurezza
  (nessun editor libero di chiave/valore arbitrario esposto in produzione).
- `EnvData::update()` scrive solo le chiavi il cui valore è cambiato rispetto
  a quello letto da `$_ENV` all'apertura del form — se il form resta aperto a
  lungo mentre qualcun altro modifica `.env` altrove, il salvataggio può
  sovrascrivere quella modifica esterna con il valore "vecchio" per quella
  proprietà (comportamento condiviso da qualunque form basato su uno snapshot
  caricato al `mount()`).
- I file di traduzione `Modules/Xot/lang/{it,en,de}/env.php` descrivono un
  concetto più ampio (CRUD chiave/valore/tipo/ambiente con backup/restore) mai
  collegato a questo widget — `EnvWidget.php` non chiama `__()` da nessuna
  parte, sono etichette hardcoded nel widget stesso. Non usarli come
  riferimento per capire cosa fa `EnvWidget` oggi.
