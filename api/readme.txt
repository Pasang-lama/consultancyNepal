---------------------------------[Documentation]-----------------------
1) To add New routes to the api first steps is to open the index.php files
2) Add routes  if($apiuri[2]=="[your routes name eg(consultancy.php)]" and !isset($apiuri[3])){};

3) all the logic are in the api pages api.php;
where we make class and thier method that perform some operation 
then call it in index pages to render under routes

4) jwt token is used to hash and decode the user id to for the security..






