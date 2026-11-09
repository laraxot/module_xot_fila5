---
<<<<<<< HEAD
title: Aggiornare Mysql a 8.0
description: Aggiornare Mysql a 8.0
extends: _layouts.documentation
section: content
type: note
status: draft
updated: 2026-10-22
tags: [docs, xot, laragon]
qmd: "aggiornare mysql a 8.0 {#update-mysql-to-8-0} xot"
---

# Aggiornare Mysql a 8.0 {#update-mysql-to-8-0}

Articolo di riferimento https://gist.github.com/meorajrul/b57803bf1b4ddfd2f93e6ad37c3ac5f2  

* scaricare la versione di mysql 8.0.30 tramite link https://downloads.mysql.com/archives/get/p/23/file/mysql-8.0.30-winx64.zip  
* Decomprimere il file inC:\laragon\bin\mysql  
* Apri la riga di comando di Laragon e passa a quella cartella C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin  
* Esegui comando  
  ```php 
  mysqld --initialize-insecure 
  ```

* Fare clic con il tasto destro su Laragon Tray e passare alla versione MySQL 8.*  
* Avvia i servizi  
* Apri HeidiSQL o uno qualsiasi dei tuoi IDE DB e inizia ad accedere alla tabella
=======
title: "Aggiornare MySQL a 8.0 su Laragon (alias)"
type: alias
status: superseded
module: Xot
updated: 2026-11-06
canonical: "wiki/laragon/update-mysql-aggiornare.md"
superseded_by: "../wiki/laragon/update-mysql-aggiornare.md"
tags: [docs, xot, laragon]
qmd: "update-mysql-aggiornare alias superseded laragon"
---

# Aggiornare MySQL a 8.0 su Laragon

Il testo di questo file e' identico al canonico: [update-mysql-aggiornare.md](../wiki/laragon/update-mysql-aggiornare.md),
che ora contiene i passi riordinati e corretti. Qui non ci sono istruzioni: segui il file collegato.
>>>>>>> laraxot/dev
