import axios from "axios";

axios.get($(".count__users").data("url")).then(response => {
    if (response.data.data) {
        $(".count__users").css('display', 'block')
        $(".count__users").text(response.data.data);
    }
});
