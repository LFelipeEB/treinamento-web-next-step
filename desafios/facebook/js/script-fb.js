$("#bv-fb").hide();
$("#nav-logout").hide();
$("#btn-shared").hide();


window.fbAsyncInit = function() {
    FB.init({
        appId      : '854992731325850',
        cookie     : true,
        xfbml      : true,
        version    : 'v2.10'
    });
    FB.AppEvents.logPageView();

    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
};

    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10&appId=854992731325850";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function logout() {
    FB.logout(function(response) {
        console.log(response);

        location.reload();
    });
}



function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
        FB.api('/me', function (response) {
            $("#btnLoginFB").hide();
            $("#bv-fb").append(response.name);
            $("#nav-login").text(response.name);
            $("#nav-logout").show();
            $("#bv-fb").show();
            $("#btn-shared").show();

            console.log(response);
        })

    } else {
        document.getElementById('status').innerHTML = 'Please log ' +
            'into this app.';
    }
}

function login() {
    FB.login(function(response) {
        if (response.status === 'connected') {
            location.reload();
        } else {
            // The person is not logged into this app or we are unable to tell.
        }

        console.log();
    },  {scope: 'email,user_likes,publish_actions', return_scopes: true});
}

function shared() {
    FB.ui({
        method: 'share_open_graph',
        action_type: 'og.likes',
        action_properties: JSON.stringify({
            object:'https://developers.facebook.com/docs/',
        })
    }, function(response){
        // Debug response (optional)
        console.log(response);
    });
}

function analytics() {
    FB.AppEvents.logEvent("clickNoAnalytics");

    console.log("ClickNoANalytics Disparado");
}