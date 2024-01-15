# HEXARCH: DDD Recap

Quick recopilation of all I learned about DDD

## Access Points

```shell
curl -X POST http://127.0.0.1:8000/api/v1/login \
-H "Content-Type: application/json" \
-H 'authorization: 8bef0347-6482-470c-9771-e9fbde80690f' \
-d '{"email": "1dee8LQ2cv@default.com", "password": "default"}'

curl -X POST http://127.0.0.1:8000/api/v1/forgot \
-H "Content-Type: application/json" \
-H 'authorization: 8bef0347-6482-470c-9771-e9fbde80690f' \
-d '{"email": "lliUNIQej34QWeh@default.com"}'

curl -X GET http://127.0.0.1:8000/api/v1/users \
-H "Content-Type: application/json"
-H 'authorization: 8bef0347-6482-470c-9771-e9fbde80690f' \
-H "Authentication: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W3siaWF0IjoxNzA0MTI3MTA1LCJleHQiOjE3MDQxMzA3MDUsImF1ZCI6ImEyNjFjZjExNTU5MGZkOGVmMmRjZmFiZTMxNDhhOWJjYThiOTAyNjQiLCJkYXRlIjp7ImlkIjoxMCwiZW1haWwiOiIxZGVlOExRMmN2QGRlZmF1bHQuY29tIiwiZmlyc3RfbmFtZSI6ImRlZmF1bHQ5In19XQ.sRVjD6t_0LuA7RGBqdW1yX7H6UcE4oOCKDvMXd9pQ1w" \

curl -X GET http://127.0.0.1:8000/api/v1/users/1 \
-H "Content-Type: application/json"
-H 'authorization: 8bef0347-6482-470c-9771-e9fbde80690f' \
-H "Authentication: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W3siaWF0IjoxNzA0MTI3MTA1LCJleHQiOjE3MDQxMzA3MDUsImF1ZCI6ImEyNjFjZjExNTU5MGZkOGVmMmRjZmFiZTMxNDhhOWJjYThiOTAyNjQiLCJkYXRlIjp7ImlkIjoxMCwiZW1haWwiOiIxZGVlOExRMmN2QGRlZmF1bHQuY29tIiwiZmlyc3RfbmFtZSI6ImRlZmF1bHQ5In19XQ.sRVjD6t_0LuA7RGBqdW1yX7H6UcE4oOCKDvMXd9pQ1w" \

curl -X POST http://127.0.0.1:8000/api/v1/users \
-H "Content-Type: application/json" \
-H 'authorization: 8bef0347-6482-470c-9771-e9fbde80690f' \
-H "Authentication: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W3siaWF0IjoxNzA0MTI3MTA1LCJleHQiOjE3MDQxMzA3MDUsImF1ZCI6ImEyNjFjZjExNTU5MGZkOGVmMmRjZmFiZTMxNDhhOWJjYThiOTAyNjQiLCJkYXRlIjp7ImlkIjoxMCwiZW1haWwiOiIxZGVlOExRMmN2QGRlZmF1bHQuY29tIiwiZmlyc3RfbmFtZSI6ImRlZmF1bHQ5In19XQ.sRVjD6t_0LuA7RGBqdW1yX7H6UcE4oOCKDvMXd9pQ1w" \
-d '{"first_name":"default manual","last_name":"default manual","email":"default.manual@default.com","cellphone":"987654321","password":"default234","state_id":2}'

curl -X PUT http://127.0.0.1:8000/api/v1/users \
-H "Content-Type: application/json" \
-H 'authorization: 8bef0347-6482-470c-9771-e9fbde80690f' \
-H "Authentication: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W3siaWF0IjoxNzA0NjU3NzcxLCJleHQiOjE3MDQ2NjEzNzEsImF1ZCI6ImEyNjFjZjExNTU5MGZkOGVmMmRjZmFiZTMxNDhhOWJjYThiOTAyNjQiLCJkYXRlIjp7ImlkIjoxLCJlbWFpbCI6IkFrV0J5MVM3VVVAZGVmYXVsdC5jb20iLCJmaXJzdF9uYW1lIjoiZGVmYXVsdDAiLCJyb2xlcyI6eyJpZCI6MSwibmFtZSI6InN1cGVyX2FkbWluIn19fV0.2SuW_cpxh4-bpdD7LOlLRQgb_OuftH8wbbSv51LitTg" \
-d '{"first_name":"default manual","last_name":"default manual","email":"default.manual@default.com","cellphone":"987654321","password":"default234","state_id":2}'
```

> - Replace the hash from Authentication header with the JWT you get after login.
> - Also rename the file `.env.example` to `.env`

## Bounded Context

There are Bounded Context And Subdomains
A Bounded context a context where Entities change, have different name or purpose

In a service one possible Bounded Context can be:

 - Management
 - Application

Management is what is also known as BackEnd, and Application is what is also known as FrontEnd where the product is delivered and ready to use

Inside every Bounded Context that represents the objects of entities from these Bounded Context there are Entities, an Entity can be defined as a key element of this context that have a role in it and can be modified

Also there are Bounded Context to share resources between Context

User for example can be a Subdomain of Application, because users has access to some parts of the Application
But Login and Forget part of Management because are task related to manage the Application

The SubDomains has 3 folders

 - Application
 - Domain
 - Infrastructure

### SubDomain Explanation

Infrastructure is in charge of the communication with the outside

Domain is in charge of defining the Entities, and Value Objects that are sent from the Application layer to Infrastructure layer. Also of storing the Exceptions that are going to be used in the Application layer or Domain layer, and the Contract

Application is in charge of the Use Cases, they receive the contract from injected from infrastructure, also they get the input, translate it to Value Objects and send them to the Contract. Then Return an Entity

## Structure

 - Everything starts at src/
 - src/ contains the Bounded context, for example Application and Management
 - The mounded context contains subdomains like user, login, forgot, etc
 - Each subdomain has its folder Application, Domain and Infrastructure if it is needed
 - Application have a folder for each Use Case
 - Domain has folders from ValueObjects, Exceptions, Contract
 - Infrastructure have folder for each service it uses, usually are Controllers, Repository and Services
 - Controllers is where controllers are
 - Repository is where our layer for persisting data is going to be
 - And services are all services needed to run the application, a Dependence injector, Router

## Base

First is creating the Bounded Context and SubDomins we need
Create the representation of Bounded Context and Subdomains with folders inside `src/`
Declare the namespace in `composer.json`

We can continue with the ErrorHandling or other handlers
And then the services for Routing and Dependence injection
But the same contract and the Repository can be use in all the SubDomain

Then we can start creating the controllers for the use cases, followed by the routes
By now the controllers returns a request with an string

Next is creating the Use Case, inject it in the controller, and return the content of the use case with the request
By now using an string

With Controller and the use Case we can create the ValueObjects, and then create or update the Contract and the Reposity

### Other stuff

 - There are other stuff that can be added to the Controller
 - We use the same methodology
 - Create it in Infrastructure layer
 - Declare it in the services and use it in the Controller or where ever you need to use

Made with [Laravel](https://laravel.com/)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
