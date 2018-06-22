class Post {
    constructor(title, img) {
        this.title = title;

    }
}


const app = new Vue({
    el: '#app',
    data: {
        search: '',
        postList: []
    },
    computed: {
        filteredList() {
            return this.postList.filter(post => {
                return post.title.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    },
    created: function () {
        fetch("search.php").then(function (response) {
            return response.json();

        }).then(function (reponse) {

            for (i = 0; i < reponse.length; i++) {
                console.log(reponse[i][0]);
                app.postList.push(new Post(reponse[i][0]));
            }


        });
    }
});