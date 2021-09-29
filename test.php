<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>  </title>
<style>

</style>
</head>
<body>

<h1> Latituda, longituda </h1>

<button class="geeks" onclick="getlocation()">Click Me</button>
  <p id="demo1"></p>
 
  <script>
    var variable1 = document.getElementById("demo1");
    
    function getlocation() {
      navigator.geolocation.getCurrentPosition(showLoc);
    }
  // Defining async function
        async function getapi(url) {
            
            // Storing response
            const response = await fetch(url);
            
            // Storing data in form of JSON
            var data = await response.json();
            console.log(data);
            if (response) {
              
            }
            show(data);
        }
        // Calling that async function
        
          
        function show(data) {
          
          // Setting innerHTML as tab variable
          document.getElementById("lat").innerHTML = data.results[0].locations[0].street;
          document.getElementById("long").innerHTML = data.results[0].locations[0].adminArea5;
      }
    function showLoc(pos) {
      variable1.innerHTML =
        "<p id='lat'>" +
        pos.coords.latitude + "</p>" +
        "<p id='long'>" +
        pos.coords.longitude + "</p>";
        var x = document.getElementById("lat").innerText;
        var y = document.getElementById("long").innerText;
        /*document.write(x);
        document.write(y);*/
        const api_url = 
        "https://open.mapquestapi.com/geocoding/v1/reverse?key=7MdftJsO5aUZZuPzO8PsNMqhCnlQjK0a&location="+x+","+y+"&includeRoadMetadata=true&includeNearestIntersection=true";
        getapi(api_url);
      } 

      
  </script>


</body>
</html>