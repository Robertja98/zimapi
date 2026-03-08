# PHP App

This application serves as a skeleton for integrating with Zim-X. It follows a stateful session approach for managing user sessions across requests.

## Structure
- **app/**: Contains the application's core logic.
- **config/**: Configuration files.
- **public/**: Publicly accessible files such as the entry point.
- **vendor/**: Composer dependencies, should be added to .gitignore.

## Stateful Session Approach
The application uses PHP sessions to maintain state across requests. The session IDs are managed with the `ZimXSessionManager`.