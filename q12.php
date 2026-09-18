<!DOCTYPE html>
<html>

<head>
    <title>Movie Details</title>
</head>

<body>

    <h2>Movie Details</h2>

    <table border="1">
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

        <tbody id="movies"></tbody>
    </table>

    <script>
        let x = new XMLHttpRequest();

        x.open("GET", "https://freetestapi.com/api/v1/movies", true);

        x.onload = function() {
            console.log("Status:", x.status);
            console.log("Response:", x.responseText);

            let data = JSON.parse(x.responseText);

            data.forEach(m => {
                movies.innerHTML += `
        <tr>
            <td>${m.id}</td>
            <td>${m.title}</td>
            <td><img src="${m.poster}" width="60"></td>
            <td>${m.year}</td>
            <td>${m.genre}</td>
            <td>${m.rating}</td>
            <td>${m.director}</td>
            <td>${m.country}</td>
            <td>${m.language}</td>
            <td>${m.actors}</td>
        </tr>`;
            });
        };

        x.onerror = function() {
            console.error("AJAX request failed!");
        };

        x.send();
    </script>

</body>

</html>