# Artroot : A Platform for Artists (Laravel 9)
### *A fully customised platform for artists where they can showcase their art and attract potential buyers, with account support for both artists, customers and enthusiasts.*
### User Types :
- #### Enthusiast/Customer
    - Browse through artworks
    - Contact artists
    - Setup payment accounts and make payments
    - Can send messages to artists account users
- #### Artist
![](https://github.com/RezaAlHassan/artroot-laravel/assets/24864973/4ba48a4c-562d-47fb-80cb-34505482277c)

    - They can CRUD artwork
    - They can browse through artworks
    - They can setup credit accounts to receive payment
    - Can receive and send messages to default account users

## UI/UX 
A modern, simple and attractive user friendly ui has been used along with good implementation of ux with backend. Every part of the frontend is custom made, created from scratch. CSS,JS,Bootstrap
- A user only has to enter his email once during resetting his email. After email link is clicked he doesnt need to enter his email again and the user can change his password.
- All possible errors are shown, attratively, that can happen during form validation both during registartion and login
- A user is properly informed of his actions using information messages that stand out and clever redirection techniques


## Login + Registration + Email Verification
 <img width="100%" src="https://github.com/RezaAlHassan/artroot-laravel/assets/24864973/dc2fe2c2-bd9c-4f72-b2ef-14e1c7011ed7">
 <br>

The platforms implements a very rigorous authentication. Features are listed below:
- To access any part of the platform, all users must verify their email addresses first if they are a new user. 
- Depending on the user type selected during registration, the user will be redirected to their their respective windows.
- Default form validation is done
- Customised email template
- Token generation during redirection to reset password link

## To test locally:
1. Unzip the downloaded archive
2. Copy and paste unzipped folder in your htdocs folder
3. In your terminal run `composer install`
4. Update your `.env` configurations accordingly (mainly the database configuration)
5. In your terminal run `php artisan key:generate`
6. Run `php artisan migrate` to create the database tables 
7. For Laravel 9+, create a maitrap account and copy paste your username & password in `.env`
8. Test! Its a well made made
