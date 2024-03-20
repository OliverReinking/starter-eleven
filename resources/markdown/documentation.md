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
git commit -m "Installation - Start der Implemenetierung"
git remote add origin https://github.com/OliverReinking/starter-eleven.git
git push -u origin master
```

