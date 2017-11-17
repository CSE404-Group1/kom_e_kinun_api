# KomEKinun API (underconstruction)
For CSE404-Group1 members

## Contents
- [How will you Setup this API](#how-will-you-setup-this-api)
- [The API](#the-api)
    - [Register](#register)
    - [Login](#login)
    - [Store Item](#store-item)
- [Errors you might have](#errors-you-might-have)
    - [1071 specified key was too long](#1071-specified-key-was-too-long)

## How will you Setup this API.

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
      
* Now install the passport `oauth_clients` on to the created database. This should put 2 new entries in the `oauth_clients` table

      php artisan passport:install 

* now run the **API** with this command 

      php atrisan serve
  
____

## The API
The API is quite simple and self-explanatory

### Register

To register a new user the Request url : http://127.0.0.1:8000/api/register
> http://127.0.0.1:8000 is the default url when you run it on your computer

Request Type: **POST**

Headers: 

    [{"key":"Accept","value":"application/json","description":""}]
    [{"key":"Content-Type","value":"application/json","description":""}]
    
Body(example):

	{
		"username": "betashop",
		"email": "info@betashop.com",
		"password": "123456789",
		"description": "",
		"phone_num": "9999999",
		"facebook_page": "https://www.facebook.com/betashop",
		"location" : "beta location, dhaka, bangladesh",
		"website" : "https://www.betashop.com",
		"is_superadmin" : false,
		"is_seller" : true,
		"is_premium" : false
	}
      
if successful a new entry in `users` table will be created and server will response the user details(json)

### Login

[laravel Passport]() has been used for our API authentication. To log-in a registered user,

Request url: http://127.0.0.1:8000/oauth/token

Request Type: **POST**

Headers: 

    [{"key":"Accept","value":"application/json","description":""}]
    [{"key":"Content-Type","value":"application/json","description":""}]
    
Body:

     {
		"grant_type": "password",
		"client_id": "2",
		"client_secret": "so0BsmP1uoFq0B6v5JdTGtocLR0qSv6hc8NigyER",
		"username": "info@betashop.com",
		"password": "123456789",
		"scope": "*"
     }
      
this will return us a **Bearer Token** like this,

    {
        "token_type": "Bearer",
        "expires_in": 31535999,
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQ1NTY3YjBmMjVhYWYxNzUwYmVmODk4ZDk4ZTQ0MTlmMWY2MTBkZjhkNjg2ZTVjZDk0ZWFiNzNmOTllMGZmODcwZDQwNmE1M2JlOTUxNTNiIn0.eyJhdWQiOiIyIiwianRpIjoiNDU1NjdiMGYyNWFhZjE3NTBiZWY4OThkOThlNDQxOWYxZjYxMGRmOGQ2ODZlNWNkOTRlYWI3M2Y5OWUwZmY4NzBkNDA2YTUzYmU5NTE1M2IiLCJpYXQiOjE1MTA4OTQ5MzYsIm5iZiI6MTUxMDg5NDkzNiwiZXhwIjoxNTQyNDMwOTM2LCJzdWIiOiIxIiwic2NvcGVzIjpbIioiXX0.mMaFyPiHfR2_GCzxcAPrcOrVwG5Gd-Qd9_R9X4CdQcGMd7k9P-VW8bd2erol1P-j367j28PJLBSJBhkxPxMA66QtZSDQ_wSD2ZkK-EfsXFgfDFFt9E78oO-OiTYuq06WNPjC6Bt3391NrXMIMR_6CEV9mTQOvNlQf2IlYXjC8EfQJlvuv-4plLp_I1k5TA-6zSSyB3KhkwF1nbM0cr6ONyAaKgH1zC42jOGs798tD6oefKtZrsnF__UozmQfmm0YtBODZE7hGUs7qAoG273kJfCYhsv9POIBOm8KzeVGy-KRKDtDH8Unk8XarPsA-mAc82pdvWtZ2bjVl7s0NvaQ6T6ibz_9SYFBSAj3iMcDT6fSbPrduht4GagOyya-Wvp_1oaUmeEEpa7ltuUlq-FyayDuDGJJVJ41NlubTmWVYQ0t_t0mvbTcgwx3wt4LsviRcdRRqBAVF7ndYI5Yvw0BXsmfK2OSGuan-_QtYBImcnpVAMhjKA18WGXTF5IsI2zYlgVMckf9a_6-br7oEo3mxvhHKWQkR9RntmbLCO_9h37zWaBp22RA_nXqv-9-Io5egLGU2eUWWWe49N-rtSBfCz8WbOTvUq6bTzlgHw-V_R2hXpaiAjzDu7_pNHUZgxBCA2xxJm1Fc94YhosKkyVyjXmtdiaYm-RU4qpaovfSFyA",
        "refresh_token": "def50200626814c06121c2b54654c1d4b1ed6e5b01c27584b072b99b5b2a48c9697cde0ffcf35fa4b9e077b1f5eeb291c82c1a3a0d09c5825a8007d0c2376ca91afb09e6c5b45fd425bcf6f771cd9c2d36030787f2d36ea8aca26f7c379fd5d6f70ee7cc21d62ee49c9fb71e19f7cf4765477191b75e4a70863a87b22809dde6a6506deb8e1ca6b8300f8ad9a3e3110c133dc875eab8076965474c206c8c5d3f03edf67e9a35f368984ebe4c84d1ea1e103813e97a4fa1ebb5e8cdb5800569e269f86b466df55686a7e01556a720a6476a61ce9428b0acebaee8f430476cc90f94e3bf9bc1c71dcd4037531729ca92545d5b4108d765f4fadae88a808c41838809129bc038ac394a7b127c2b2e47a994c7537b301a47984a1130b6b1a9925eb04e13434e33fe1da0175e4de0fca071496ae3fedb0fef6c9ab4863442fc9c7a1e1e70dec3a5ac5c2a76e85418e1387b4894f05fc85839e5fe869b3492621b4f69956c7b25"
    }
    
now we can use this token to get all the info for our logged in user

Request url: http://127.0.0.1:8000/api/user

Request Type: **GET**

Headers: 

    [{"key":"Accept","value":"application/json","description":""}]
    [{"key":"Content-Type","value":"application/json","description":""}]
    [{"key":"Authorization","value":"Bearer access_token","description":""}]
    
This will return all the info we need,

    {
        "id": 1,
        "username": "demoshop",
        "email": "info@demoshop.com",
        "description": null,
        "phone_num": "9999999",
        "facebook_page": "https://www.facebook.com/demoshop",
        "location": "demo location, dhaka, bangladesh",
        "website": "https://www.demoshop.com",
        "is_superadmin": 0,
        "is_seller": 1,
        "is_premium": 1,
        "created_at": "2017-11-16 14:15:17",
        "updated_at": "2017-11-16 14:15:17"
    }
    
### Store Item

To Store a new Item after logging in the Request url : http://127.0.0.1:8000/api/items
> http://127.0.0.1:8000 is the default url when you run it on your computer

Request Type: **POST**

Headers: 

    [{"key":"Accept","value":"application/json","description":""}]
    [{"key":"Content-Type","value":"application/json","description":""}]
    [{"key":"Authorization","value":"Bearer access_token","description":""}]
    
Body(example):

      {
		"name": "demoItem2",
		"description": "",
		"actual_price": 250.00,
		"sale_price": 120.00,
		"offer_start_date": "2017-11-15 23:59:59",
		"offer_end_date": "2017-11-20 23:59:59",
		"quantity": 20,
		"offer_description" : "",
		"brand_name" : "demo",
		"product_origin_page" : "",
		"catagory" : "demo",
		"sub_catagory_1" : "sub-demo",
		"sub_catagory_2" : "sub-demo",
		"sub_catagory_3" : "sub-demo",
		"keywords": "demo",
		"is_featured" : false
	}
    
if successful a new entry in `items` table will be created and server will response the Item details(json).

if the user is not authorized or if we dont send the `Authorization` header the server will return 

      {
          "error": "Unauthenticated."
      }

____

## Errors you might have:

### 1071 specified key was too long

edit your AppServiceProvider.php file and inside the boot method set a default string length:

    use Illuminate\Support\Facades\Schema;

    public function boot()
    {
        Schema::defaultStringLength(191);
    }

