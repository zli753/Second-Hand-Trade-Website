###Note###
We push our entire laravel project to bitbucket, but the vendor folder(large folder, build in laravel library, created by default) is ignored by git. It doesn't contain our site code. We asked TA, we don't need to commit this vendor folder, but the project need the vendor to make it work.

###Second-hand Trading Website###
Submitting the rubric on time. (5 point)
###1. Database server (5 Points):###
* A MYSQL database server is running on your instance and is connected to PHP laravel correctly. (5 points)
###2. Trading Site (70 Points):###
## User Management (20 Points): ##
* A session is created when a user logs in (3 points)
* New users can register (3 points)
* Passwords are hashed and salted (3 points)
* Users can log out (3 points)
* A user can edit and delete his/her own goods and comments but cannot edit or delete the stories or comments of another user (8 points)
##Goods, Sellers and Comment Management (30 Points):##
* Relational database is configured with correct data types and foreign keys (2 points)
* Goods can be posted (3 points)
* A picture and description can be associated with each good, and they should be stored in a separate database field from the good (3 points)
* Questions can be asked in association with a good (4 points)
* Goods can be edited and deleted (3 points)
* Questions can be edited and deleted (3 points)
* People can rate sellers with their comments.(5 points)
* People can use key words to search goods ( 4 points)
* Unregistered users can ask question about the goods but cannot rate sellers (3 points)
##Best Practices (13 Points):##
* Code is well formatted and easy to read, with proper commenting (3 points)
* Site follows the FIEO philosophy (3 points)
* All pages pass the W3C validator (2 points)
* CSRF tokens are passed when creating, editing, and deleting comments and stories (5 points)
##Usability (7 Points):##
* Site is intuitive to use and navigate (4 points)
* Site is visually appealing (3 point)
###3.Creative Portion (20 Points) ###
* Site uses Google map API and geocoding to convert the seller's address on a google map in a seperate page.(15 points)
* The main trade page uses different category buttons to let users view these goods by their different category.(5 points)