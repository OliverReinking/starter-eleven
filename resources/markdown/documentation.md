# Installation - Start der Implementierung

Gehe in dein Codeverzeichnis:
## Laravel installieren
```
composer create-project laravel/laravel:^11.0 starter-eleven
```
## Jetstream installieren
```
cd starter-eleven
composer require laravel/jetstream
php artisan jetstream:install inertia --dark
npm install
php artisan migrate
```
## GitHub
Melde dich bei GitHub an und erstelle dort ein neues Repository. Ich erstelle dort das neue Repository "Starter Eleven"
Führe dann folgende Befehle im Codeverzeichnis von Starter Eleven aus:
```
git init
git add .
git commit -m "Installation - Start der Implementierung"
git remote add origin https://github.com/OliverReinking/starter-eleven.git
git push -u origin master
```

# Implementierung

In diesem Kapitel legen wir den Grundstein für unsere SaaS-Anwendung. Unser erster Schritt ist die Entwicklung einer ansprechenden Webseite, die als zentrale Plattform für unsere Nutzer dient. Im Anschluss daran konzentrieren wir uns auf die Implementierung eines sicheren Authentifizierungssystems, welches den Zugang zu unserer Anwendung gewährleistet. Anschließend richten wir unsere Aufmerksamkeit auf die Kernbereiche der Anwendung: die Administration, die Mitarbeiterverwaltung und das Kundenerlebnis. Diese drei Säulen bilden das Rückgrat unserer Anwendung und werden speziell darauf ausgerichtet, die jeweiligen Anforderungen und Bedürfnisse zu erfüllen.

## Vorbereitungen

### deploy.sh

```
#!/bin/sh -l

git add .
git commit -m "Start der Homepage-Implementierung"
git push
```

Mit Hilfe der Datei deploy.sh können wir mit dem Befehl
```
bash deploy.sh
```

den Code nach GitHub hochladen.

## Homepage



