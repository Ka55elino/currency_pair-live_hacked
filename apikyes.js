// ==UserScript==
// @name         Apikey
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @require      http://code.jquery.com/jquery-3.3.1.min.js
// @match        http://upworktest.test/
// @match        https://www.upwork.com/*
// @grant        none
// ==/UserScript==


/* Usage :
if needed run chrome with disabled websecurity `chrome.exe --user-data-dir="C:/Chrome dev session" --disable-web-security`
Install addon to chrome https://chrome.google.com/webstore/detail/tampermonkey/dhdgffkkebhmkfjojejmpbldmpobfkfo?hl=ru
Add this script
run on https://www.alphavantage.co/support/#api-key
get keys from console;
Use vpn after blocking
*/
var api_keys = [];

jQuery(document).ready(function() {
   jQuery('#post-form').after('<button id="upworkGetAnsersPlz">Get answer</button>');
});
jQuery(document).on('click','#upworkGetAnsersPlz',function(){
    for(var c = 0 ; c <30; c++){
        var email = makeid(getRandomArbitrary(5, 15))+'@'+makeid(getRandomArbitrary(2,4))+'.'+makeid(getRandomArbitrary(2, 4));
        var org = makeid(getRandomArbitrary(5, 15));
        jQuery.ajax({
            url : "/create_post/",
            type : "POST",
            async : false,
            data : { first_text : 'deprecated',
                    last_text: 'deprecated',
                    occupation_text: 'Investor',
                    organization_text: org,
                    email_text: email , // data sent with the post request
                   },
            success : function(json) {
                //console.log(json.text);

                var dvoetochie = json.text.indexOf(':');
                var api = json.text.substring(dvoetochie+2,dvoetochie+18);
                //console.log(dvoetochie);
                console.log(api);
                api_keys.push(api)
                for(var i = 0 ; i< json.text.length;i++){
                    //console.log(json.text[i],i);
                }
            }
           });
    }
   console.log(api_keys);
})
jQuery.ajaxSetup({
    beforeSend: function(xhr, settings) {
        //if (!csrfSafeMethod(settings.type) && sameOrigin(settings.url)) {

            xhr.setRequestHeader("X-CSRFToken", $('[name="csrfmiddlewaretoken"]').val());
        //}
    }
});
function makeid(length) {
   var result           = '';
   var characters       = 'abcdefghijklmnopqrstuvwxyz';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}
function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}
