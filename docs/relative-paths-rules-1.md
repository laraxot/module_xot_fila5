# Regole per i Percorsi Relativi nella Documentazione

> **Collegamenti correlati**
<<<<<<< .merge_file_ELYpDX
<<<<<<< HEAD
<<<<<<< HEAD
> - [README.md documentazione generale](../../../../docs/readme.md)
=======
<<<<<<< HEAD
<<<<<<< HEAD
> - [README.md documentazione generale](../../../../docs/readme.md)
=======
> - [README.md documentazione generale](../../../../../docs/readme.md)
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
> - [README.md documentazione generale](../../../../../docs/readme.md)
>>>>>>> 3792da0d (Check & fix styling)
=======
> - [README.md documentazione generale](../../../../docs/readme.md)
>>>>>>> .merge_file_67frZk
> - [Struttura dei Prompt](./prompts.md)
> - [Regole per i Prompt](./prompt_rules.md)
> - [README.md toolkit bashscripts](../../../../bashscripts/docs/readme.md)
=======
> - [README.md documentazione generale](../../../../docs/README.md)
> - [Struttura dei Prompt](./prompts.md)
> - [Regole per i Prompt](./PROMPT_RULES.md)
> - [README.md toolkit bashscripts](../../../../bashscripts/docs/README.md)
>>>>>>> 930f8146 (Check & fix styling)

## Regola Fondamentale

**MAI UTILIZZARE PERCORSI ASSOLUTI NEI LINK DELLA DOCUMENTAZIONE. SEMPRE UTILIZZARE PERCORSI RELATIVI.**

Questa regola è fondamentale per garantire la portabilità della documentazione e il corretto funzionamento dei link indipendentemente dall'ambiente di installazione.

## Percorsi Corretti

### Da un file nella root del progetto verso un modulo

```markdown
<<<<<<< HEAD
[Modulo Xot](./laravel/modules/xot/docs/readme.md)
=======
[Modulo Xot](./laravel/Modules/Xot/docs/README.md)
>>>>>>> 930f8146 (Check & fix styling)
```

### Da un file in un modulo verso un altro modulo

```markdown
<<<<<<< HEAD
[Altro Modulo](../../../altromodulo/docs/readme.md)
=======
[Altro Modulo](../../../AltroModulo/docs/README.md)
>>>>>>> 930f8146 (Check & fix styling)
```

### Da un file in un modulo verso la root

```markdown
<<<<<<< .merge_file_ELYpDX
<<<<<<< HEAD
<<<<<<< HEAD
[Documentazione Root](../../../../docs/readme.md)
=======
<<<<<<< HEAD
<<<<<<< HEAD
[Documentazione Root](../../../../docs/readme.md)
=======
[Documentazione Root](../../../../../docs/readme.md)
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
[Documentazione Root](../../../../../docs/readme.md)
>>>>>>> 3792da0d (Check & fix styling)
=======
[Documentazione Root](../../../../docs/readme.md)
>>>>>>> .merge_file_67frZk
=======
=======
[Documentazione Root](../../../../docs/README.md)
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
```

## Errori Comuni da Evitare

1. **MAI utilizzare percorsi assoluti** come:
   ```markdown
<<<<<<< HEAD
   [ERRATO](../xot/docs/readme.md)
=======
   [ERRATO](../Xot/docs/README.md)
>>>>>>> 930f8146 (Check & fix styling)
   ```

2. **MAI utilizzare percorsi che iniziano con /**:
   ```markdown
<<<<<<< HEAD
   [ERRATO](/docs/readme.md)
   [ERRATO](/laravel/modules/xot/docs/readme.md)
=======
   [ERRATO](/docs/README.md)
   [ERRATO](/laravel/Modules/Xot/docs/README.md)
>>>>>>> 930f8146 (Check & fix styling)
   ```

3. **MAI utilizzare percorsi che non tengono conto della posizione relativa del file sorgente**:
   ```markdown
<<<<<<< HEAD
   [ERRATO](modules/xot/docs/readme.md) <!-- Da un file nella root -->
   [ERRATO](../xot/docs/readme.md) <!-- Da un file in un modulo, senza contare correttamente i livelli -->
=======
   [ERRATO](Modules/Xot/docs/README.md) <!-- Da un file nella root -->
   [ERRATO](../Xot/docs/README.md) <!-- Da un file in un modulo, senza contare correttamente i livelli -->
>>>>>>> 930f8146 (Check & fix styling)
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
| `/docs/README.md` | `/laravel/Modules/Xot/docs/README.md` | `./laravel/Modules/Xot/docs/README.md` |
<<<<<<< .merge_file_ELYpDX
<<<<<<< HEAD
<<<<<<< HEAD
| `/laravel/Modules/Xot/docs/README.md` | `/docs/README.md` | `../../../../docs/README.md` |
=======
<<<<<<< HEAD
<<<<<<< HEAD
| `/laravel/Modules/Xot/docs/README.md` | `/docs/README.md` | `../../../../docs/README.md` |
=======
| `/laravel/Modules/Xot/docs/README.md` | `/docs/README.md` | `../../../../../docs/README.md` |
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
| `/laravel/Modules/Xot/docs/README.md` | `/docs/README.md` | `../../../../../docs/README.md` |
>>>>>>> 3792da0d (Check & fix styling)
=======
| `/laravel/Modules/Xot/docs/README.md` | `/docs/README.md` | `../../../../docs/README.md` |
>>>>>>> .merge_file_67frZk
=======
=======
| `/laravel/Modules/Xot/docs/README.md` | `/docs/README.md` | `../../../../docs/README.md` |
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
| `/laravel/Modules/Xot/docs/README.md` | `/laravel/Modules/User/docs/README.md` | `../../../User/docs/README.md` |
| `/laravel/Modules/Xot/docs/structure.md` | `/laravel/Modules/Xot/docs/README.md` | `./README.md` |

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
<<<<<<< .merge_file_ELYpDX
<<<<<<< HEAD
<<<<<<< HEAD
- [Relative vs Absolute URLs](https://www.w3.org/TR/WD-html40-970917/htmlweb.html#h-5.1.2)
=======
<<<<<<< HEAD
<<<<<<< HEAD
- [Relative vs Absolute URLs](https://www.w3.org/TR/WD-html40-970917/htmlweb.html#h-5.1.2)
=======
- [Relative vs Absolute URLs](https://www.w3.org/TR/WD-html40-970917/htmlweb.html#h-5.1.2)
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
- [Relative vs Absolute URLs](https://www.w3.org/TR/WD-html40-970917/htmlweb.html#h-5.1.2)
>>>>>>> 3792da0d (Check & fix styling)
=======
- [Relative vs Absolute URLs](https://www.w3.org/TR/WD-html40-970917/htmlweb.html#h-5.1.2)
>>>>>>> .merge_file_67frZk
=======
=======
- [Relative vs Absolute URLs](https://www.w3.org/TR/WD-html40-970917/htmlweb.html#h-5.1.2)
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
