---
title: "User Research: Xot Framework"
module: "Xot"
type: concept
tags: [user, research]
created: 2026-07-14
updated: 2026-07-14
qmd: "user research"
related:
  - "./eloquent-magic-properties-rule.md"
---
# User Research: Xot Framework

## 🔬 Research Goals
Identify bottlenecks in developer productivity when working with XotBase classes.

## 👥 Participants
- Lead Backend Developers.
- AI Agents (via usage logs and error patterns).

## 💡 Key Findings
- Dependency Injection in Actions is a common source of confusion (resolved by standardizing on `app()` resolution).
- Automated discovery of translations saves significant time.

## 💬 Notable Quotes
> "The XotBaseResource makes Filament development significantly faster by handling all the boilerplate."

## ✅ Actionable Insights / Next Steps
- Simplify the `XotBaseServiceProvider` boot process.
- Improve documentation for the `HasXotTable` trait.
