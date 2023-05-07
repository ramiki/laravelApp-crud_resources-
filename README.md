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
- Migration create to add column 'deleted' to forms table for softdelete :   php artisan make:migration add_column_user_id --table=forms
- Migration create to add column 'user_id' to forms table for foreign key :   php artisan make:migration add_column_deletedAt_forms --table=forms
- Migration create to add column 'image' to forms table for upload image  :   php artisan make:migration add_column_image_forms --table=forms
- Migration create to add column 'is_admin' to users table for admin authorization  :php artisan make:migration add_column_is_admin_users --table=users
- Migration Configuration :\database\migrations\2021_08_30_185321_create_forms_table.php
- Migration run all : php artisan migrate

- routes adding : routes\web.php ( + resource method )

- create views , i creat it manually ( view/forms : creat / edit / index / show , for resource methode ) and template ( view/layouts/app.blade.php )
    for more details about blade engine  : https://laravel.com/docs/7.x/blade

- creat controller and his model with resource methode : php artisan make:controller FormController --model=Form --resource 
    ( app\Http\Controllers\FormController.php with esource & app\Models\Form.php ) 

- add pagination : exemple in app\Http\Controllers\FormController.php , in index() methode
                   add lignes to : app\Providers\AppServiceProvider.php , for style pagination view with bootstrapapp 

- add request for validation :  php artisan make:request formrequest    ( config formrequesty.php ) and call it in the methode (store) request argument (class / hint) of the controller   ; public function store(formsRequest $request) {...}

- add policy and auhorization : php artisan make:policy formPolicy --model=Form    ( config formPolicy.php )
                                mapping form model with its policy ( config app\Providers\AuthServiceProvider.php) and 
                                call it in the controller (edite methode): $this->authorize('update' , $form);
                                 customize the error page ex : 403 HTTP status codes, create a resources/views/errors/403.blade.php view template. This view will be rendered on all 403 errors generated by your application. The views within this directory should be named to match the HTTP status code they correspond to .


# add aditionale pckages (with composer) :

- auth by ui auth package :
                       
            install :
			    composer require laravel/ui
			    php artisan ui bootstrap --auth   // can use startap templat of bootstrap - vue or react
                // ref :https://medium.com/@agavitalis/php-artisan-make-auth-command-is-not-defined-laravel-6-b51adcc6356d
			    npm install
			    npm run dev

            usage :  work directly after install . for more : ref https://laravelarticle.com/laravel-8-authentication-tutorial

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


      make:cast             // ** converting attributes (retrived data from model) to common data types (string o int ...).
                                     the same of 'Accessors & Mutators' for data converting
      make:channel
      make:command
      make:component       //
      make:controller      // ** make a controller
      make:event
      make:exception
      make:factory         // ** generate data (faker)
      make:job
      make:listener
      make:mail            // ** create a "Email" file in app/mail/testmail.php for mail class "build" to define view and subject ...
                                    Markdown mailable messages allow you to take advantage of the pre-built templates and components ( blade ) of mail notifications in your mailables
                                    sender location : app/mail/contactMail.php     &  template location : view/mails/contat.blade.php
      make:middleware      // ** make a middleware ( access control ) mechanism for filtering HTTP requests entering your application
      make:migration       // ** make migration ( creat table , column ...)
      make:model           // ** make model
      make:notification    // ** 
      make:observer
      make:policy          // ** make a policy and gates "Gate is the same as Permission" ( classes that organize authorization logic around a particular model or resource )
      make:provider
      make:request         // ** For more complex *validation* scenarios, Form requests are custom request 
                                    classes that encapsulate their own validation and authorization logic
      make:resource        // ** make resource (get - post - put/patch - delete ) for routes or/and controller
      make:rule
      make:seeder          // ** stor the generaited data (by ex factory) in db 
      make:test


# php artisan :  

      route:list    // to get route listes
      key:generate  // to generate laravel unique app key 
      migrate       // lancer la migration
      ui:auth       // install ui auth package with out template view
                       Laravel's authentication facilities are made up of "guards" and "providers". Guards define how users are authenticated for each request. 
                       For example, Laravel ships with a session guard which maintains state using session storage and cookies. 
      make:         // make a : migration  |  controller ... ( look at make: above )
      db:seed       // running all seeder
      app:name      // Creating user defined namespace ( change the namespace to match with web application )
      -V            // laravel Version    ( also : composer -V , php -v )
      storage:link  // link the storage dir to public ( to access uploaded file ) look at : config/filesystem.php


# notes  :  ( DRY : Dont Repeat Yourself )
    
- **** for more infos see the doc ***

    - Blade Rendering Components : to display a component, you may use a Blade component tag within one of your Blade templates. Blade component tags start with
        the string x- followed by the kebab case name of the component class:   <x-alert/>  <x-user-profile/>

    - To obtain an instance of the current HTTP request via dependency injection, you should type-hint the Illuminate\Http\Request class on your route closure or controller method.
        The incoming request instance will automatically be injected by the Laravel service container :   public function store(Request $request)  { ... }
    
    - Change validation lunguage : (see /config/app.php)
    
    - Errors view : we add a folder with "errors" name and a file with the number of errors "403.blade.php    (see /view/errors) 
    
    - Edit /config/database.php file, search for mysql entry and change:
        'engine' => null,    to  'engine' => 'InnoDB',
         This saves you from adding $table->engine = "InnoDB"; for each of your Schemas ;)

    - In relationship we can change $users = User::all(); to $users = User::with('comments')->get();  to performe queries ( specified relationned table ('comment') before the call)
       ( instead of repeat queries it can resume it ) see ref : with() of models 

    - Polymorphism poo : many forms = methodes overriding and overloading   

    - Polymorphism laravel relationships : a way of models relationships , one table associate to many other tables  ( comments table is associated to posts table and videos table ... )
        a ref ( https://www.youtube.com/watch?v=KWLeV0VOwdc&list=PLebww9DYmRqO5P57v2Sr3zFOBeaWCj8If&index=6 )
        
        - Has many through : tree or more table passing through  ( country -> users -> post ) retrive contry of posts passing by users

    - Mutators & accessor / Casting ( see form model ) : cast is the way to chage the type of data retrived from db ( string to boolean ... )
                                                         accessor is to change the value of data after retrived (get) it from db ( lowercase to upercase ... )
                                                         mutators is the opposit of accessor , that is change the value of data when it is stored (set) in db       

    - authentication and authorization : authentication verifies the identity of a user or service before granting them access 
                                         authorization while the other determines what they can do once they have access

        - authorization : aravel provides two primary ways of authorizing actions: gates and policies. Think of gates and policies like routes and controllers. 
            Gates provide a simple, closure-based approach to authorization while policies, like controllers, group logic around a particular model or resource. 
            You do not need to choose between exclusively using gates or exclusively using policies when building an application. 
            Most applications will most likely contain some mixture of gates and policies, and that is perfectly fine ( in this project we use policy )


