<!DOCTYPE html>
<html>
<head>
    <title>Movies Data from API</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 100px;
        }
    </style>
</head>
<body>

<h2>Movies List</h2>
<button onclick="loadMovies()">Load Movies</button>
<br><br>
<table id="moviesTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Poster</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Director</th>
            <th>Country</th>
            <th>Language</th>
            <th>Actors</th>
        </tr>
         <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
        </tr>
    </thead>
    <tbody>
        <!-- Movies data will appear here -->
    </tbody>
</table>

<script>
function loadMovies() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://freetestapi.com/api/vl/movies", true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            var tbody = document.querySelector("#moviesTable tbody");
            tbody.innerHTML = ""; // Clear previous data

            data.forEach(function(movie){
                var row = document.createElement("tr");

                row.innerHTML = 
                    <td>${movie.id || "-"}</td>
                    <td>${movie.title || "-"}</td>
                    <td>${movie.poster ? "<img src='" + movie.poster + "'>" : "-"}</td>
                    <td>${movie.year || "-"}</td>
                    <td>${movie.genre || "-"}</td>
                    <td>${movie.rating || "-"}</td>
                    <td>${movie.director || "-"}</td>
                    <td>${movie.country || "-"}</td>
                    <td>${movie.language || "-"}</td>
                    <td>${movie.actors || "-"}</td>
                ;

                tbody.appendChild(row);
            });
        }
    };
    xhr.send();
}
</script>

</body>
</html>