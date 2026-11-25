---
id: actor-user-manuals
title: "Manuali d'uso per attori di moduli e temi"
type: story
status: complete
owner: module:Xot
created: 2026-11-23
updated: 2026-11-23
tags: [docs, manuals, roles, permissions, bmad, second-brain]
qmd: "actor user manuals story manuali duso"
---
# Manuali d'uso per attori di moduli e temi

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

## Scopo

Ogni modulo e tema deve avere in `docs/manuale-uso-attori.md` un manuale operativo verificabile. Il manuale descrive cosa può
fare ogni attore reale — ospite, utente normale, utente appartenente a un gruppo/team, admin e super-admin — quali
prerequisiti servono, quali dati modifica e dove verificare il risultato.

## Regola di verità

Un ruolo viene documentato solo se è dimostrato da policy, gate, Filament resource, middleware, test o configurazione.
Le capacità non ancora dimostrate sono marcate `Da verificare`, mai presentate come garantite.
I temi documentano l'esperienza e i punti di ingresso; i moduli documentano la responsabilità applicativa.

## Criteri di accettazione

- esiste un manuale actor-oriented in `docs/` per ogni modulo e tema attivo o mantenuto;
- ogni manuale contiene la matrice degli attori, prerequisiti, flussi principali e limiti;
- i manuali non duplicano contratti tecnici: rimandano a ADR, policy, story e test owner;
- ogni link locale è verificabile e ogni aggiornamento riporta la data nella frontmatter, non nel filename;
- il manuale distingue chiaramente comportamento verificato da comportamento pianificato.

## Coordinamento

- Lead: inventario e integrazione dei manuali.
- Moduli: responsabilità, ruoli, permessi, dati e flussi.
- Temi: navigazione, accessibilità, superfici guest/logged/admin e limiti visuali.

## Esito

Prima ondata: manuali owner-localizzati per i 20 moduli e i 4 temi presenti nel workspace.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
