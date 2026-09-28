---
<<<<<<< HEAD
=======
updated: 2026-09-26
qmd: "DATABASE SCHEMA"
issues: []
discussions: []
>>>>>>> laraxot/dev
title: "Xot Module Database Schema"
type: reference
tags: [xot, database, schema]
created: 2026-07-28
---

# Xot Module — Database Schema

## Base Table Structure (XotBaseMigration)

```sql
CREATE TABLE {table} (
    id UUID PRIMARY KEY DEFAULT (UUID()),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL (soft delete)
);
```

**Every model uses:**
- UUID primary key (not auto-increment)
- Soft deletes (deleted_at nullable)
- Automatic timestamps
