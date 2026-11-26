---
title: "SendMailByRecordAction — contratto"
type: contract
owner: Xot
module: Xot
status: accepted
updated: 2026-11-26
action: "Modules\\Xot\\Actions\\Mail\\SendMailByRecordAction"
qmd: "SendMailByRecordAction invio mail record email allegato PDF SmtpData myLogs sendMail msg option log authId"
---

# SendMailByRecordAction

Invia una mail a un record con oggetto e corpo letti dal record, allega il PDF del modello e registra l'invio nei log.

Codice: `app/Actions/Mail/SendMailByRecordAction.php:19-104` (`execute()` a riga 29).

## Input

- `Model $record`: deve avere `email` non vuota e il metodo `myLogs()`.
- `string $mailClass`: verificato con `Assert::classExists`, poi non usato.

## Output

`void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| `XOT-MAIL-RECORD-INV-1` | Un record senza `email` (assente, nulla o vuota) lancia `InvalidArgumentException('Model must have email property')` prima di generare il PDF e prima di inviare (righe 44-46). | `XOT-MAIL-RECORD-INV-1` |
| `XOT-MAIL-RECORD-INV-2` | La classe `$mailClass` deve esistere (`Assert::classExists`, riga 31) ma non è usata per costruire il messaggio: il Mailable è commentato (righe 35-41). | — (non dimostrato) |
| `XOT-MAIL-RECORD-INV-3` | Un record senza metodo `myLogs` lancia `InvalidArgumentException` prima dell'invio (righe 48-50). | — (non dimostrato) |
| `XOT-MAIL-RECORD-INV-4` | Oggetto e corpo sono letti con `msg('mail_oggetto')` / `msg('mail_testo')` se il metodo esiste, altrimenti con `option(...)`, altrimenti `InvalidArgumentException` (righe 57-65); un valore non stringa diventa stringa vuota (righe 70-75); una email non stringa lancia `InvalidArgumentException` (righe 67-69). | — (non dimostrato) |
| `XOT-MAIL-RECORD-INV-5` | Il PDF del modello è generato con `PdfByModelAction` in modalità `path` e allegato; un percorso non stringa lancia `InvalidArgumentException` (righe 77-90). | — (non dimostrato) |
| `XOT-MAIL-RECORD-INV-6` | Ordine: generazione PDF, invio SMTP (`SmtpData::make()->send`, riga 91), poi scrittura del log `sendMail` con `authId()` (righe 94-102). Se la scrittura del log fallisce, la mail è già partita. | — (non dimostrato) |

ID precedenti (prefisso `MAIL-REC-INV-`, mai citati altrove, riordinati per allinearli al group presente nel test): il numero 2 è ora `XOT-MAIL-RECORD-INV-1`, il numero 1 è ora `XOT-MAIL-RECORD-INV-2`, gli altri hanno lo stesso numero.

## Effetti collaterali

Scrittura di un PDF in disco (disco `cache`, tramite `PdfByModelAction`). Invio SMTP tramite `SmtpData` (esterno, non annullabile). Insert in `myLogs`. Nessuna transazione: nessun rollback se un passo fallisce dopo l'invio.

## Errori

`InvalidArgumentException` per record non validi; errori SMTP e di PDF si propagano prima del log, quindi il tentativo non viene registrato.

## Non fa

- Non usa il Mailable indicato da `$mailClass`.
- Se oggetto o corpo non sono stringhe la mail parte con valori vuoti.
- Non gestisce retry né deduplica.
- Il codice contiene un indirizzo di debug commentato: non va riattivato.
