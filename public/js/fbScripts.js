var response1 = fetch('https://samadhi-lyon.fr/api/facebookPosts').then(response => {
    return response.json();
}).then(response => {
    var posts = response.data;
    console.log(posts)
    for(var i = 0; i<posts.length; i++) {
        if(isEven(i)) {
            $(".rate-" + i).css("background-color", '#f5f0e4');
        }
        var link = "https://www.facebook.com/yogaenmoi/posts/" + response.data[i].id.split("_")[1]
        console.log(link);
        $(".fbLink-" + i).attr("href", link);
        $(".fbImg-" + i).css("background-image", "url(" +response.data[i].full_picture + ")");
        $(".fbTitle-" + i).html(response.data[i].title);
        $(".fbDay-" + i).html(monthOfPost(response.data[i].created_time, 2));
        $(".fbMonth-" + i).html(monthOfPost(response.data[i].created_time, 1));
        $(".fbYr-" + i).html(monthOfPost(response.data[i].created_time, 3));
        $(".fbBody-" + i).html(response.data[i].message);
    }
})
.catch(error => {
    console.log(error);
});

function monthOfPost(commentDate, number) {

    var dAujourdhui = new Date(commentDate);

    if(number === 1) {
        var options = {month: 'short'};
    } else if (number === 2) {
        var options = {day: 'numeric'};
    } else {
        var options = {year: 'numeric'};
    }
    
    var month = dAujourdhui.toLocaleDateString('fr-FR', options);

    return (month);
}






var response2 = fetch('https://samadhi-lyon.fr/api/facebookReviews').then(response => {
    return response.json();
}).then(response => {
    var rates = response.ratings.data;
    for(var i = 0; i<rates.length; i++) {
        if(isEven(i)) {
            $(".rate-" + i).css("background-color", '#f5f0e4');
        }
        $(".comment-" + i).html(capitalizeFirstLetter(response.ratings.data[i].open_graph_story.message));
        $(".name-" + i).html("Compte facebook privé");
        $(".metadata-" + i).html(dateOfComment(response.ratings.data[i].open_graph_story.start_time));
    }
})
.catch(error => {
    console.log(error);
});

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function isEven(value) {
    if (value%2 == 0)
        return true;
    else
        return false;
}

function dateOfComment(commentDate) {

    var dAujourdhui = new Date(commentDate);

    var options = {month: 'short', day: "numeric", year: "numeric"};
    var month = dAujourdhui.toLocaleDateString('fr-FR', options);

    return ("le " + month);
}