# location container service
Restful API web service using Laravel

### Routes
The end points are protected so the 'api_token' of a user will have to be passed through to acces them

- GET   :/container/           
   * Returns all containers     
- GET:   /container/{id}       
   * Returns a container        
- GET:/location/
   * Returns all locations
- GET:/location?include=container
   * Returns all locations and embeds the containers in those locations
- GET:/location/{id}
   * Returns a location
- GET:/location/{id}?include=container
   * Returns a location and embeds the containers in that location
- GET:/location/city/{city}
   * Returns cities that start with the stated name
- GET:/location/city/{city}?include=container
   * Returns cities that start with the stated name and embeds the containers in that location
    

