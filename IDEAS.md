welcome page for everyone:
- [x] this many categories exist
- [x] this many users are signed up
- [~] this many users are using the platform right now

bans:
- [x] temp ban 3x.
- [x] perm ban -> new table .
- [x] or ban is table with polymorphic relation to perm and temp.
- [~] unban request -> new table with foreign key to perm ban. [x] -> only new table without fkey
- ![] ban itself should link to any model like chat message or feedback so unban also can link to a temp or perm ban

login page:
- [] top ranked users

posts:
- [] for create route make redirect to either service or demand with choice
- [] update parent time from service and demand (check docs: https://laravel.com/docs/9.x/eloquent-relationships#touching-parent-timestamps) and maybe remove child timestamps
- optional location
- filter nearby

services
-inherits from post

demand
- inherits from post

contract:
- [] allow users to create a contract with services in exchange among them

dashboard:
- show demands and services nearby
- recommend services and demands

admin:
- [] manage:
- users
- posts
- categories
...

see bad words used by users in conversation
