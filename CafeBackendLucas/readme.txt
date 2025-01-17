//café project Lucas Huygen Backend

///HOE DIT PROJECT RUNNEN?

Project 1 runnen:

Zorg ervoor dat je de volgende software hebt geïnstalleerd:

PHP (versie 8.x of hoger)
Composer
Node.js (met npm)
Git
Database (bijvoorbeeld MySQL of een andere compatibele database)
Mailtrap (voor het testen van e-mailfunctionaliteit)

- git clone van het project en ga naar het prokect folder:
git clone <REPOSITORY_URL>
cd <PROJECT_FOLDER>

- alle php dependencies installeren:
composer install

- js dependencies:
npm install

- maak een .env bestand aan en stel daar jouw database instellingen in. vb:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

-voor mail versturing heb ik gebruik gemaakt van mailtrap om deze te testen, 
 als je geen mailtrap wil gebruiken configureer dan je eigen SMPT-server
 vul volgende gegevens in je .env om deze ook te testen:
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=b89c6ef46c7ea7
MAIL_PASSWORD=712d301fcb78d3
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=noreply@jouwdomein.nl
MAIL_FROM_NAME="${APP_NAME}"
MAIL_ADMIN_ADDRESS=admin@example.com

- App-sleutel genereren Genereer een applicatiesleutel met Artisan:
php artisan key:generate

- Migraties en seeders uitvoeren Voer de database-migraties en -seeders uit:
php artisan migrate --seed

nu kan je de ontwikkelserver starten met volgende commandos
php-server:
php artisan serve

front-end assets:
npm run dev

----------------------------------------------------------------------------------------

Project 2 runnen:

- Verplaats je naar de map waar de API zich bevindt:
cd extra-features-api

- installeer de dependencies
npm install

- .env file maken (je kan dezelfde database config gebruiken als in project 1)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

- starten
npm run starte

nu kan je naar http://localhost:3000/index/ gaan en de documentatie volgen



///WAT HEB IK WAAR GEDAAN?
Project 1:
-Login - register:
breeze

-








///BRONVERMELDING

//Gebruikt voor login / registratie
breeze: https://laravel.com/docs/11.x/starter-kits#laravel-breeze


//db opstelling
==> vooral ook gekeken naar hoe de tabel users was opgesteld door breeze
https://laravel.com/docs/11.x/migrations ==> gebruikt voor hoe migrations te runnen etc


//eerste admin account aanmaken
https://laraveldaily.com/post/add-first-admin-user-live-laravel


//pfp uploaden en tonen op profiel
https://laravelamit.medium.com/how-to-upload-profile-image-of-user-in-laravel-upload-profile-picture-in-laravel-registration-732e4a0d349f

//middleware voor admin en user op te splitsen en de controllers 
https://laracasts.com/discuss/channels/general-discussion/laravelbreeze-custom-redirection
https://www.youtube.com/watch?v=G3UeClZPR4k

//CRUD (user panel admin)
https://www.youtube.com/watch?v=5DqNauW0eUY
https://laravel.com/docs/11.x/controllers#resource-controllers

//kleuren probleem tailwind
https://codedamn.com/news/frontend/how-to-fix-color-not-working-in-tailwind-css
https://tailwindcss.com/docs/configuration

//count 
https://stackoverflow.com/questions/33676576/eloquent-laravel-how-to-get-a-row-count-from-a-get

//migration foreign key FAQ
https://stackoverflow.com/questions/26437342/laravel-migration-best-way-to-add-foreign-key

//pivot, many to many
https://laravel.com/docs/11.x/eloquent-relationships#many-to-many
https://www.youtube.com/watch?v=nE129JewqbU

//Project 2

//setup
https://www.youtube.com/watch?v=fgTGADljAeg
https://www.youtube.com/watch?v=EN6Dx22cPRI

//routes
https://medium.com/@avanthikameenakshi/building-restful-api-with-nodejs-and-mysql-in-10-min-ff740043d4be

//validatie
https://express-validator.github.io/docs/


https://stackoverflow.com/questions/71156385/laravel-9-symfonymailer-error-an-email-must-have-a-to-cc-or-bcc-header