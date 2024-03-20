# Starter Eleven

Willkommen im Laravel-Template **Starter Eleven**. Ein möglicher Ausgangspunkt für die Entwicklung skalierbarer SaaS-Anwendungen mit Laravel. Dieses Template kombiniert die Eleganz von Laravel mit den modernen Möglichkeiten von Vue.js und TailwindCSS, um dir einen robusten Startpunkt für dein Projekt zu bieten.

## Features

- **Laravel 11**: Nutze die neuesten Laravel-Funktionen für robuste Backend-Logik.
- **Vue.js Integration**: Für ein reaktives und modernes Frontend.
- **TailwindCSS**: Schreibe stilvolles CSS schneller mit Utility-first CSS.
- **Authentifizierungssystem**: Vorgefertigte Laravel Authentifizierung für deine SaaS-Anwendung.
- **Blog**: Erstellung von Blogartikeln, Anzeige einer Liste von Blogartikeln, Anzeige eines Blogartikels
- **Anwendungsfamilie**:
  - Homepage
  - Authentifizierung
  - Anwendung für Administratoren (Intranet)
  - Anwendung für Mitarbeiter (Intranet)
  - Anwendung für Kunden (Extranet)

## Voraussetzungen

Um mit dem Laravel-Template **Starter Eleven** zu arbeiten, benötigst du:

- PHP >= 8.2
- MySQL
- Composer
- node

## Installation

1. Klone das Repository:
   ```
   git clone https://github.com/OliverReinking/starter-eleven.git
   ```
2. Installiere die Abhängigkeiten:
   ```
   composer install
   npm install
   ```
3. Kopiere `.env.example` zu `.env` und konfiguriere deine Umgebungsvariablen:
   ```
   cp .env.example .env
   ```
4. Generiere einen Applikationsschlüssel:
   ```
   php artisan key:generate
   ```
5. Migriere die Datenbank
   ```
   php artisan migrate
   ```
6. Starte deine Anwendung:
   ```
   npm run dev
   ```

## Dokumentation
Auf der Startseite der Anwendung findest du einen Link zu einer ausführlichen Dokumentation zu diesem Laravel-Template.
Du findest die Datei documentation.md im Verzeichnis resources/markdown.

## Autor
Informationen zum Autor Oliver Reinking findest du unter [ReinkingConsulting](https://reinkingconsulting.de)

## Lizenz
Das Laravel-Template **Starter Eleven** ist eine Open-Source-Software, lizenziert unter der [MIT-Lizenz](https://opensource.org/licenses/MIT).
