

////////// ACTIVE LINK - GENERAL MENU

var filename = window.location.pathname.split('/').pop()

console.log(filename);

if (filename === "index.php") {
    $(".home").addClass("active");
} else {
    $(".home").removeClass("active");
}

if (filename === "about.php") {
    $(".about").addClass("active");
} else {
    $(".about").removeClass("active");
}

if (filename === "yoga.php") {
    $(".yoga").addClass("active");
} else {
    $(".yoga").removeClass("active");
}

if (filename === "therapies.php") {
    $(".therapies").addClass("active");
} else {
    $(".therapies").removeClass("active");
}

if (filename === "ateliers.php") {
    $(".ateliers").addClass("active");
} else {
    $(".ateliers").removeClass("active");
}

if (filename === "temoignages.php") {
    $(".temoignages").addClass("active");
} else {
    $(".temoignages").removeClass("active");
}

if (filename === "galerie.php") {
    $(".galerie").addClass("active");
} else {
    $(".galerie").removeClass("active");
}

if (filename === "contact.php") {
    $(".contact").addClass("active");
} else {
    $(".contact").removeClass("active");
}