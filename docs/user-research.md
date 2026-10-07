---
title: "user research"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "user research"
issues: []
discussions: []
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
