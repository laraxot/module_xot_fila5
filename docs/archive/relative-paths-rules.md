# Regole per i Percorsi Relativi nella Documentazione

> **Collegamenti correlati**
<<<<<<< HEAD
<<<<<<< HEAD
> - [README.md documentazione generale](../../../../project_docs/readme.md)
> - [Struttura dei Prompt](./prompts.md)
> - [Regole per i Prompt](./prompt_rules.md)
> - [README.md toolkit bashscripts](../../../../bashscripts/project_docs/readme.md)
=======
> - [README.md documentazione generale](../../../../docs/README.md)
> - [Struttura dei Prompt](./prompts.md)
> - [Regole per i Prompt](./PROMPT_RULES.md)
> - [README.md toolkit bashscripts](../../../../bashscripts/docs/README.md)
>>>>>>> a01602c7 (.)
=======
> - [README.md documentazione generale](../../../../project_docs/readme.md)
> - [Struttura dei Prompt](./prompts.md)
> - [Regole per i Prompt](./prompt_rules.md)
> - [README.md toolkit bashscripts](../../../../bashscripts/project_docs/readme.md)
>>>>>>> 64619e34 (.)

## Regola Fondamentale

**MAI UTILIZZARE PERCORSI ASSOLUTI NEI LINK DELLA DOCUMENTAZIONE. SEMPRE UTILIZZARE PERCORSI RELATIVI.**

Questa regola è fondamentale per garantire la portabilità della documentazione e il corretto funzionamento dei link indipendentemente dall'ambiente di installazione.

## Percorsi Corretti

### Da un file nella root del progetto verso un modulo

```markdown
<<<<<<< HEAD
<<<<<<< HEAD
[Modulo Xot](./laravel/modules/xot/project_docs/readme.md)
=======
[Modulo Xot](./laravel/Modules/Xot/docs/README.md)
>>>>>>> a01602c7 (.)
=======
[Modulo Xot](./laravel/modules/xot/project_docs/readme.md)
>>>>>>> 64619e34 (.)
```

### Da un file in un modulo verso un altro modulo

```markdown
<<<<<<< HEAD
<<<<<<< HEAD
[Altro Modulo](../../../altromodulo/project_docs/readme.md)
=======
[Altro Modulo](../../../AltroModulo/docs/README.md)
>>>>>>> a01602c7 (.)
=======
[Altro Modulo](../../../altromodulo/project_docs/readme.md)
>>>>>>> 64619e34 (.)
```

### Da un file in un modulo verso la root

```markdown
<<<<<<< HEAD
<<<<<<< HEAD
[Documentazione Root](../../../../project_docs/readme.md)
=======
[Documentazione Root](../../../../docs/README.md)
>>>>>>> a01602c7 (.)
=======
[Documentazione Root](../../../../project_docs/readme.md)
>>>>>>> 64619e34 (.)
```

## Errori Comuni da Evitare

1. **MAI utilizzare percorsi assoluti** come:
   ```markdown
<<<<<<< HEAD
<<<<<<< HEAD
   [ERRATO](modules/xot/project_docs/readme.md)
=======
   [ERRATO](../Xot/docs/README.md)
>>>>>>> a01602c7 (.)
=======
   [ERRATO](modules/xot/project_docs/readme.md)
>>>>>>> 64619e34 (.)
   ```

2. **MAI utilizzare percorsi che iniziano con /**:
   ```markdown
<<<<<<< HEAD
<<<<<<< HEAD
   [ERRATO](/project_docs/readme.md)
   [ERRATO](/laravel/modules/xot/project_docs/readme.md)
=======
   [ERRATO](/docs/README.md)
   [ERRATO](/laravel/Modules/Xot/docs/README.md)
>>>>>>> a01602c7 (.)
=======
   [ERRATO](/project_docs/readme.md)
   [ERRATO](/laravel/modules/xot/project_docs/readme.md)
>>>>>>> 64619e34 (.)
   ```

3. **MAI utilizzare percorsi che non tengono conto della posizione relativa del file sorgente**:
   ```markdown
<<<<<<< HEAD
<<<<<<< HEAD
   [ERRATO](modules/xot/project_docs/readme.md) <!-- Da un file nella root -->
   [ERRATO](../xot/project_docs/readme.md) <!-- Da un file in un modulo, senza contare correttamente i livelli -->
=======
   [ERRATO](Modules/Xot/docs/README.md) <!-- Da un file nella root -->
   [ERRATO](../Xot/docs/README.md) <!-- Da un file in un modulo, senza contare correttamente i livelli -->
>>>>>>> a01602c7 (.)
=======
   [ERRATO](modules/xot/project_docs/readme.md) <!-- Da un file nella root -->
   [ERRATO](../xot/project_docs/readme.md) <!-- Da un file in un modulo, senza contare correttamente i livelli -->
>>>>>>> 64619e34 (.)
   ```

## Come Calcolare Correttamente i Percorsi Relativi

1. **Identifica la posizione del file sorgente** (il file che contiene il link)
2. **Identifica la posizione del file destinazione** (il file a cui vuoi linkare)
3. **Calcola il percorso relativo** contando i livelli di directory da attraversare:
   - Usa `../` per salire di un livello
   - Concatena i nomi delle directory da attraversare

### Esempi Pratici

| Posizione File Sorgente | Posizione File Destinazione | Percorso Relativo Corretto |
|-------------------------|------------------------------|----------------------------|
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 64619e34 (.)
| `/project_docs/README.md` | `/laravel/Modules/Xot/project_docs/README.md` | `./laravel/Modules/Xot/project_docs/README.md` |
| `/laravel/Modules/Xot/project_docs/README.md` | `/project_docs/README.md` | `../../../../project_docs/README.md` |
| `/laravel/Modules/Xot/project_docs/README.md` | `/laravel/Modules/User/project_docs/README.md` | `../../../User/project_docs/README.md` |
| `/laravel/Modules/Xot/project_docs/structure.md` | `/laravel/Modules/Xot/project_docs/README.md` | `./README.md` |
<<<<<<< HEAD
=======
| `/docs/README.md` | `/laravel/Modules/Xot/docs/README.md` | `./laravel/Modules/Xot/docs/README.md` |
| `/laravel/Modules/Xot/docs/README.md` | `/docs/README.md` | `../../../../docs/README.md` |
| `/laravel/Modules/Xot/docs/README.md` | `/laravel/Modules/User/docs/README.md` | `../../../User/docs/README.md` |
| `/laravel/Modules/Xot/docs/structure.md` | `/laravel/Modules/Xot/docs/README.md` | `./README.md` |
>>>>>>> a01602c7 (.)
=======
>>>>>>> 64619e34 (.)

## Verifica dei Link

Prima di committare modifiche alla documentazione:

1. **Verifica manualmente** che i link relativi siano corretti
2. **Conta attentamente i livelli di directory** quando crei link tra moduli
3. **Testa i link** in un ambiente locale per assicurarti che funzionino correttamente

## Importanza della Portabilità

L'uso di percorsi relativi garantisce che la documentazione funzioni correttamente:
- In ambienti di sviluppo diversi
- In installazioni con path di base diversi
- In repository clonati in posizioni diverse
- In sistemi operativi diversi

## Riferimenti

- [Markdown Link Syntax](https://www.markdownguide.org/basic-syntax/#links)
- [Relative vs Absolute URLs](https://www.w3.org/TR/WD-html40-970917/htmlweb.html#h-5.1.2)
