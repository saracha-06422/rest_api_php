<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial;
            text-align: center;
        }

        tr, td {
            padding: 1rem .5rem;
            border: 1px solid #ccc;
        }

        thead {
            background: #333;
            color: #fff;
        }

        button {
            padding: 1rem 1.5rem;
            background: green;
            text-transform: uppercase;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            outline: none;
        }
    </style>

</head>
<body>

    <table width="100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>NAME</td>
                <td>AGE</td>
            </tr>
        </thead>
        <tbody id="info">

        </tbody>
    </table>
    
    <button type="button" onclick="loadDoc()">Change Content</button>

    <script>
        function loadDoc() {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let data = JSON.parse(this.responseText);
                    console.log(data);

                    for (let i =0; i < data.length; i++){
                        document.getElementById('info').innerHTML += `
                        <tr>
                            <td>${data[i].id}</td>
                            <td>${data[i].name}</td>
                            <td>${data[i].age}</td>
                        </tr>
                        `;
                    }
                }
            }
            document.getElementById('info').innerHTML ='';
            xhttp.open("GET", 'index.php', true);
            xhttp.send();
        }
    </script>
</body>
</html>