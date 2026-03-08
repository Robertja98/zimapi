# ZimAPI Developer Guide (Python Edition) — Project Reference

> Source: user-provided documentation pasted into chat on 2026-03-08.  
> Purpose: Local reference for ZIM/Zim-X connectivity concepts (sessions, sets, cursors, file transfer).

## What Is ZimAPI?
ZimAPI is a Python interface that connects directly to the ZIM database engine. It allows developers to execute ZIM and SQL commands, manage transactions, transfer files, and interact with persistent data sets—all from Python.

## Why ZIM Is Different (Session-Persistent Data Sets / "Sets")
Unlike traditional SQL databases, ZIM automatically creates a data set every time a query is executed. These data sets behave like dynamic views and remain available for the entire session.

Example:
- `FIND 5 Customers -> sCustomers`
- Then: `DELETE 1 FROM sCustomers`

At session end, ZIM drops the data sets automatically.

## Installation Notes
- Locate `zimapi.py` in your ZIM installation directory.
- Copy it to the directory where your Python scripts will run.
- Tip: Keep `zimapi.py` in a shared utilities folder if working across multiple projects.

## Connecting to ZIM (Python)

```py
import zimapi

zim = zimapi.Zimapi()
zim = zim.connect(
    dbname="your_database_name",
    host="localhost",
    port=6002,
    user="ZIM",
    password=""
)

print(zim.state)
zim.close()
```

Inline connection:

```py
import zimapi

zim = zimapi.Zimapi(
    dbname="your_database_name",
    host="localhost",
    port=6002,
    user="ZIM",
    password=""
)
print(zim.state)
zim.close()
```

Notes:
- `dbname` is required.
- `host` defaults to `localhost`.
- `port` defaults to `6002` (must match `zimconfig.srv` if changed).

## Implications For Our PHP App
Even though our application is PHP, we should design our data access layer around:
- session lifecycle management (sets persist per session)
- explicit transactions
- repository/adapter pattern
- clear file-transfer and evidence-vault handling
