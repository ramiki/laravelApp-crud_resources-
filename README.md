<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## tested in php 7.3.1
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->




## laravel tester :  version 8.. 

# pre-config :

- Laravel Installation : composer create-project --prefer-dist laravel/laravel crud
- cp : .env.example to .env  

- composer install : to un all packages find in composer.jon

- Database Configuration : .env file  ( dont forget to  creat same db )
- php artisan key:generate : to generate laravel unique app key 

- Migration create :   php artisan make:migration create_forms_table --create=forms
- Migration Configuration :\database\migrations\2021_08_30_185321_create__table.php
- Migration run all : php artisan migrate

- routes adding : routes\web.php ( + resource method )

- create views , i creat it manually ( view/forms : creat / edit / index / show , for resource methode ) and template ( view/layouts/app.blade.php )
    for more details about blade engine  : https://laravel.com/docs/7.x/blade

- creat controller and his model with resource methode : php artisan make:controller FormController --model=Form --resource 
    ( app\Http\Controllers\FormController.php with esource & app\Models\Form.php ) 

- creat resources !

- add pagination : exemple in app\Http\Controllers\FormController.php , in index() methode

 add lignes to : app\Providers\AppServiceProvider.php , for style pagination view with bootstrapapp 

# add aditionale pckages (with composer) :

- auth by ui package : not used yet in this project !
                       
            install :
			    composer require laravel/ui
			    php artisan ui bootstrap --auth   // can use startap templat of bootstrap - vue or react
                // ref :https://medium.com/@agavitalis/php-artisan-make-auth-command-is-not-defined-laravel-6-b51adcc6356d
			    npm install
			    npm run dev

            usage :  work directly after install : ref https://laravelarticle.com/laravel-8-authentication-tutorial

- faker : laravel come with faker package
 
            install : if not installed or to install it in a simple php projet : 
                composer require fakerphp/faker
                ref doc : https://fakerphp.github.io/ 
        
            usage : 
                ceate facory of model specified  : php artisan make:factory FormFactory --model=Form         
                fake tada generator config : Database\Factories\FormFactory.php 
                migration to run ( seeder config ) : database\seeders\DatabaseSeeder.php
                running all seeder cmd :  php artisan db:seed


 
         ---------------------------------------------------------------------------------------

# php atisan  make :


  **  make:cast             // converting attributes (retrived data from model) to common data types (string o int ...).
                            // the same of 'Accessors & Mutators' for data converting
      make:channel
      make:command
      make:component
  **  make:controller      // make a controller
      make:event
      make:exception
  **  make:factory         // generate data (faker)
      make:job
      make:listener
      make:mail
  **  make:middleware      // make a middleware 
  **  make:migration       // make migration
  **  make:model           // make model
      make:notification
      make:observer
      make:policy
      make:provider
      make:request
  **  make:resource        // make resource
      make:rule
  **  make:seeder          // stor the generaited data (by ex factory) in db 
      make:test


# php artisan :  

      route:list    // to get route listes
      key:generate  // to generate laravel unique app key 
      migrate       // lancer la migration
      ui:auth       // install ui auth package with out template view
      make:         // make a : migration  |  controller ... ( look at make: above )
      db:seed       // running all seeder
      app:name      // Creating user defined namespace ( change the namespace to match with web application )
      -V            // laravel Version    ( also : composer -V , php -v )



# notes  : 

    