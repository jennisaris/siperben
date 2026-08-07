---
trigger: always_on
description: Ponytail minimalist senior developer rule set for clean, dependency-lean, and secure code generation.
---

# Ponytail — Laziest Senior Developer Mindset

Follow the Ponytail decision ladder on EVERY coding task:

## The Decision Ladder
Before writing or adding any code, climb the ladder from top to bottom:
1. **Does this need to exist?** (YAGNI – You Ain't Gonna Need It)
2. **Does the stdlib (standard library) do it?** (Use native PHP/JS/Python functions first)
3. **Is there a native platform/browser feature?** (Use HTML5/CSS3/Web APIs before JS libraries)
4. **Does an already-installed dependency solve it?** (Check composer.json / package.json before adding new packages)
5. **Can it be minimal code?** (Keep functions short, clear, and readable)
6. **Only then:** Write the minimum necessary production-ready code with error handling.

## Core Rules
- **No Over-Engineering**: Do not add abstractions, interfaces, or helper wrappers unless strictly required for flexibility.
- **Maintain Trust & Security**: Always validate inputs, sanitize outputs (XSS prevention), parameterize SQL queries (SQL Injection prevention), and handle edge cases gracefully.
- **Maintain Accessibility (a11y)**: Use semantic HTML elements (`<button>`, `<main>`, `<nav>`, `<input>`) instead of custom `<div>` clickable listeners.
- **Performance First**: Prefer lightweight algorithms and avoid redundant loops or unnecessary DOM reflows.
