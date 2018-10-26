# WordCamp Johannesburg Laravel App

## Steps to run this on your local machine

Make sure [Composer](https://getcomposer.org/), [Vagrant](https://www.vagrantup.com/) and [VirtualBox](https://www.virtualbox.org/wiki/Downloads) are installed. 

1. Clone the repository to a local directory

`git clone https://github.com/jonathanbossenger/wcjhb-app.git app-directory`

2. Create a .env file by copying the .env.example file. You can leave the defaults there

3. Install all Composer dependancies

`composer install`

4. Follow the Homestead [per project installation](https://laravel.com/docs/5.7/homestead#per-project-installation) steps

`composer require laravel/homestead --dev`

`php vendor/bin/homestead make`

5. (Optional) change the sites map in the Homestead.yml file to whatever you want. Usually I use the same value as the hostname, with .local appended

`map: app-test.local`

6. Generate an application encryption key

`php artisan key:generate`

7. Start the Homestead box. If this is the first time, you may have to wait a bit for the Homestead box to download (1.2gb!)

`vagrant up`

8. Once finished, you can visit the value you added to the sites map in your browser
