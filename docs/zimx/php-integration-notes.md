# Zim-X / ZIM Integration Notes (PHP App)

This document defines how our PHP project management system integrates with Zim-X (ZIM engine), while staying upgradeable.

## Goals
- Keep Zim-X integration isolated behind an adapter (upgrade-safe).
- Support ZIM session semantics (sets persist for duration of a session).

## Recommended Architecture
**UI/Controllers → Application Services → Repositories (interfaces) → Zim-X Adapter**

No controller or view should call Zim-X directly.

## Integration Modes (pick one)
1) Native HTTP API from PHP (preferred if available)
2) PHP extension / ODBC / socket protocol
3) Python bridge service wrapping ZimAPI; PHP calls localhost HTTP

## Session Strategy
- **Stateless:** new Zim session per request
- **Stateful:** maintain a Zim session keyed by PHP session id

## What We Still Need
- Zim-X connection string format / API endpoint
- Authentication requirements (user/pass? token?)
- Whether procedures are used for core business logic
