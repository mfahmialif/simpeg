function activeAdd(name) {
    var listItems = $("#list-sidebar li");
    listItems.each(function(i, li) {
        var a = $(li).find("a");
        var listItem = $(li).find("p");
        var html = $(listItem).html().toLowerCase();
        if (html.includes(name)) {
            $(a).addClass("active");
        }
    });
}

function activeRemove(name) {
    var listItems = $("#list-sidebar li");
    listItems.each(function(i, li) {
        var a = $(li).find("a");
        var listItem = $(li).find("p");
        var html = $(listItem).html().toLowerCase();
        if (html.includes(name)) {
            $(a).removeClass("active");
        }
    });
}

function menuOpen(name) {
    var listItems = $("#list-sidebar li");
    listItems.each(function(i, li) {
        var listItem = $(li).find("p");
        var html = $(listItem).html().toLowerCase();
        if (html.includes(name)) {
            $(li).addClass("menu-open");
        }
    });
}

function swalDelete(id, name, e) {
    swal({
            title: "Apa kamu yakin?",
            text: "Akan menghapus data dengan " + name + " and id " + id,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                e.submit();
            } else {
                swal("Your data is safe!");
            }
        });
}

function logout(event) {
    event.preventDefault();
    swal({
            title: "Apa kamu yakin ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willLogout) => {
            if (willLogout) {
                document.getElementById('logout-form').submit();
            }
        });

}