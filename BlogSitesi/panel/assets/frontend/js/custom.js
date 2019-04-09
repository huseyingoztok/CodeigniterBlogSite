
$(document).ready(function () {
    $(".share-button").click(function (e) {
        e.stopPropagation();
        var window_size="width=585,height=511";
        var url=this.href;
        var domain=url.split("/")[2];
        //console.log(domain)[2];


        switch (domain) {
            case "www.twitter.com":
                var window_size="width=585,height=368";
                break;
            case "www.facebook.com":
                var window_size="width=585,height=368";
                break;
            case "www.linkedin.com":
                var window_size="width=585,height=368";
                break;
        }
        window.open(url,'','menubar=no,toolbar=no,resizable=yes,scroolbars=yes,'+window_size);
        return false;
    });

});


