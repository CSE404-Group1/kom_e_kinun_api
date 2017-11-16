For CSE404-Group1 members

# How will you Run this API.

* First and foremost [install Laravel](https://laravel.com/docs/5.5/installation) and also [NodeJS](https://nodejs.org/en/download/)


* now download/clone this repo

      git clone https://github.com/CSE404-Group1/kom_e_kinun_api.git

* run the following command in the project directory to install the javascript dependencies

      npm install 
      
* and also the php dependencies 

      composer install
    
    
* run your mysql server (and also apache if you want to access it with apache server) and create a new database and name it **kom_e_kinun_db**

* run this command to migrate(create tables) 

      php artisan migrate

* now run the **API** with this command 

      php atrisan serve
      
      
      
### Errors you might have:

####1071 specified key was too long

edit your AppServiceProvider.php file and inside the boot method set a default string length:

    use Illuminate\Support\Facades\Schema;

    public function boot()
    {
        Schema::defaultStringLength(191);
    }

