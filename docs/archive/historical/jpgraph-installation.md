---
title: "Installazione di JpGraph"
module: "Xot"
type: how-to
tags: [jpgraph, installation]
created: 2026-07-14
updated: 2026-07-14
qmd: "jpgraph installation"
related:
  - "./eloquent-magic-properties-rule.md"
---
# Installazione di JpGraph

L’installazione di JpGraph e l’uso dei namespace sono gestiti dal **modulo Chart**. In questo progetto non si usa il pacchetto `jpgraph/jpgraph`; si usa **amenadiel/jpgraph** con namespace **Amenadiel\JpGraph\***.

## Riferimento: documentazione nel modulo Chart

Per installazione Composer e utilizzo dei namespace:

- [Chart: JpGraph Composer e namespace](../Chart/docs/jpgraph-composer-and-namespaces.md)
- [Chart: JpGraph Installation](../Chart/docs/jpgraph-installation.md)

## Sintesi

| Aspetto | Valore |
|--------|--------|
| Pacchetto Composer | `amenadiel/jpgraph` (^4.1 in `Modules/Chart/composer.json`) |
| Namespace | `Amenadiel\JpGraph\*` (es. `Amenadiel\JpGraph\Graph\Graph`, `Amenadiel\JpGraph\Plot\BarPlot`) |
| Installazione | Dalla root Laravel: `cd laravel && composer require amenadiel/jpgraph` oppure `composer update` |
| Autoload | Fornito dal pacchetto; non aggiungere mapping in `composer.json` |

Il modulo Xot non dichiara JpGraph; i moduli che generano grafici (Quaeris, Limesurvey, ecc.) usano le Actions del modulo Chart.