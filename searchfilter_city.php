

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search filter</title>
    <!-- vuejs cdn link cdn -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- bootstrap style link cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <style>
        html,
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 16px;
            margin-bottom: 16px;
        }

        h1 {
            font-size: 18px;
            font-family: 'Calibri';
            color: rgba(9, 30, 23);
        }

        div#app {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        div#app .search-wrapper {
            position: relative;
        }

        div#app .search-wrapper label {
            position: absolute;
            font-size: 12px;
            color: rgba(0, 0, 0, 0.5);
            top: 8px;
            left: 12px;
            z-index: -1;
            transition: 0.15s all ease-in-out;
        }

        div#app .search-wrapper input {
            padding: 4px 12px;
            color: rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.12);
            transition: 0.15s all ease-in-out;
            background: white;
        }

        div#app .search-wrapper input:focus {
            outline: none;
            transform: scale(1.05);
        }

        div#app .search-wrapper input:focus+label {
            font-size: 10px;
            transform: translateY(-24px) translateX(-12px);
        }

        div#app .search-wrapper input::-webkit-input-placeholder {
            font-size: 12px;
            color: rgba(0, 0, 0, 0.5);
            font-weight: 100;
        }

        div#app .wrapper {
            display: flex;
            max-width: 600px;
            flex-wrap: wrap;
            padding-top: 12px;
        }

        div#app .card {
            box-shadow: rgba(0, 0, 0, 0.117647) 0px 1px 6px, rgba(0, 0, 0, 0.117647) 0px 1px 4px;
            max-width: 124px;
            margin: 12px;
            transition: 0.15s all ease-in-out;
        }

        div#app .card:hover {
            transform: scale(1.1);
        }

        div#app .card a {
            text-decoration: none;
            padding: 12px;
            color: #03a9f4;
            font-size: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        div#app .card a img {
            height: 100px;
        }

        div#app .card a small {
            font-size: 10px;
            padding: 4px;
        }

        div#app .hotpink {
            background: hotpink;
        }

        div#app .green {
            background: green;
        }

        div#app .box {
            width: 50px;
            height: 50px;
            border: 40px solid rgba(0, 0, 0, 0.12);
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="search-wrapper">
            <input type="text" v-model="search" placeholder="Entre le nom de ta ville ..." />
            <label>Recherche :</label>
        </div>
        <div class="wrapper">
            <div class="card" v-for="post in filteredList">
                <a v-bind:href="post.link" target="_blank">
                    <h1>{{ post.title }}</h1>
                </a>
            </div>
        </div>
    </div>






    <!-- script Vuejs -->
   
</body>
<script src="search.js"></script>
</html>